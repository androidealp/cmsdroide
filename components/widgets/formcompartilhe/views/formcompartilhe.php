<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php

$form = ActiveForm::begin([
    'id' => 'compartilhe',
    'fieldConfig' =>['template' => "{error}{hint} {input}"],
    'options' => ['class' => 'form-compartilhe'],
]) ?>
	<div class="col-md-12">
		<span id="ver"></span>
	 	<span id="alert-msg"></span>
	</div>
	<div class="form-group">
		<div class="col-md-6 ">
		<?= $form->field($model, 'nome_remetente')->textInput(['class' => 'form-control', 'placeholder'=>'Seu nome'])->label(false)?>
		</div>
		<div class="col-md-6 ">
		<?= $form->field($model, 'email_remetente')->textInput(['class' => '
		form-control', 'placeholder'=>'Seu email'])->label(false)?>
		</div>	
	</div>
	<div class="form-group">
		<div class="col-md-6">
			<?= $form->field($model, 'email_do_amigo')->textInput(['class' => 'form-control', 'placeholder'=>'E-mail de um amigo'])->label(false)?>
		</div>
		<div class="col-md-6">
			<?= Html::a('CONVIDAR AMIGO <i class="fa fa-fw fa-send"></i>', '#',[
                  'data-compartilhe'=>'#compartilhe', 
                  'data-url'=> \yii\helpers\Url::to(['institucional/ajax-cadastrar-amigo']),
                  'class' => 'btn btn-newsletter btn-block btn-outline btn-primary'
                  ]);?>
		</div>
	</div>
<?php ActiveForm::end() ?>
<div class="clearfix"></div>
 <p class="text-center">Envie o convite para um amigo ou pretendente.</p>


