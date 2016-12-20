<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

 <div class="row">

<?php
	
$form = ActiveForm::begin([	
    'id' => 'cadnewsletter',
    'fieldConfig'=> [
    'template' => "{error}{hint} {input}"],
    'options' => ['class' => 'form-inline']
]) ?>

	<span id="ver"></span>
 	<span id="alert-msg"></span>
	<div class="form-group">
		<?= $form->field($model, 'nome')->textInput(['class' => 'form-control', 'placeholder'=>'Seu nome'])->label(false)?>
	</div>

	<div class="form-group">	
		<?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder'=>'Digite aqui seu e-mail'])->label(false)?>
		<?php Html::error($model, 'email', ['class' => 'help-block help-block-error']) ?>
	</div>

	<div class="form-group">	

		  <?= Html::a('CADASTRAR <i class="fa fa-fw fa-send"></i>', '#',[
                  'data-newsletter'=>'#cadnewsletter', 
                  'data-url'=> \yii\helpers\Url::to(['institucional/ajax-cad-newsletter']),
                  'class' => 'btn pull-right btn-newsletter btn-primary'
                  ]);?>
	</div>
<?php ActiveForm::end() ?>
</div>


