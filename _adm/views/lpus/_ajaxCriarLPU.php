<?php
use yii\bootstrap\ActiveForm;
use app\_adm\components\widgets\editor\Editor;
//use himiklab\ckeditor\CKEditor;

$model->autor = Yii::$app->user->identity->nome;
?>

<div class="panel panel-info">

  <div class="panel-body">
    <p class="text-info">
      Crie primeiro a lpu, na segunda etapa acesse e suba os arquivos, adicione mapas e o restante das descrições.
    </p>
  </div>
  <div class="panel-footer">

    <div class="user-panel">
      <div class="pull-left image">
        <?php if(\Yii::$app->user->identity->avatar): ?>
          <img src="<?=\Yii::$app->user->identity->avatar?>" class="" alt="User Image">
        <?php else: ?>
          <img class="img-circle" src="temas/purephoenix/images/admin.png"  alt="User Image">
        <?php endif; ?>
      </div>
      <div class="pull-left info">
        <span class="text-danger"><strong>Autor</strong></span>
        <p class="text-info"><?=\Yii::$app->user->identity->nome; ?> - <?=\Yii::$app->user->identity->cargo; ?></p>
      </div>
    </div>
  </div>

</div>

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
    <div class="col-lg-12">
        <?= $form->field($model, 'titulo')->textInput(['class'=>'form-control']);?>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-12">
        <?=$form->field($model, 'cod_lpu')->textInput(['class'=>'form-control']);?>
    </div>
</div>


<div class="form-group">

  <div class="col-lg-12 margin-bottom">
    <p><label for="">Descrição do serviço</label></p>
     <?php
    echo Editor::widget([
      'model'=>$model,
      'id'=>'descricao'
      ]);
       ?>
   </div>
</div>





<?php ActiveForm::end(); ?>
