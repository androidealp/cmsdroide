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
            'offset' => 'col-md-offset-8',
            'wrapper' => 'col-sm-9',
            'error' => '',
            'hint' => '',
        ],
    ],
]);
?>

<!-- ATENÇÃO NÃO REMOVER O CONTENTFORM -->
<div class="contentform">
  <?= $form->field($model, 'linguagem_id')->dropDownList($languages,['class'=>'form-control']); ?>

  <?= $form->field($model, 'parent')->dropDownList($model->ListaCategoriasPais(),['class'=>'form-control','prompt'=>'Selecionar vínculo']); ?>

  <?= $form->field($model, 'nome')->textInput(['class'=>'form-control']);?>

  <?= $form->field($model, 'alias')->textInput(['class'=>'form-control', 'placeholder'=>'Gera dinamicamente se vazio']);?>

  <?= $form->field($model, 'status')->label(false)->checkBox(['data-truefalse'=>'1','data-off-label'=>'Desativar','data-on-label'=>'Ativar']);?>
</div>


<?php ActiveForm::end(); ?>



<script type="text/javascript">
invoqueForm({
  'select2':1,
  'truefalse':1,
  'test_textarea':1
});
</script>
