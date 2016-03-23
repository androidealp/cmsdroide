<?php
use yii\bootstrap\ActiveForm;
?>

<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Editar o tema</h3>
  </div>
  <div class="box-body">
    <?php
    $form = ActiveForm::begin([
        'id'=>'form-themejson',
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
      <?= $form->field($modeljson, 'area')->dropDownList($modeljson->listarea,['class'=>'form-control']); ?>
    </div>
    <div class="form-group">
      <?=$form->field($modeljson, 'tema')->textInput(['class'=>'form-control', 'placeholder'=>'Nome do tema']);?>
    </div>
    <div class="form-group">
      <?=$form->field($modeljson, 'default')->checkBox(['label'=>'Default']);?>
    </div>
    <div class="form-group">
      <?=$form->field($modeljson, 'layout')->textInput(['class'=>'form-control', 'placeholder'=>'nome do arquivo de Layout ex, man']);?>
    </div>


    <?php ActiveForm::end(); ?>
  </div>
  <!-- /.box-body -->
</div>
