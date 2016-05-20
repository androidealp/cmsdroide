<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php
$form = ActiveForm::begin([
    'id'=>'form-admeditar',
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

<div class="pad margin no-print pull-right">
    <div class="box-tools">
    <?= Html::submitButton(' Salvar alterações', ['class' => 'btn btn-lg btn-success fa fa-save', 'name' => 'contact-button']) ?>
    <!-- <a href="<?=Url::to(['usermanager/admins']);?>" class="btn btn-lg btn-primary fa fa-angle-double-left">  Voltar</a> -->
    </div>
</div>
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-6">
    <div class="box box-default">

      <div class="box-body">
      <div class="box-header ui-sortable-handle">
          <h3 class="box-title">Prestador:  <?=$model->nome; ?> <br /><small>Criado: <?=$model->dt_cadastro; ?> - Acessou: <?=$model->dt_ult_acesso; ?></small> </h3>
          <?=($model->status_prestador_id)?'<span class="badge bg-green pull-right">Ativo</span>':'<span class="badge bg-red">Inativo</span>'; ?>
      </div>
      
          <p class="alert alert-warning">
            Por segurança algumas informações não podem ser editadas, caso necessário contate um administrador do sistema.
          </p>
      </div>
    </div>

    <div class="box box-default">
      <div class="box-header ui-sortable-handle">
        <h3>Dados não Editáveis<small></small></h3>
      </div>
      <div class="box-body">
        <label>E-mail</label><p><?=$model->email;?></p>
        <label>CNPJ</label><p><?=$model->cnpj;?></p>
        <label>Empresa</label><p><?=$cadastro->empresa;?></p>
        <?php if($cadastro->inscricao_estadual !='') {
          echo '<label>Inscrição Estadual</label><p>'.$cadastro->inscricao_estadual.'</p>';
        }else{
          echo '<label>Inscrição Estadual</label><p>Não Cadastrado</p>';
        }
        
        ?>
      </div>
    </div>  

    <div class="box box-default">
     <div class="box-header ui-sortable-handle">
        <h3>Dados Editáveis<small></small></h3>
      </div>
      <div id="erros">
      <?=$form->errorSummary($model); ?>
      </div>
      <?= $form->field($model, 'nome')->textInput(['class'=>'form-control', 'placeholder'=>'Nome do prestador']);?>
      <!-- <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail para acesso']);?> -->
      
      <!-- fim email -->
      <!-- <?= $form->field($model, 'status_prestador_id')->dropDownList($model->getListStatusPrest(),['class'=>'form-control']); ?> -->
<!--       <?= $form->field($model, 'cnpj')->widget(\yii\widgets\MaskedInput::className(), [
        'mask'=>'99.999.999/9999-99',
        'options'=>[
            'class'=>'form-control','placeholder'=>'Informe o CNPJ da Empresa'
        ]
      ]);?> -->
    
       <!--  <?=$form->field($cadastro, 'empresa')->textInput(['class'=>'form-control', 'placeholder'=>'Nome da empresa']);?> -->


        <?=$form->field($cadastro, 'pessoa_contato')->textInput(['class'=>'form-control', 'placeholder'=>'Nome do responsável para contato']);?>


       <!--  <?=$form->field($cadastro, 'inscricao_estadual')->textInput(['class'=>'form-control', 'placeholder'=>'Inscrição estadual']);?> -->


        <?=$form->field($cadastro, 'telefone_1')->widget(\yii\widgets\MaskedInput::className(), [
          'mask' => ['(99) 9999-9999','(99) 99999-9999'],
          'clientOptions'=>[
              'keepStatic'=>true
          ],
          'options'=>[
              'class'=>'form-control', 'placeholder'=>'Telefone para contato'
          ]
        ]);?>



        <?=$form->field($cadastro, 'telefone_2')->widget(\yii\widgets\MaskedInput::className(), [
          'mask' => ['(99) 9999-9999','(99) 99999-9999'],
          'clientOptions'=>[
              'keepStatic'=>true
          ],
          'options'=>[
              'class'=>'form-control', 'placeholder'=>'Telefone para contato'
          ]
        ]);?>




        <?=$form->field($cadastro, 'descricao')->textArea(['class'=>'form-control', 'placeholder'=>'Uma breve descrição sobre o prestador']);?>


      <!-- fim nome de usuario -->



      <!-- fim ativar -->
    </div>

    <div class="box box-default">

      <div class="box-header ui-sortable-handle">
          <h3>Dados de endereço <small></small></h3>

          <div>
            <?=$form->field($cadastro, 'cep')->widget(\yii\widgets\MaskedInput::className(),[
            'mask' => '99999-999',
            'options'=>['class'=>'form-control','id'=>'cep']
          ]);?>
          </div>
          <div><?=$form->field($cadastro, 'logradouro')->textInput(['class'=>'form-control ','id'=>'logradouro']);?></div>
          <div><?=$form->field($cadastro, 'numero')->textInput(['class'=>'form-control','id'=>'numero']);?></div>
          <div><?=$form->field($cadastro, 'bairro')->textInput(['class'=>'form-control','id'=>'bairro']);?></div>
          <div><?=$form->field($cadastro, 'cidade')->textInput(['class'=>'form-control','id'=>'cidade']);?></div>
          <div><?=$form->field($cadastro, 'estado')->dropDownList($cadastro->EstadoList(),['class'=>'form-control','id'=>'estado']); ?></div>
          <script type="text/javascript">
            $(document).ready(function(){
              $('#cep').on('blur',function(e){
                cep = $(this).val();
                if(cep != ''){
                  $.ajax({
                    url:"<?=\yii\helpers\Url::to(['lpus/ajaxcorreios']);?>",
                    method:"POST",
                    dataType:'json',
                    data:{'cep':cep},
                    beforeSend:function(){
                      $('#info-cep').html('<p id="alert-cep" class="alert alert-info">Aguarde....</p>');
                    },
                    success:function(data){
                      data = jQuery.parseJSON(data);
                      $('#logradouro').val(data.logradouro);
                      $('#bairro').val(data.bairro);
                      $('#cidade').val(data.localidade);
                      $('#estado').val(data.uf);
                      $('#alert-cep').remove();

                    }
                  });
                } //fim do if

              });
            });
          </script>
      </div>

    </div>


    <!-- fim do box-default -->
  </div>
  <!-- fim col-6 -->
  <div class="col-md-6">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Editar senha <?=Html::a('<i class="fa fa-edit"></i>', '#edit-senha', ['class'=>'btn btn-primary btn-xs','data-editsenha'=>'']); ?></h3>
      </div>
      <div class="panel-body">
        <div id="edit-senha" class="">
          <p class="alert alert-info">
            Sua senha está criptografada, para editar a senha clique no botão do lado de editar senha.
          </p>
        </div>
      </div>
    </div>
    <div class="box box-default">

      <div class="box-header ui-sortable-handle">
          <h3>Arquivos <small></small></h3>

      </div>
      
    </div>
    <!-- fim painel default -->
  </div>
  <!-- fim col-6 -->
</div>
<!-- fim row -->


<?php ActiveForm::end(); ?>


<script type="text/javascript">
  $(document).ready(function(){
    $('[data-editsenha]').on('click',function(e){
      e.preventDefault();
      botao = $(this);
      botao.text('aguarde ....');
      box = $($(this).attr('href'));
      $.post('<?=Url::to(['meucadastro/ajaxinsertsenha']);?>', function( data ) {
          $( box ).html( data );
          botao.remove();
      });

    });
  });
</script>
