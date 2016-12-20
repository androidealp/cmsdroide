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
                    'template' => "\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => '',
                        'wrapper' => 'col-md-10 col-md-offset-1',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
            ]);?>
              <?= $form->errorSummary([$model,$cadastro],['class'=>'alert alert-danger']); ?>
              <?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do usário']);?>
              <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail para acesso']);?>
              <?= $form->field($model, 'senha')->passwordInput(['class'=>'form-control', 'placeholder'=>'Digite a senha']);?>
              <?= $form->field($model, 'redefinir_senha')->passwordInput(['class'=>'form-control', 'placeholder'=>'Re-digite a senha']);?>
              <?= $form->field($cadastro, 'genero')->dropDownList([''=>'Selecione um genero','masculino' => 'Masculino', 'feminino' => 'Feminino']); ?>
              <?= $form->field($cadastro, 'data_nascimento')->textInput(['class'=>'form-control datepicker','placeholder'=>'Data de Nascimento']);?>
              <?=$form->field($cadastro,'cep')->textInput(['class'=>'form-control cep','placeholder'=>'CEP']); ?>
              <?=$form->field($cadastro,'logradouro')->textInput(['class'=>'form-control','placeholder'=>'Endereço']); ?>
              <?=$form->field($cadastro,'cidade')->textInput(['class'=>'form-control','placeholder'=>'Cidade']); ?>
              <?=$form->field($cadastro,'estados_id')->dropDownList($listestados,['prompt'=>'Selecione um estado']); ?>
                <?=Html::submitButton('Enviar', ['class'=>'btn btn-danger btn-lg btn-block']); ?>
            <?php ActiveForm::end(); ?>
          </div>
      </div>
  </div>
  </div>
  </div>
</section>
