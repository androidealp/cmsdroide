<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<?php

$form = ActiveForm::begin([
    'id' => 'buscar',
    'action'=>$action,
    'method'=>'GET',
    'fieldConfig'=> [
    'template' => "{error}{hint} {input}"],
    'options' => ['class' => '']
]) ?>

<!-- <div class="input-group">
                              <input type="text" class="form-control">
                              <span class="input-group-btn">
                                        <button class="btn btn-inverse" type="button">Go!</button>
                                    </span>
                            </div> -->

<div class="input-group">
  <?=Html::input('text','q','',['placeholder'=>'Quero encontrar ....','class'=>'form-control']); //$form->field($model, 'termo')->textInput(['class' => 'form-control', 'placeholder'=>'Quero encontrar ....'])->label(false)?>
  <div class="input-group-btn">
      <?=Html::submitButton('<i class="fa fa-search"></i>',['class'=>'btn btn-primary','nome'=>'submit','data-submit'=>'#buscar','style'=>"line-height:1.7;"]) ?>
  </div>

</div>


<?php ActiveForm::end() ?>

</div>
