<?php 
   use yii\helpers\Html;
   use yii\widgets\ActiveForm;
?>
   
   <div class="container">
      <div class="col-md-6 col-md-offset-3">
         <div class="panel panel-default" style="position: relative; margin-top: 10%">
            <div class="panel-heading">
               <h3 class="panel-title text-center">CONVIDE SEU AMIGO</h3>
            </div>
            <div class="panel-body">


               <?php if (Yii::$app->session->getFlash('success') !== NULL){ ?>
                  <div class="alert text-center alert-success"><?=  Yii::$app->session->getFlash('success'); ?></div>
            <?php } ?>

          
               <?php
                  $form = ActiveForm::begin([
                      'id' => 'login-form',
                      'options' => ['class' => ''],
                  ]) ?>
               <div class="form-group">		
                  <?= $form->field($model, 'nome_remetente')->textInput(['class' => 'form-control', 'placeholder'=>'Seu nome'])->label(false)?>
               </div>
               <div class="form-group">
                  <?= $form->field($model, 'email_remetente')->textInput(['class' => '
                     form-control', 'placeholder'=>'Seu email'])->label(false)?>		
               </div>
               <div class="form-group">		
                  <?= $form->field($model, 'email_do_amigo')->textInput(['class' => 'form-control', 'placeholder'=>'E-mail de um amigo'])->label(false)?>
               </div>
               <div class="form-group">
                  <?= Html::submitButton('Enviar convite', ['class' => 'btn btn-lg btn-block btn-primary']) ?>
               </div>
               <?php ActiveForm::end() ?>
            </div>
         </div>
         <p class="text-center text-success"><i class="fa fa-fw fa-envelope-o"></i> Envie o convite para um amigo ou pretendente.</p>
      </div>
   </div>
</div>


