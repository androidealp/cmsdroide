<?php
use yii\bootstrap\ActiveForm;
?>

<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Criar Effect</h3>
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
      <?=$form->field($modeljson, 'type')->textInput(['class'=>'form-control', 'placeholder'=>'Tipo de efeito']);?>
    </div>
    <div class="form-group">
      <?=$form->field($modeljson, 'icon')->textInput(['class'=>'form-control', 'placeholder'=>'Icone no font awesome']);?>
    </div>
    <div class="form-group">
      <?=$form->field($modeljson, 'title')->textInput(['class'=>'form-control', 'placeholder'=>'Título do efeito']);?>
    </div>
    <div class="form-group">
      <?=$form->field($modeljson, 'desc')->textArea(['class'=>'form-control', 'placeholder'=>'Descrição resumida']);?>
    </div>


    <?php ActiveForm::end(); ?>
  </div>
  <!-- /.box-body -->
</div>
