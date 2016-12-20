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
             'options' => ['class' => 'form-login-home'],
             'action'=>['institucional/login'],
             'fieldConfig' => [
                 'template' => "{error}{input}",
             ],
      ]);
  ?>

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
         <?= Html::submitButton('LOGAR-SE   <i class="fa fa-caret-right" aria-hidden="true"></i>', ['class' => 'btn btn-login btn-outline btn-primary pull-right', 'name' => 'login-button']) ?>
     </div>
     <div class="clearfix"></div>
     <p class="text-center position-text-login text-linha">
       <?= Html::a('Cadastre-se e tenha a oportunidade de encontrar a cara metade.',['institucional/cadastrar']) ?>
     </p>

   <?php ActiveForm::end(); ?>
<?php else: ?>

<div class="panel-body panel-primary" style="background: #C26C65">
  <div class="media">
    <div class="media-left">
      <a href="">
               <img style="width:25px; height:25px;" class="img-circle" src="/amormeu/site/web/temas/admamormeu/img/modern-creative-workspace-m.jpg " alt="">
      </a>
    </div>
    <div class="media-body">
      <small class="text-grey-300 pull-right"><?=Html::a('Clique aqui para sair',['institucional/logout'],['class'=>'text-danger'])?> </small>
      <h4 class="margin-bottom-none margin-top-none">Seja bem vindo <?php echo \Yii::$app->user->identity->nome ?></h4>
      <p class="margin-none">Clique aqui para acessar o seu painel</p>
    </div>
  </div>
</div>

<!--   <div class="row">
    <div class="col-md-2">
      [imagem]
    </div>
    <div class="col-md-10">
      Olá <strong><?php \Yii::$app->user->identity->nome ?></strong>, <?=Html::a('<i class="fa fa-user-circle" aria-hidden="true"></i> Meu Painel',['painel/index'],['class'=>'btn btn-xs btn-blue-grey-700'])?>
      <?=Html::a('<i class="fa fa-window-close-o" aria-hidden="true"></i> Sair',['institucional/logout'],['class'=>'btn btn-xs btn-red-700'])?>
    </div>
  </div> -->

<?php endif; ?>


<!-- end form -->
