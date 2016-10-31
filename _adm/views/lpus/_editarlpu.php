<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\_adm\components\widgets\editor\Editor;
use \app\_adm\components\widgets\actionsbox\ActionsBox;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;
use yii\widgets\ListView;
use yii\helpers\Url;
use kartik\select2\Select2;
use \app\_adm\components\widgets\maps\Maps;

$ckeditorOptions = ElFinder::ckeditorOptions('_adm/elfinder',[/* Some CKEditor Options */]);

$enderecosbd = $dt_prov_enderecos->getModels();
$markers = [];
if($enderecosbd){
    foreach ($enderecosbd as $k => $end) {
      $markers[] = [
        'lat'=>$end->lat,
        'lng'=>$end->long,
        'title'=>$end->bairro,
        'infoWindow'=>[
          'content'=>'<p>'.$end->logradouro.', '.$end->numero.', '.$end->bairro.', '.$end->cidade.', '.$end->estado.' </p>'
        ]
      ];
    }
}




?>

<?php
$form = ActiveForm::begin([
    'id'=>'form-conteditar',
    'layout' => 'horizontal',
    'fieldConfig' => [
        // 'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            //'label' => 'col-sm-3',
            //'offset' => 'col-sm-offset-4',
            //'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]);
?>
<?php if($autor): ?>
<div class="user-panel pull-left" style="width:350px;">
  <div class="pull-left image">
    <?php if($autor->avatar): ?>
      <img src="<?=$autor->avatar?>" class="" alt="User Image">
    <?php else: ?>
      <img class="img-circle" src="temas/purephoenix/images/admin.png"  alt="User Image">
    <?php endif; ?>
  </div>
  <div class="pull-left info">
    <span class="text-danger"><strong>Autor</strong></span>
    <p class="text-info"><?=$autor->nome; ?> - <?=$autor->cargo; ?></p>
  </div>
</div>
<?php endif; ?>

<div class="pad margin no-print pull-right">
    <div class="box-tools">
    <a class="btn btn-lg btn-primary fa fa-angle-double-left" href="<?=Url::to(['lpus/lpus']);?>">  Voltar</a>

    <?=Html::submitButton(' Salvar alterações', ['class' => 'btn btn-lg btn-success fa fa-save', 'name' => 'contact-button']) ?>
    </div>
</div>
<div class="clearfix"></div>

<div class="box box-default">
<div id="erros">
     <?=$form->errorSummary($model); ?>
</div>
    <div class="box-body">
           <h2 class="page-header">
            <i class="fa fa-fw fa-gears"></i>Projeto: <?php echo $model->titulo; ?>

            <small class="pull-right">
                <span class="label label-info">
            <i class="fa fa-fw fa-calendar"></i> Data de Publicação:
            <?php echo $model->dt_publicacao; ?>
            </span>
            </small>
          </h2>

        <div class="row">
            <div class="col-md-6">

              <div class="form-group field-lpus-id">
                    <label class="control-label col-sm-3" for="lpus-id">ID da LPU</label>
                    <div class="col-sm-6">
                    <label class="label label-info" style="line-height:37px;"><?=$model->id; ?></label>
                    </div>
                </div>

                    <?=$form->field($model, 'titulo')->textInput(['class'=>'form-control']);?>
                    <?=$form->field($model, 'status_publicacao')->dropDownList([0=>'Inativo',1=>'Ativo'],['class'=>'form-control']); ?>
                    <?=$form->field($model, 'cod_lpu')->textInput(['class'=>'form-control']);?>
                    <?php
                     echo $form->field($model, 'servicos')->widget(Select2::classname(),[
                      'data'=>$model->ServicosList(),
                      'language' => 'pt-BR',
                      'options' => ['placeholder' => 'Selecione um tipo de serviço','multiple' => true],
                      'pluginOptions' => [
                          'allowClear' => true
                      ],
                    ]);
                    ?>

                   <div class="box-anexo">
                     <?php $path = Yii::getAlias('@app/sys_tesb_media/');
                     ?>
                      <?= $form->field($model, 'preparadoc')->widget(InputFile::className(),[
                        'language'      => 'pt-BR',
                        'controller'    => '_adm/documentos',
                        'filter'        => 'application/pdf',
                        'template'      => '<div id="sistem_file" class="input-group">{input}<span class="input-group-btn">{button}</span> <span class="input-group-btn btn-success" ><a href="#" id="salvar-docs" class="btn btn-success"><i class="fa fa-save"></i></a></span></div>',
                        'options'       => ['class' => 'form-control'],
                        'buttonOptions' => ['class' => 'btn btn-default'],
                        'multiple'      => false
                      ]); ?>
                    </div>
                    <div class="clearfix"></div>
                    <script type="text/javascript">
                      $(document).ready(function(){

                        $('#salvar-docs').on('click',function(e){
                          e.preventDefault();
                          btsave = $(this);
                          file = $('#sistem_file input').val();
                          $('#sistem_file input').val('');
                          if(file){
                            $.ajax({
                              url:'<?=Url::to(['lpus/ajaxanexa']);?>',
                              data:{lpu:"<?=$model->id?>", arquivo:file},
                              method:'POST',
                              beforeSend:function(){
                                $('#load-file').show();
                                btsave.text('...');
                              },
                              success:function(data){
                                $('#anexo-aplicados').html(data);
                                $('#load-file').hide();
                                btsave.html('<i class="fa fa-save"></i>');
                              }

                            });
                          }
                        });

                      });
                    </script>
                    <div class="engloba-anexos" id="anexo-aplicados">
                          <?=$this->render('partialviews/_anexos',['docs_anexo'=>$model->docs_anexo,'model_id'=>$model->id]); ?>
                    </div>
                </div>


        <div class="col-md-6">
            <div class="info-box">

                  <span class="info-box-text">Fornecedores participantes: <span class="badge bg-light-blue">
                  <?=$dt_prov_aceites->getTotalCount(); ?></span></span>

                  <?=ListView::widget([
                            'dataProvider' => $dt_prov_aceites,
                            'options' => [
                                'tag' => 'div',
                                'class' => 'usuario_lista',
                                'id' => 'list-usuarios',
                            ],
                            'itemView' => '_listafornecedores',
                            'emptyTextOptions'=>[
                              'tag' => 'div',
                              'class' => 'post',
                              'id' => 'forn_vazio',
                            ],
                            'emptyText'=>'<span class="box-empty">Nenhum fornecedor aceitou esta LPU</span>',
                            'layout'=>'{summary}\n{items}\n{pager}'
                        ]);
                   ?>
                </div><!-- /.info-box-content -->
              </div>


        </div>

    </div>
</div>




<div class="row">
      <div class="col-lg-6 connectedSortable ui-sortable">
          <div class="box box-success">
              <div class="box-header ui-sortable-handle">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Descrição</h3>
                </div>
                <div class="box-body">
                       <?php
                      echo Editor::widget([
                        'model'=>$model,
                        'id'=>'descricao',
                        'ajaxSave'=>false,
                        'options'=>$ckeditorOptions
                        ]);
                         ?>

                </div>


          </div>
      </div>

    <div class="col-lg-6 connectedSortable ui-sortable">
           <div class="box box-success">
              <div class="box-header ui-sortable-handle">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Condições</h3>
                </div>
                <div class="box-body">
                      <?php
                      echo Editor::widget([
                        'model'=>$model,
                        'id'=>'condicoes',
                        'ajaxSave'=>false,
                        'options'=>$ckeditorOptions
                        ]);
                         ?>

                </div>
          </div>
    </div>


</div>

<div class="row">
       <div class="col-lg-7 connectedSortable ui-sortable">
          <div class="box box-default">
                <div class="box-body">
                    <?=Maps::widget([
                      'markers'=>$markers,
                      'jsfunction'=>'js:$(document).on("click","[data-latlong]",function(e){
                        e.preventDefault();
                        maps_cord = $(this).data("latlong");
                        map.setCenter(maps_cord.lat, maps_cord.long);
                        map.setZoom(17);

                      });'
                    ]); ?>
                </div>
          </div>
      </div>
      <div class="col-lg-5 connectedSortable ui-sortable">
            <div class="box box-success">
              <div class="box-header ui-sortable-handle">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title"><i class="fa fa-map-marker margin-r-5 "></i> Lista de endereços
                  </h3>
                  <div class="pull-right box-tools">
                    <!-- action box -->
                         <?=ActionsBox::widget([
                           'add_titulo'=>false,
                           'buttons'=>[

                            'custom'=>[
                                'text'=>'<span class="fa fa-plus"></span> Adicionar endereço',
                                'params'=>[
                                  'data-btaddurl'=>'index.php?r=_adm/lpus/ajaxcriarendereco&lpu='.$model->id,
                                  'data-formid'=>'form-enderecolpu',
                                  'data-pajaxid'=>'list-enderecos',
                                  'class'=>'btn btn-xs btn-success',
                                  'title'=>'Adicionar endereço',
                                ]
                            ]
                         ]]); ?>
                    <!-- fim action box -->
                  </div>



              </div>
                <div class="box-body">
                  <?php yii\widgets\Pjax::begin(['id'=>'list-enderecos', 'class'=>'box-body enderecos']); ?>
                      <?php
                            echo  ListView::widget([
                                  'dataProvider' => $dt_prov_enderecos,
                                  'options' => [
                                      'tag' => 'ul',
                                      'class' => 'todo-list',
                                      'id' => 'list-enderecos',
                                  ],
                                  'itemOptions'=>[
                                    'tag'=>'li',
                                    'class'=>'',
                                  ],
                                  'itemView' => '_listaenderecos',
                                  'emptyTextOptions'=>[
                                    'tag' => 'li',
                                    'class' => '',
                                    'id' => 'end_vazio',
                                  ],
                                  'emptyText'=>'<span class="text">Nenhum endereço cadastrado nesta lpu</span>',
                                  'layout'=>'{summary}{items}{pager}'
                              ]);
                       ?>
                    <?php yii\widgets\Pjax::end(); ?>

                    <script type="text/javascript">
                      // $(document).ready(function(e){
                      //   $('[data-deletarlista]').on('click',function(e){
                      //     e.preventDefault();
                      //     msn = $(this).data('deletarlista');
                      //     url = $(this).attr('href');
                      //
                      //     var options = {
                      // 		        message: msn,
                      // 		        title: 'Atenção!',
                      // 		    };
                      //
                      //
                      // 		eModal.confirm(options)
                      // 		      .then(function(){
                      //
                      //              deletar(url,'',idcategoria)
                      //             //alert("Ok Deletado");
                      //
                      //
                      // 		      }, function(){
                      // 		      	return;
                      // 		      });
                      //
                      //   });
                      // });
                    </script>
                </div>
    </div>

      </div>

</div>


<?php ActiveForm::end(); ?>
<script type="text/javascript">
    $(function(){
    // $('#list-enderecos').slimScroll({
    //     height: '250px'
    // });
    // $('#list-usuarios').slimScroll({
    //     height: '250px'
    // });
});
</script>
