<?php use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;

?>

<div class="page-section">
  <div class="row">
    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">

      <div class="panel panel-default">
        <div class="panel-body">



          <?=ActionsBox::widget(); ?>
        </div>
      </div>
        <!-- /panel -->
        <div class="col-md-8">
          <div class="panel panel-default">
            <?php  $form = ActiveForm::begin([
                  'id'=>'form-sys',
                  'layout' => 'horizontal',
                  'fieldConfig' => [
                      // 'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                      'horizontalCssClasses' => [
                          'label' => 'col-sm-2',
                          'offset' => 'col-sm-offset-5',
                          'wrapper' => 'col-sm-9',
                          'error' => '',
                          'hint' => '',
                      ],
                  ],
              ]);
              ?>

              <div class="panel-heading">
                <h4 class="panel-title text-center">Configuração de e-mail</h4>
              </div>

              <div class="panel-body">

                <div class="remoto" id="remoto">

                  <?=$form->field($model, 'host')->textInput(['class'=>'form-control']);?>
                  <?=$form->field($model, 'username')->textInput(['class'=>'form-control']);?>

                  <p class="text-danger">Senha atual Descriptografada: <?=$model->decry( $model->register_pass);?></p>
                  <?=$form->field($model, 'password')->textInput(['class'=>'form-control']);?>
                  <?=$form->field($model, 'port')->textInput(['class'=>'form-control']);?>
                  <?=$form->field($model, 'encryption')->textInput(['class'=>'form-control']);?>

                  <div class="text-center">
                      <?=Html::submitButton(' Salvar alterações', ['class' => 'btn btn-info', 'name' => 'send-sys'])?>
                  </div>
                </div>


              </div>
              <?php ActiveForm::end(); ?>

          </div>
          <!-- /panel -->
        </div>
        <!-- col-md-8 -->
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="box-tools pull-right">
                <?=Html::a('Gerar nova chave','#',['class'=>'btn btn-xs btn-danger'])  ?>
              </div>
              <h4 class="panel-title text-center">Chave de segurança</h4>
            </div>

            <div class="panel-body">

              <p class="text-danger">
                Este key será usado para acesso seguro de uso remoto, para analize e extração de dados via xml, ou outras formas de consulta externa
              </p>
              <div class="remoto" id="remoto">

                <code>
                    <?=$model->key_remote_access; ?>
                </code>

              </div>

            </div>
          </div>
          <!-- /panel -->

          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title text-center">Testar SMTP</h4>
              <p><small>Enviar teste para um e-mail válido para testar as configurações</small></p>
            </div>

            <div class="panel-body">

              <div id='teste_mail' class="input-group">
                <?php echo Html::textInput('teste_mail[email]','',[
                  'placeholder'=>'Informe o email para fazer um teste','class'=>'form-control']); ?>
                <span class="input-group-btn">

                  <?=Html::a('<i class="fa fa-fw fa-paper-plane faa-passing"></i>','#',[
                    'class'=>'btn btn-danger faa-parent animated-hover',
                    'data-btajaxsingle'=>\yii\helpers\Url::to(['/_adm/confmanager/ajax-teste-email']),
                    'data-serialize'=>'#teste_mail :input',
                    'data-icontrue' =>  '<i class="fa fa-fw fa-paper-plane faa-passing"></i>',
                    'data-iconfalse'=> '<i class="fa fa-fw  fa-thumbs-down faa-shake"></i>',
                  ]
                ); ?>

                </span>
              </div>




              <div id='erro-testemail' class="col-md-12">

              </div>

            </div>


          </div>


        </div>
        <!-- col-md-4 -->



    </div>
  </div>
</div>


<script type="text/javascript">
    function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

      jQuery('#send-teste').on('click',function(e){
        e.preventDefault();
        email = $('#teste_email').val();

        if(email==''){
          alert('Você precisa informar um email para envio em "Envio de teste"');
        }else if(validateEmail(email)){
          $.ajax({
            url:'<?=\yii\helpers\Url::to(['/_adm/confmanager/ajax-teste-email']);?>?email='+email,
            beforeSend:function(){
              $('.loadpage').show();
            },
            success:function(data)
            {
              $('.loadpage').hide();

              $('#erro-testemail').html(data);
            }
          });

        }else{
          alert('E-mail informado para teste é inválido.');
        }
      });
</script>
