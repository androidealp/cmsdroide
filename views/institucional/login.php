<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';


?>

    <p class="login-box-msg">Acesso somente para prestadores</p>
     <?php
    $form = ActiveForm::begin([
                'id' => 'login-form',
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

   <div class="row">
        <div class="col-xs-12">
            <?= Html::submitButton('Acessar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
        </div>
   </div>
 <br />
   <div class="row">
        <div class="col-xs-6">
            <?= Html::a('<i class="glyphicon glyphicon-cog"></i> Criar conta', ['institucional/cadastrar'], ['class' => '']) ?>
        </div>
        <div class="col-xs-6">
            <?= Html::a('<i class="glyphicon glyphicon-question-sign"></i> Esqueci a senha', ['institucional/novasenha'], ['class' => 'text-danger']) ?>
        </div>
   </div>


    <?php ActiveForm::end(); ?>



</div><!-- /.login-box-body -->
