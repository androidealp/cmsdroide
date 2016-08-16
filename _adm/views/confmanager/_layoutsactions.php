<?php
//print_r($modeljson->pages);
use yii\helpers\Html;
//activeTextInput
 ?>

  <div class="form-group">
    <?=Html::activeTextInput($modeljson, 'page_action['.$k.']', ['class'=>'form-control', 'placeholder'=>'path da action'] ); ?>
    <?=Html::activeTextInput($modeljson, 'page_layout['.$k.']', ['class'=>'form-control', 'placeholder'=>'arquivo php do layout ex: main'] ); ?>
    <?php //$form->field($modeljson, 'page_action['.$k.']')->textInput(['class'=>'form-control', 'placeholder'=>'path da action']);?>
    <?php //$form->field($modeljson, 'page_layout['.$k.']')->textInput(['class'=>'form-control', 'placeholder'=>'arquivo php do layout ex: main']);?>
    <a href="#" class="btn btn-danger btn-xs">deletar</a>
  </div>
