<?php
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;
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

  <?=  $form->field($model, 'avatar')->widget(InputFile::className(),[
    'language'      => 'pt-BR',
    'controller'    => '_adm/elfinder',
    'path' => 'image',
    'filter'        => 'image',
    'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
    'options'       => ['class' => 'form-control', 'placeholder'=>'Imagem do avatar (não é obrigatório)'],
    'buttonOptions' => ['class' => 'btn btn-default'],
    'multiple'      => false
  ]); ?>


<?=$form->field($model, 'grupos_id')->dropDownList($model->GruposList(),['class'=>'form-control']); ?>

<?= $form->field($model, 'cargo')->textInput(['class'=>'form-control','placeholder'=>'Informe o cargo deste administrador']);?>

<?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do usuário']);?>

<?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail para acesso']);?>

<?= $form->field($model, 'senha')->passwordInput(['class'=>'form-control', 'placeholder'=>'Digite a senha']);?>

<?= $form->field($model, 'redefinir_senha')->passwordInput(['class'=>'form-control', 'placeholder'=>'Repetir a senha']);?>

<?= $form->field($model, 'status_acesso')->label(false)->checkBox(['data-truefalse'=>'1','data-off-label'=>'Desativar','data-on-label'=>'Ativar']);?>


<?php ActiveForm::end(); ?>

<script type="text/javascript">
invoqueForm({
  'select2':1,
  'truefalse':1,
  'test_textarea':1
});
</script>
