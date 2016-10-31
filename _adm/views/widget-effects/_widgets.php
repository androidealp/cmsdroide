<div class="alert alert-info">
  <h3><span class="<?=$model->icon?>"></span><?=$model->nome_effect?> -<small><?=$model->effect_key?></small></h3>
  <p>
     <?=yii\helpers\Html::a('Acessar efeito',['widget-effects/efeito','widget'=>$model->effect_key], ['class'=>'btn btn-danger']) ?>
  </p>
</div>
