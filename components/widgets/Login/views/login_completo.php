<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$id_form = 'form-'.rand(1,10000).strtotime('now');
$visitante = \Yii::$app->user->isGuest;
 ?>

<?php if ($visitante): ?>
  <?php
  $form = ActiveForm::begin([
             'id' => $id_form,
             'options' => ['class' => ''],
             'action'=>['institucional/login'],
             'fieldConfig' => [
                 'template' => "{input}\n<div class=\"col-lg-12\">{error}</div>",
             ],
  ]);
  ?>
   <div class="row">
     <div class="col-md-6">
       <div class="form-group">
         <?=$form->field($model, 'username',[
             //'template'=>'{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span><div class=\"col-lg-8\">{error}</div>',
         ])->textInput([
             'placeholder'=>'Login',
             'class'=>'form-control'
         ]); ?>
       </div>
     </div>
     <div class="col-md-6">
       <div class="form-group ">
         <?=$form->field($model, 'password')->passwordInput([
             'placeholder'=>'Senha',
             'class'=>'form-control'
         ]) ?>
       </div>
     </div>
     <div class="col-md-6">
       <?=Html::a('Esqueceu o login?',['painel/esqueci-senha'])?>
     </div>
     <div class="col-md-6">
         <?= Html::submitButton('Entrar <i class="fa fa-caret-right" aria-hidden="true"></i>', ['class' => 'btn btn-transp-white pull-right', 'name' => 'login-button']) ?>
     </div>
     <div class="col-md-12">
       <?= Html::a('Cadastre-se e tenha a oportunidade de encontrar a cara metade.',['institucional/cadastrar']) ?>
     </div>
   </div>
   <?php ActiveForm::end(); ?>
<?php else: ?>
  <div class="row">
    <div class="col-md-2">
      [imagem]
    </div>
    <div class="col-md-10">
      Olá André Luiz, <?=Html::a('<i class="fa fa-user-circle" aria-hidden="true"></i> Meu Painel',['painel/index'],['class'=>'btn btn-xs btn-blue-grey-700'])?>
      <?=Html::a('<i class="fa fa-window-close-o" aria-hidden="true"></i> Sair',['institucional/logout'],['class'=>'btn btn-xs btn-red-700'])?>
    </div>
  </div>
<?php endif; ?>


<!-- end form -->
