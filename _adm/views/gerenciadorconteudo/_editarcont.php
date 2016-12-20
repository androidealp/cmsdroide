<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\_adm\components\widgets\editor\Editor;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;
use \app\_adm\components\widgets\actionsbox\ActionsBox;

$ckeditorOptions = ElFinder::ckeditorOptions('_adm/elfinder',[/* Some CKEditor Options */]);
if ($model->checkAcoes('editar')){
  $botoes_acoes = [
    'buttons'=>[
      'custom'=>[
      'type'=>'link',
      'url'=>'#',
      'text'=>'<i class="fa fa-eye"></i> Visualizações '.$model->hits,
      'params'=>[
        'class'=>'btn btn-danger btn-sm',
        'data-toggle'=>"tooltip",
        'data-placement'=>"top",
        'title'=>"Limpar visualizações",
        'data-btajaxsingle'=>yii\helpers\Url::to(['gerenciadorconteudo/ajax-reset-hits','id'=>$model->id]),
        'data-comfirm'=>'Ao clicar todos os registros de visualização serão deletados, deseja continuar?',
        'data-icontrue'=>"<i class='fa fa-eye fa-2x'></i>",
        'data-iconfalse'=>"<i class='fa fa-eye-slash fa-2x'></i>",
      ],
    ]

    ]
  ];
}else{
  $botoes_acoes = [];
}

?>

