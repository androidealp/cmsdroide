<?php
use yii\bootstrap\ActiveForm;
?>

<?php
$form = ActiveForm::begin([
    'id'=>'form-admcriar',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-3',
            'offset' => 'col-md-offset-8',
            'wrapper' => 'col-sm-12',
            'error' => '',
            'hint' => '',
        ],
    ],
]);

?>

<?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do grupo']);?>

<?=$form->field($model, 'menu_permissoes')->dropDownList($model->getPermissoes(),[
  'class'=>'form-control',
  'placeholder'=>'Permissões do menu',
  'multiple'=>true

]);?>


<?=$form->field($model, 'atrib_permissoes')->dropDownList($model->getAttributes(),[
  'class'=>'form-control',
  'placeholder'=>'Permissões Globais',
  'multiple'=>true

]);?>


<?php ActiveForm::end(); ?>



<script type="text/javascript">
invoqueForm({
  'select2':1,

  'test_textarea':1
});
</script>
