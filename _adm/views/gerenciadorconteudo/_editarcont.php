<<<<<<< HEAD
<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\_adm\components\widgets\editor\Editor;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;
$ckeditorOptions = ElFinder::ckeditorOptions('_adm/elfinder',[/* Some CKEditor Options */]);
?>

<?php
$form = ActiveForm::begin([
    'id'=>'form-conteditar',
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
<?= $form->field($model, 'linguagem_id')->dropDownList($languages,['class'=>'form-control']); ?>
</div>

<div class="form-group">
  <?= $form->field($model, 'imagem_pre')->widget(InputFile::className(),[
    'language'      => 'pt-BR',
    'controller'    => '_adm/elfinder',
    'path' => 'media/',
    'filter'        => 'image',
    'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
    'options'       => ['class' => 'form-control'],
    'buttonOptions' => ['class' => 'btn btn-default'],
    'multiple'      => false
  ]); ?>

</div>

<div class="form-group">
  <?= $form->field($model, 'imagem_pos')->widget(InputFile::className(),[
    'language'      => 'pt-BR',
    'controller'    => '_adm/elfinder',
    'path' => 'media/',
    'filter'        => 'image',
    'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
    'options'       => ['class' => 'form-control'],
    'buttonOptions' => ['class' => 'btn btn-default'],
    'multiple'      => false
  ]); ?>
</div>

<div class="form-group">
<?= $form->field($model, 'titulo')->textInput(['class'=>'form-control']);?>
</div>

<div class="form-group">
<?= $form->field($model, 'alias')->textInput(['class'=>'form-control', 'placeholder'=>'Gera dinamicamente se vazio']);?>
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
<div class="form-group">
    <?=$form->field($model, 'status')->checkBox(['label'=>'Publicado']);?>
</div>
<div class="form-group">
   <?php /*$form->field($model, 'texto_completo')->widget(CKEditor::className(), [
    'editorOptions' => ['height' => '500px']
]);*/
  echo Editor::widget([
    'model'=>$model,
    'id'=>'texto_completo',
    'ajaxSave'=>false,
    'options'=>$ckeditorOptions
    ]);
     ?>
</div>


<div class="">
<?= Html::submitButton('Gravar', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button']) ?>
</div>

<?php ActiveForm::end(); ?>
=======
<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\_adm\components\widgets\editor\Editor;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;
$ckeditorOptions = ElFinder::ckeditorOptions('_adm/elfinder',[/* Some CKEditor Options */]);
?>
<?php
$form = ActiveForm::begin([
    'id'=>'form-conteditar',
    ///'layout' => 'horizontal',
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
<div class="row">
  <div class="col-md-7">

    <div class="form-group">
        <?= $form->field($model, 'texto_introdutorio')->textArea(['class'=>'form-control','placeholder'=>'Limite máximo 250 caracteres','style'=>'width:100%']);?>
    </div>

    <div class="form-group">
       <?php /*$form->field($model, 'texto_completo')->widget(CKEditor::className(), [
        'editorOptions' => ['height' => '500px']
    ]);*/
      echo Editor::widget([
        'model'=>$model,
        'id'=>'conteudo_total',
        'ajaxSave'=>false,
        'options'=>$ckeditorOptions
        ]);
         ?>
    </div>


  </div>
  <div class="col-md-5">
    <div class="box box-default">
      <div class="box-body">
        <div id="erros">
        </div>
        <div class="form-group">
        <?= $form->field($model, 'titulo')->textInput(['class'=>'form-control']);?>
        </div>
        <div class="form-group">
        <?= $form->field($model, 'alias')->textInput(['class'=>'form-control', 'placeholder'=>'Gera dinamicamente se vazio']);?>
        </div>
        <div class="form-group">
        <?= $form->field($model, 'linguagem_id')->dropDownList($languages,['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
          <?= $form->field($model, 'imagem_pre')->widget(InputFile::className(),[
            'language'      => 'pt-BR',
            'controller'    => '_adm/elfinder',
            'path' => 'media/',
            'filter'        => 'image',
            'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
            'options'       => ['class' => 'form-control'],
            'buttonOptions' => ['class' => 'btn btn-default'],
            'multiple'      => false
          ]); ?>

        </div>

        <div class="form-group">
          <?= $form->field($model, 'imagem_pos')->widget(InputFile::className(),[
            'language'      => 'pt-BR',
            'controller'    => '_adm/elfinder',
            'path' => 'media/',
            'filter'        => 'image',
            'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
            'options'       => ['class' => 'form-control'],
            'buttonOptions' => ['class' => 'btn btn-default'],
            'multiple'      => false
          ]); ?>
        </div>

        <div class="form-group">
            <div class="col-lg-6">
                <?=$form->field($model, 'categorias_conteudo_id')->dropDownList($categorias,['class'=>'form-control']); ?>
            </div>
            <div class="col-lg-6">
              <?=$form->field($model, 'status')->checkBox(['label'=>'Publicado']);?>
            </div>

        </div>


        <div class="">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button']) ?>
        </div>
      </div>
    </div>

  </div>

</div>

    <?php ActiveForm::end(); ?>
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