<div class="page-section">
  <div class="row">
    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">

      <div class="panel panel-default">
        <div class="panel-body">
          <?=ActionsBox::widget($botoes_acoes); ?>
        </div>
      </div>
      <!-- /header -->
      <?php
      $form = ActiveForm::begin([
          'id'=>'form-conteditar',
          ///'layout' => 'horizontal',
          'fieldConfig' => [
              'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
              'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'offset' => 'col-md-offset-8',
                'wrapper' => 'col-sm-9',
                'error' => '',
                'hint' => '',
              ],
          ],
      ]);
      ?>

      <!-- Tabbable Widget -->
      <div class="tabbable tabs-primary">

        <!-- Tabs -->
        <ul class="nav nav-tabs">
          <li class="active" ><a href="#artigo" class="faa-parent animated-hover" data-toggle="tab"><i class="fa fa-fw fa-file-text-o fa-2x faa-shake"></i> Artigo</a></li>
          <li><a href="#midia" class="faa-parent animated-hover" data-toggle="tab"><i class="fa fa-fw fa-image fa-2x faa-shake"></i> Mídia</a></li>
          <li><a href="#extra_params" class="faa-parent animated-hover" data-toggle="tab"><i class="fa fa-fw fa-plug fa-2x faa-shake"></i> Parametros Extras</a></li>
        </ul>
        <!-- // END Tabs -->

        <!-- Panes -->
        <div class="tab-content">
          <div id="artigo" class="tab-pane active">
            <?= $form->field($model, 'titulo')->label(false)->textInput([
              'class'=>'form-control form-control-sm',
              'placeholder'=>$model->getAttributeLabel('titulo')
            ])?>

            <div class="row">
              <div class="col-md-6">
                <?= $form->field($model, 'alias')
                ->label(false)
                ->textInput([
                  'placeholder'=>$model->getAttributeLabel('alias'),
                  'class'=>'form-control form-control-sm','placeholder'=>'Alias (gera automaticamente)'])?>
              </div>

              <div class="col-md-6">
                <?=$form->field($model, 'linguagem_id')->label(false)->dropDownList($languages,[
                  'class'=>'form-control form-control-sm',
                ]) ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">

                <?=$form->field($model, 'id_autor')->label(false)->dropDownList($model->ListaAutores(),[
                  'class'=>'form-control form-control-sm',
                ]) ?>
              </div>
              <div class="col-md-6">
                <?=$form->field($model, 'categorias_conteudo_id')
                ->label(false)
                ->dropDownList($categorias,[
                  'class'=>'form-control form-control-sm']) ?>
              </div>
            </div>


            <div class="form-group form-control-line-tb border-default border-x2 form-control-padding-tb">
              <div class="row">
                <div class="col-12">
                  <div class="col-md-6 text-center">
                    <?=$form->field($model, 'status')->label(false)->checkBox(['data-truefalse'=>'1','data-off-label'=>'Desativar','data-on-label'=>'Ativar'])?>
                  </div>
                  <div class="col-md-6 text-center">
                    <?=$form->field($model, 'destaque')->label(false)->checkBox(['data-truefalse'=>'1','data-off-label'=>'Não Destacar','data-on-label'=>'Destacar'])?>
                  </div>
                </div>
              </div>
              </div>
          </div>
          <div id="midia" class="tab-pane">

            <div class="row">
              <div class="col-md-6">

                <div class="alert alert-info">

                  <p>Atenção para Imagem de introdução o minimo aceitavel é <code><?=$model->image_intro_width?>px X <?=$model->image_intro_height?>px</code>.
                    <br />E para imagem de conteúdo é <code><?=$model->image_content_width?>px X <?=$model->image_content_height?>px</code>.<br />
                    Atenção o sistema recorta a imagem que ultrapassa estas dimensões.
                  </p>
                </div>

                <?= $form->field($model, 'imagem_pre')->widget(InputFile::className(),[
                  'language'      => 'pt-BR',
                  'controller'    => '_adm/elfinder',
                  'path' => 'media/',
                  'filter'        => 'image',
                  'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                  'options'       => ['class' => 'form-control', 'placeholder'=>'Tamanho minimo permitido'],
                  'buttonOptions' => ['class' => 'btn btn-default'],
                  'multiple'      => false
                ]); ?>


                <?= $form->field($model, 'imagem_pos')->widget(InputFile::className(),[
                  'language'      => 'pt-BR',
                  'controller'    => '_adm/elfinder',
                  'path' => 'media/',
                  'filter'        => 'image',
                  'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                  'options'       => ['class' => 'form-control', 'placeholder'=>'Tamanho minimo permitido'],
                  'buttonOptions' => ['class' => 'btn btn-default'],
                  'multiple'      => false
                ]); ?>
                <?php if($model->imagem_pre || $model->imagem_pos): ?>
                <div class="row gallery-image" >
                  <?php if ($model->imagem_pre): ?>

                    <div class="item col-md-6 height-180">
                      <div class="cover overlay hover cover-image-full height-180">
                        <?=\yii\helpers\Html::img('@web/'.$model->imagem_pre.'?nocache='.time()); ?>
                        <a class="overlay overlay-hover overlay-full overlay-bg-black" href="#showImageModal" data-toggle="modal" data-openimg="<?= yii\helpers\Url::to('@web/'.$model->imagem_pre.'?nocache='.time())?>">
                          <span class="v-center">
                          <span class="text-h4 text-branco">Imagem de Introdução</span>
                          </span>
                        </a>
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if ($model->imagem_pos): ?>
                    <div class="item col-md-6 height-180">
                      <div class="cover overlay hover cover-image-full height-180">
                        <?=\yii\helpers\Html::img('@web/'.$model->imagem_pos.'?nocache='.time()); ?>
                        <a class="overlay overlay-hover overlay-full overlay-bg-black" href="#showImageModal" data-toggle="modal" data-openimg="<?= yii\helpers\Url::to('@web/'.$model->imagem_pos.'?nocache='.time())?>">
                          <span class="v-center">
                          <span class="text-h4 text-branco">Imagem do conteúdo</span>
                          </span>
                        </a>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              </div>
              <!-- /col-md-6 -->
              <div class="col-md-6">
                <?= $form->field($model, 'video_url')
                ->textInput([
                  'class'=>'form-control form-control-sm ',
                  'placeholder'=>'Url youtube e vimeo'
                ])?>
                <?php if ($model->video_url): ?>
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?=$model->video_url?>"></iframe>
                  </div>
                <?php else: ?>
                  <div class="row gallery-image no-video" >
                    <div class="cover overlay hover cover-image-full height-250 text-center ">
                      <h1> <i class="fa fa-fw icon-desktop-play"></i></h1>
                      <a class="overlay overlay-hover overlay-full overlay-bg-black" href="#">
                        <span class="v-center">
                        <span class="text-h4 text-branco">Não existe vídeo</span>
                        </span>
                      </a>
                    </div>
                  </div>
                  <!-- <div class="text-center no-video">
                    <h1> <i class="fa fa-fw icon-desktop-play"></i></h1>
                  </div> -->
                <?php endif; ?>


              </div>
              <!-- /col-md-6  -->
            </div>
            <!-- /row -->


          </div>
          <!-- end tab-pane -->
          <div id="extra_params" class="tab-pane">
            <p>Recursos extras para o artigo.
            </p>
            <div class="row">
              <div class="col-md-3">
                <label for="" class="label-check">Ativar título</label>
              </div>
              <div class="col-md-9">
                  <?=$form->field($model, 'parametros_extra[ativar_titulo]')->label(false)->checkBox(['data-truefalse'=>'1','data-off-label'=>'Não','data-on-label'=>'Sim'])?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <label for="" class="label-check">Ativar Comentários</label>
              </div>
              <div class="col-md-9">
                  <?=$form->field($model, 'parametros_extra[ativar_comentario]')->label(false)->checkBox(['data-truefalse'=>'1','data-off-label'=>'Não','data-on-label'=>'Sim'])?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <label for="" class="label-check">Ativar Redes sociais</label>
              </div>
              <div class="col-md-9">
                  <?=$form->field($model, 'parametros_extra[ativar_redes_sociais]')->label(false)->checkBox(['data-truefalse'=>'1','data-off-label'=>'Não','data-on-label'=>'Sim'])?>
              </div>
            </div>

            <h3 class="text-danger">Configuração SEO</h3>
            <p>Estas configurações serão usadas para listagem de categoria.</p>
            <div class="row">
              <div class="col-md-3">
                <label for="" class="label-check">KeyWords </label>
              </div>
              <div class="col-md-9">
                <?= $form->field($model, 'parametros_extra[seo_keywords]')
                ->label(false)
                ->textInput([
                  'class'=>'form-control form-control-sm ',
                  'placeholder'=>'texto, texto2'
                ])?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <label for="" class="label-check">Description </label>
              </div>
              <div class="col-md-9">
                <?= $form->field($model, 'parametros_extra[seo_description]')
                ->label(false)
                ->textArea([
                  'class'=>'form-control form-control-sm ',
                  'placeholder'=>'Descrição aqui...'
                ])?>
              </div>
            </div>

            <!-- fim do SEO -->


          </div>
          <!-- end tab-pane -->
        </div>
        <!-- // END Panes -->

      </div>
      <!-- // END Tabbable Widget -->


      <div class="panel panel-default">
          <div class="panel-body">

          <?= $form->field($model, 'texto_introdutorio')
          ->textArea([
            'placeholder'=>$model->getAttributeLabel('texto_introdutorio'),
            'class'=>'form-control'])?>

          <?php
         echo Editor::widget([
           'model'=>$model,
           'id'=>'conteudo_total',
           'ajaxSave'=>false,
           'options'=>$ckeditorOptions
           ]);
            ?>

            <div class="form-group form-control-line-tb border-default border-x2 form-control-padding-tb">
              <div class="row">
                <div class="col-md-6 col-md-offset-6">
                  <div class="btn-group pull-right">
                    <!-- faa-pulse -->
                    <?=Html::a('<i class="fa fa-fw icon-reply-fill faa-pulse"></i> Voltar',['gerenciadorconteudo/conteudo'], ['class' => 'btn btn-danger btn-stroke faa-parent animated-hover'])  ?>
                    <?php if ($model->checkAcoes('editar')): ?>
                        <?= Html::submitButton('<i class="fa fa-save faa-shake"></i> Salvar', ['class' => 'btn btn-success btn-stroke faa-parent animated-hover']) ?>
                    <?php endif; ?>

                  </div>
                </div>
              </div>
              </div>

          </div>


      </div>
      <!-- /panel panel-default -->





      <!-- /panel panel-default -->

          <?php ActiveForm::end(); ?>

    </div>
    <!-- /col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 -->
  </div>
  <!-- /row -->
</div>
<!-- /page-section -->


<div class="modal fade image-gallery-item" id="showImageModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">

    <button type="button" class="btn btn-primary" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <img src="" style="display:none;width:800px;" id="imgload" alt="" />
    <div id="openimg" class="jumbotron text-center  margin-none bg-white ">
      <span class="fa fa-fw fa-4x icon-refresh-heart-fill faa-burst animated text-danger"></span><h4>Aguarde</h4>
    </div>
  </div>
</div>
