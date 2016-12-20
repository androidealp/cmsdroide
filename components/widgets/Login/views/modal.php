<?php
   use yii\bootstrap\ActiveForm;
   use yii\helpers\Html;
   use yii\helpers\Url;
    ?>
<?php
   $form = ActiveForm::begin([
               'id' => 'login-form',
               'action'=>['institucional/login'],
               'options' => ['class' => ''],
               'fieldConfig' => [
                   'template' => "{input}\n<div class=\"col-lg-8\">{error}</div>",
   
               ],
   ]);
   ?>
<div class="form-group has-feedback">
   <?=$form->field($model, 'username',[
      'template'=>'{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span><div class=\"col-lg-8\">{error}</div>',
      
      ])->textInput([
      'placeholder'=>'Usuário'
      ]); ?>
</div>
<div class="form-group has-feedback">
   <?=$form->field($model, 'password',[
      'template'=>'{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span><div class=\"col-lg-8\">{error}</div>'
      ])->passwordInput([
      'placeholder'=>'Senha'
      ]) ?>
</div>

<small class="pull-right"><?= Html::a('<i class="glyphicon glyphicon-question-sign"></i> Esqueci a senha', ['institucional/novasenha']) ?></small>
<?= Html::submitButton('Acessar', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
<?php ActiveForm::end(); ?>

<small class="text-center"><?= Html::a('<i class="glyphicon glyphicon-cog"></i> Criar conta', ['institucional/cadastrar']) ?></small>