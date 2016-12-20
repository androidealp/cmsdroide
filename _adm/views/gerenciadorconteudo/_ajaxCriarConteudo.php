<?php
use yii\bootstrap\ActiveForm;
use app\_adm\components\widgets\editor\Editor;
use himiklab\ckeditor\CKEditor;

$model->autor = Yii::$app->user->identity->nome;
?>

<?php
$form = ActiveForm::begin([
    'id'=>'form-contsave',
    'layout' => 'default',
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



    <?= $form->field($model, 'titulo')->label(false)->textInput([
      'class'=>'form-control form-control-sm',
      'placeholder'=>$model->getAttributeLabel('titulo')
    ])?>

    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'alias')
        ->label(false)
        ->textInput([
          'placeholder'=>$model->getAttributeLabel('alias'),
          'class'=>'form-control form-control-sm','placeholder'=>'Alias (gera automaticamente)'])?>
      </div>

      <div class="col-md-6">
        <?=$form->field($model, 'linguagem_id')->label(false)->dropDownList($languages,[
          'class'=>'form-control form-control-sm',
          'placeholder'=>$model->getAttributeLabel('linguagem_id')
        ]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'autor')
        ->label(false)
        ->textInput([
          'class'=>'form-control form-control-sm ',
          'disabled'=>true,
          'placeholder'=>$model->getAttributeLabel('autor')
        ])?>
      </div>
      <div class="col-md-6">
        <?=$form->field($model, 'categorias_conteudo_id')
        ->label(false)
        ->dropDownList($categorias,[
          'class'=>'form-control form-control-sm']) ?>
      </div>
    </div>

    <?= $form->field($model, 'texto_introdutorio')
    ->label(false)
    ->textArea([
      'placeholder'=>$model->getAttributeLabel('texto_introdutorio'),
      'class'=>'form-control'])?>

    <?php
      echo Editor::widget([
       'model'=>$model,
       'id'=>'conteudo_total'
       ])
        ?>

    <?=$form->field($model, 'status')->label(false)->checkBox(['data-truefalse'=>'1','data-off-label'=>'Desativar','data-on-label'=>'Ativar'])?>


<?php ActiveForm::end(); ?>

<script type="text/javascript">
invoqueForm({
  'select2':1,
  'truefalse':1
});
</script>
