<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login - administrator';


?>

<div class="login_wrapper">
  <div class="animate form login_form">
    <section class="login_content">
  
      <?=Html::img(\Yii::$app->getModule('_adm')->params['logo'], ['style'=>'width:200px;']);  ?>


      
          <?php if($model->HasErros()): ?>
              <div class="alert alert-danger alert-dismissible fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <?=$model->HtmlErros()?>
              </div>
          <?php endif; ?>

          <?php
         $form = ActiveForm::begin([
                     'id' => 'login-form',
                     'options' => [
                     'role' => 'form',
                     //'class'=>'form-horizontal form-label-left input_mask'
                     ],
                     'fieldConfig' => [
                         'template' => "{input}\n<div class=\"col-lg-8\">{error}</div>",

                     ],
         ]);
         ?>


          <?=$form->field($model, 'username',[
              'template'=>'<div class="form-group has-feedback"><span aria-hidden="true" class="fa fa-user form-control-feedback left"></span>{input}</div>',

          ])->textInput([
              'placeholder'=>'Usuário',
              'class'=>'form-control has-feedback-left'
          ]); ?>

          <?=$form->field($model, 'password',[
              'template'=>'<div class="form-group has-feedback"><span aria-hidden="true" class="fa fa-shield form-control-feedback left"></span>{input}</div>'
          ])->passwordInput([
              'placeholder'=>'Senha',
              'class'=>'form-control has-feedback-left'
          ]) ?>

            <div class="text-center">
              <?= Html::submitButton('Login  <i class="fa fa-fw fa-unlock-alt"></i>', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </section>
  </div>
</div>
