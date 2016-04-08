<?php
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;
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
  <?= $form->field($model, 'avatar')->widget(InputFile::className(),[
    'language'      => 'pt-BR',
    'controller'    => '_adm/elfinder',
    'path' => 'image',
    'filter'        => 'image',
    'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
    'options'       => ['class' => 'form-control'],
    'buttonOptions' => ['class' => 'btn btn-default'],
    'multiple'      => false
  ]); ?>
</div>

<div class="form-group">
<?= $form->field($model, 'grupos_id')->dropDownList($model->GruposList(),['class'=>'form-control']); ?>
</div>

<div class="form-group">
<?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do usário']);?>
</div>

<div class="form-group">
<?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail para acesso']);?>
</div>

<div class="form-group">
<?= $form->field($model, 'senha')->passwordInput(['class'=>'form-control', 'placeholder'=>'Dirite a senha']);?>
</div>


<div class="form-group">
<?= $form->field($model, 'status_acesso')->checkBox(['label'=>'Ativar']);?>
</div>

<?php ActiveForm::end(); ?>
