<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<?php
$form = ActiveForm::begin([
    'id'=>'form-cateditar',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-3',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]);
?>

<div id="erros">
</div>
<div class="form-group">
<?= $form->field($model, 'linguagem_id')->dropDownList($languages,['class'=>'form-control']); ?>
</div>

<div class="form-group">
<?= $form->field($model, 'nome')->textInput(['class'=>'form-control']);?>
</div>

<div class="form-group">
<?= $form->field($model, 'alias')->textInput(['class'=>'form-control', 'placeholder'=>'Gera dinamicamente se vazio']);?>
</div>

<div class="form-group">
<?= $form->field($model, 'status')->checkBox(['label'=>'Publicado']);?>
</div>

<div class="">
<?= Html::submitButton('Gravar', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button']) ?>
</div>

<?php ActiveForm::end(); ?>