<?php
use yii\bootstrap\ActiveForm;
?>

<?php
$form = ActiveForm::begin([
    'id'=>'form-catsave',
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

<?php ActiveForm::end(); ?>



