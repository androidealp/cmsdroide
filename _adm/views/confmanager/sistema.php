<?php use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;
?>


<div class="box box-default color-palette-box">
  <!-- action box -->
       <?=ActionsBox::widget(['buttons'=>[
         'custom'=>[
           'type'=>'link',
           'text'=>'<i class="fa fa-tasks"></i> Gerenciar Serviços',
           'url'=>['confmanager/servicos'],
           'params'=>[
             'class'=>'btn btn-success btn-sm',
           ]
         ],
       ]]); ?>
  <!-- fim action box -->

       <div class="content">

         <?php
         $form = ActiveForm::begin([
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
         <div class="row">
           <div class="col-md-6">
             <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Configuracões de e-mail Smtp</h3>

                <div class="box-tools pull-right">
                  <?=Html::submitButton(' Salvar alterações', ['class' => 'btn btn-xs btn-info', 'name' => 'send-sys'])?>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <p class="text-danger">
                  Para facilitar e garantir os envios de e-mail pelo sistema, tudo está configurado com os dados smtp abaixo.<br/>
                  Note que estes dados são as configurações de envio, os e-mais com os destinatários de cada envio estão configurados em <code>config/params.php</code>
                </p>
                <div class="remoto" id="remoto">

                  <?=$form->field($model, 'host')->textInput(['class'=>'form-control']);?>
                  <?=$form->field($model, 'username')->textInput(['class'=>'form-control']);?>
                  <p class="text-danger">Senha atual Descriptografada: <?=$model->decry($model->register_pass);?></p>
                  <?=$form->field($model, 'password')->textInput(['class'=>'form-control']);?>
                  <?=$form->field($model, 'port')->textInput(['class'=>'form-control']);?>
                  <?=$form->field($model, 'encryption')->textInput(['class'=>'form-control']);?>

                </div>
              </div>
            </div>
            <!-- /box box-danger -->

           </div>
           <!--/col-md-6  -->
           <div class="col-md-6">
             <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Chave de acesso remoto</h3>

                <div class="box-tools pull-right">
                  <?=Html::a('Gerar nova chave',['confmanager/newkey'],['class'=>'btn btn-xs btn-danger'])  ?>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <p class="text-danger">
                  Este key será usado para acesso seguro de uso remoto, para analize e extração de dados via xml, ou outras formas de consulta externa
                </p>
                <div class="remoto" id="remoto">

                  <code>
                      <?=$model->key_remote_acccess; ?>
                  </code>

                </div>
              </div>
            </div>
            <!-- /box box-danger -->
           </div>
           <!-- /col-md-6 -->
         </div>
         <!-- /row -->



      <?php ActiveForm::end(); ?>
      </div>


</div>
