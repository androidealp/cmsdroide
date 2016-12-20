<?php
  use yii\helpers\Html;
  use yii\helpers\Url;
  use app\components\widgets\widgeteffect\getEffect;
 ?>

 <?=getEffect::widget([
  'tipo'=>'static',
  'chave'=>'slide-RtPmHRYF_cZfajw30KVOZ8_f4b2tiDZk',
  'layout'=>'static-default'
  ]);  ?>



<div class="container">
<h1><?php echo $model->titulo; ?></h1>

<?php if ($model->imagem_pos) :  ?>
  <div class="image_content">
      <?php Html::img('@web/'.$model->imagem_pos, ['alt'=>$model->titulo], ['class' => 'thumbnail img-responsive']); ?>
  </div>
<?php endif; ?>

<?php if ($model->conteudo_total) :  ?>
  <?php echo $model->conteudo_total; ?>
<?php endif; ?>

<?php if ($model->video_url): ?>
  <div class="panel panel-default">
    <div class="panel-body">
        <?=\app\components\widgets\Player\Player::widget(['media'=>$model->video_url]);?>
    </div>
  </div>

<?php endif; ?>






</div>
