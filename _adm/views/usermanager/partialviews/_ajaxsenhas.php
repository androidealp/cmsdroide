<?php
use yii\helpers\Html;
//$model

?>

<div class="panel panel-box">
  <div class="box-body">
    <div class="form-group">
        <?php echo Html::activePasswordInput($model,'senha',[
          'class'=>'form-control', 'placeholder'=>'Inserir nova senha'
        ]); ?>

        <div class="help-block help-block-error ">
          <?php echo Html::error($model,'senha'); ?>
        </div>

      </div>
    <div class="form-group">
        <?php echo Html::activePasswordInput($model,'redefinir_senha',[
          'class'=>'form-control', 'placeholder'=>'Digite a senha novamente'
        ]); ?>
        <div class="help-block help-block-error ">
          <?php echo Html::error($model,'redefinir_senha'); ?>
        </div>
    </div>
  </div>
</div>
