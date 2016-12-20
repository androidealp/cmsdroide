<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\Session;
use kartik\date\DatePicker;
$this->title = "Amor Meu - Pagina de Cadastro";
?>
<section class="box-cadastro">
  <div class="container">
   <div class="row">
    <div class="col-md-6 col-md-offset-3">


      <div class="panel panel-default">
                <div class="panel-heading text-center">
                  <h3 class="panel-title">Cadastre-se</h3>
                  <span>Em breve voce poderá achar o amor de sua vida !</span>
                </div>
                <div class="panel-body">
                  <?php if(Yii::$app->session->hasFlash('sucesso')):?>
                  <p class="alert alert-success">
                    <?=Yii::$app->session->getFlash('sucesso'); ?>
                  </p>
                  <?php endif; ?>

                  <?php if(Yii::$app->session->hasFlash('erro')): ?>
                    <p class="alert alert-danger">
                      <?=Yii::$app->session->getFlash('erro'); ?>
                    </p>
                  <?php endif; ?>
                  <?php $form = ActiveForm::begin([
                      'id'=>'form-usersave',
                      'layout' => 'horizontal',
                      'options' => ['enctype' => 'multipart/form-data'],
                      'fieldConfig' => [
                          'template' => "\n{beginWrapper}\n{label}\n{input}\n{hint}\n{error}\n{endWrapper}",
                          'horizontalCssClasses' => [
                              'label' => '',
                              'wrapper' => 'col-md-10 col-md-offset-1',
                              'error' => '',
                              'hint' => '',
                          ],
                      ],
                  ]);?>
                    <?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do usário']);?>
                    <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail para acesso']);?>
                    <?= $form->field($model, 'senha')->passwordInput(['class'=>'form-control', 'placeholder'=>'Digite a senha']);?>
                    <?= $form->field($cadastro, 'genero')->dropDownList(['masculino' => 'Masculino', 'feminino' => 'Feminino']); ?>
                    <?= $form->field($cadastro, 'data_nascimento')->textInput(['class'=>'form-control datepicker']);?>
                    <?= $form->field($cadastro, 'telefones')->textInput(['class'=>'form-control']);?>
                    <?=$form->field($cadastro,'cep')->textInput(['class'=>'form-control']); ?>
                    <?=$form->field($cadastro,'logradouro')->textInput(['class'=>'form-control']); ?>
                    <?=$form->field($cadastro,'cidade')->textInput(['class'=>'form-control']); ?>
                      <?=Html::submitButton('Enviar', ['class'=>'btn btn-danger btn-lg btn-block']); ?>
                  <?php ActiveForm::end(); ?>
                </div>
            </div>




    </div>
  </div>
  </div>
</section>
