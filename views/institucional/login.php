<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

 ?>

 <!-- Banner  -->
           <div class="cover overlay cover-image-full" style="height: 200px;">
             <img src="img/food1-wide.jpg" alt="">
 <?php echo Html::img('@web/temas/admamormeu/img/modern-creative-workspace-m.jpg ') ?>
            <div class="overlay overlay-bg-black">
               <div class="container">
                 <div class="page-section text-center">
                   <h1 class="margin-none text-overlay">Acesso Restrito</h1>
                   <p class="text-overlay">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consectetur consequatur distinctio earum ipsam.
                  </p>

                 </div>
               </div>
             </div>
           </div>
 <!-- Fim do banner  -->

<div class="container">

  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <div class="panel panel-default">
        <div class="panel-body">
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

         <div class="form-group has-feedback">
             <div class="col-xs-12">
                 <?= Html::submitButton('Acessar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
             </div>
         </div>
         <br />
         <div class="form-group has-feedback margin-top">
             <div class="col-xs-6">
                 <?= Html::a('<i class="glyphicon glyphicon-cog"></i> Criar conta', ['institucional/cadastrar'], ['class' => '']) ?>
             </div>
             <div class="col-xs-6">
                 <?= Html::a('<i class="glyphicon glyphicon-question-sign"></i> Esqueci a senha', ['institucional/novasenha'], ['class' => 'text-danger']) ?>
             </div>
         </div>


         <?php ActiveForm::end(); ?>
        </div>
      </div>




    </div>
    <!-- /col-md-6 col-offset-2  -->
  </div>
  <!-- row -->



</div>
<!-- /.container -->
