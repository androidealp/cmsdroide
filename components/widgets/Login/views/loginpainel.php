<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$id_form = 'form-'.rand(1,10000).strtotime('now');

 ?>

  <?php
      $form = ActiveForm::begin([
                 'id' => $id_form,
                 'options' => ['class' => ''],
                 'action'=>['institucional/login'],
                 'fieldConfig' => [
                     'template' => "{input}\n{error}",
                 ],
      ]);
    ?>
    
       <div class="form-group">
         <?=$form->field($model, 'username',[
             //'template'=>'{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span><div class=\"col-lg-8\">{error}</div>',
         ])->textInput([
             'placeholder'=>'Login',
             'class'=>'form-control'
         ]); ?>
       </div>
     
     
       <div class="form-group ">
         <?=$form->field($model, 'password')->passwordInput([
             'placeholder'=>'Senha',
             'class'=>'form-control'
         ]) ?>
       </div>
     <span>Lembrar-me</span> <span>Esqueci minha senha</span>
    
       <?= Html::submitButton('Logar-se', ['class' => 'btn btn-block btn-primary', 'name' => 'login-button']) ?>
   
   <?php ActiveForm::end(); ?>



<!-- end form -->
