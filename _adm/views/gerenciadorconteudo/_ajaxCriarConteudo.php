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
  <div class="col-md-12">
    <?= $form->field($model, 'titulo')->label(false)->textInput([
      'class'=>'form-control form-control-sm',
      'placeholder'=>$model->getAttributeLabel('titulo')
    ]);?>
  </div>
</div>
<div class="form-group">

    <div class="col-md-6">
        <?=$form->field($model, 'linguagem_id')->label(false)->dropDownList($languages,[
          'class'=>'form-control form-control-sm',
          'placeholder'=>$model->getAttributeLabel('linguagem_id')
        ]); ?>
    </div>
     <div class="col-md-6">
        <?= $form->field($model, 'autor')
        ->label(false)
        ->textInput([
          'class'=>'form-control form-control-sm',
          'placeholder'=>$model->getAttributeLabel('autor')
        ]);?>
    </div>
</div>

<div class="form-group">
    <div class="col-md-6">
      <?=$form->field($model, 'categorias_conteudo_id')
      ->label(false)
      ->dropDownList($categorias,[
        'class'=>'form-control form-control-sm']); ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'alias')
        ->label(false)
        ->textInput([
          'placeholder'=>$model->getAttributeLabel('alias'),
          'class'=>'form-control form-control-sm','placeholder'=>'Gera automaticamente']);?>
    </div>
</div>

<div class="form-group">
  <div class="col-md-12">
    <?= $form->field($model, 'texto_introdutorio')
    ->label(false)
    ->textArea([
      'placeholder'=>$model->getAttributeLabel('texto_introdutorio'),
      'class'=>'form-control']);?>
  </div>
</div>
<div class="form-group">
  <div class="col-md-12">
     <?php /*$form->field($model, 'texto_completo')->widget(CKEditor::className(), [
      'editorOptions' => ['height' => '500px']
  ]);*/
    echo Editor::widget([
      'model'=>$model,
      'id'=>'conteudo_total'
      ]);
       ?>
  </div>

</div>

<div class="form-group">
            <?=$form->field($model, 'status')->checkBox(['label'=>'Publicado']);?>
        </div>
<?php ActiveForm::end(); ?>
