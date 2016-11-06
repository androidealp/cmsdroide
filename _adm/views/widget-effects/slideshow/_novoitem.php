<?php

use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;

 ?>

 <?php
 $form = ActiveForm::begin([
     'id'=>'form-newitem',
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


<?= $form->field($model, 'items[titulo]')->label('Titulo')->textInput(['class'=>'form-control']);?>
<?= $form->field($model, 'items[desc]')->label('Descrição')->textArea(['class'=>'form-control']);?>
<?= $form->field($model, 'items[urlbt]')->label('Url do botão')->textInput(['class'=>'form-control','placeholder'=>'Se não tiver link não colocar']);?>
<?= $form->field($model, 'items[texto_bt]')->label('Texto do botão')->textInput(['class'=>'form-control','placeholder'=>'Se não tiver link não colocar']);?>
<?= $form->field($model, 'items[image]')->label('Imagem')->widget(InputFile::className(),[
  'language'      => 'pt-BR',
  'controller'    => '_adm/elfinder',
  'path' => 'media/',
  //'filter'        => 'image',
  'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
  'options'       => ['class' => 'form-control'],
  'buttonOptions' => ['class' => 'btn btn-default'],
  'multiple'      => false
]); ?>
<?= $form->field($model, 'items[video]')->label('Video do Youtube')->textInput(['class'=>'form-control']);?>
<?php ActiveForm::end(); ?>
