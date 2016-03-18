<?php
use yii\bootstrap\ActiveForm;
use app\_adm\components\widgets\editor\Editor;
//use himiklab\ckeditor\CKEditor;

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

    <div class="col-lg-6">
        <?=$form->field($model, 'linguagem_id')->dropDownList($languages,['class'=>'form-control']); ?>
    </div>
     <div class="col-lg-6">
        <?= $form->field($model, 'autor')->textInput(['class'=>'form-control']);?>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6">
        <?= $form->field($model, 'titulo')->textInput(['class'=>'form-control']);?>
    </div>
    <div class="col-lg-6">
        <?= $form->field($model, 'alias')->textInput(['class'=>'form-control','placeholder'=>'Gera automaticamente']);?>
    </div>
</div>
<div class="form-group">
    <div class="col-lg-6">
        <?=$form->field($model, 'categorias_conteudo_id')->dropDownList($categorias,['class'=>'form-control']); ?>
    </div>

    <div class="col-lg-6">
        <?=$form->field($model, 'destaque')->dropDownList([0=>'inativo',1=>'ativo'],['class'=>'form-control']); ?>
    </div>
    
</div>
<div class="form-group">

     <div class="col-lg-12">
    <?= $form->field($model, 'texto_introdutorio')->textArea(['class'=>'form-control','placeholder'=>'Limite máximo 250 caracteres']);?>
    </div>
    
</div>

<div class="form-group teste">
   <?php /*$form->field($model, 'texto_completo')->widget(CKEditor::className(), [
    'editorOptions' => ['height' => '500px']
]);*/
  echo Editor::widget([
    'model'=>$model,
    'id'=>'texto_completo'
    ]);
     ?>
</div>

<div class="form-group">
            <?=$form->field($model, 'status')->checkBox(['label'=>'Publicado']);?>
        </div>





<?php ActiveForm::end(); ?>

