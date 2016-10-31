<?php
use yii\bootstrap\ActiveForm;

?>


<?php
$form = ActiveForm::begin([
    'id'=>'form-usersave',
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

<div class="nav-tabs-custom">

<p class="text-info">
  Informe o e-mail cadastrado no sistema, enviaremos um e-mail com link para ativação da senha.
</p>

               <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail para acesso']);?>



         </div>

<?php ActiveForm::end(); ?>
