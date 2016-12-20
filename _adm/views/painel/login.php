<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login - administrator';


?>


<div class="panel-body">
  <h1>Administrador </h1>


  <?php if($model->HasErros()): ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <?=$model->HtmlErros()?>
      </div>
  <?php endif; ?>

  <?php
 $form = ActiveForm::begin([
             'id' => 'login-form',
             'options' => ['role' => 'form'],
             'fieldConfig' => [
                 'template' => "{input}\n<div class=\"col-lg-8\">{error}</div>",

             ],
 ]);
 ?>

  <?=$form->field($model, 'username',[
      'template'=>'<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>{input}</div>',

  ])->textInput([
      'placeholder'=>'Usuário'
  ]); ?>

  <?=$form->field($model, 'password',[
      'template'=>'<div class="input-group"><span class="input-group-addon"><i class="fa fa-shield"></i></span>{input}</div>'
  ])->passwordInput([
      'placeholder'=>'Senha'
  ]) ?>

    <div class="text-center">
      <?= Html::submitButton('Login  <i class="fa fa-fw fa-unlock-alt"></i>', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
