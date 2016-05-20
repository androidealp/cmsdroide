<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<?php
$form = ActiveForm::begin([
    'id'=>'form-addservico',
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


<div>
<?=$form->field($model, 'servico_id')->dropDownList($model->ServicosList(),['class'=>'form-control', 'data-select'=>'']); ?>
</div>

<div><?=$form->field($model, 'servico_valor')->widget(\yii\widgets\MaskedInput::className(),[
  'clientOptions' => [
        'alias' => 'decimal',
        'digits' => 2,
        'digitsOptional' => false,
        'radixPoint' => ',',
        'groupSeparator' => '.',
        'autoGroup' => true,
        'removeMaskOnSubmit' => false,
    ],
  'options'=>['class'=>'form-control']
]);?>
</div>

<?= $form->field($model, 'servico_nome')->hiddenInput()->label(false);?>

<?php ActiveForm::end(); ?>
