<?php
use yii\bootstrap\ActiveForm;
?>

<?php
$form = ActiveForm::begin([
    'id'=>'form-admcriar',
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
<?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do grupo']);?>
</div>

<div class="form-group">
<?=$form->field($model, 'atrib_permissoes')->checkBoxList($model->getPermissoes());?>
</div>



<?php ActiveForm::end(); ?>
