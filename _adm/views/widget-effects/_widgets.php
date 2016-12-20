<div class="col-md-4">
  <div class="panel panel-default widget-user-1 text-center">

    <div class="avatar">
      <span class="<?=$model->icon?> fa-5x text-primary" class="img-circle"></span>
      <h3><?=$model->nome_effect?></h3>

      <?=yii\helpers\Html::a('Visualizar <i class="fa fa-check-circle fa-fw"></i>',['widget-effects/efeito','widget'=>$model->effect_key], ['class'=>'btn btn-success']) ?>

    </div>

  </div>

</div>
