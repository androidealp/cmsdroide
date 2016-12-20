<?php
use yii\helpers\Html;
use yii\helpers\Url;
$idcript = \app\components\helpers\Tools::Cript($model->id);
$nome = isset($model->user->nome)?$model->user->nome:'';
 ?>

<div class="well">
  <strong><i class="fa fa-fw fa-user"></i> <?=$nome?> <span class="pull-right"><i class="fa fa-fw fa-comments"></i>  <?=Html::encode($model->assunto)?></span></strong><br />
  <div class="box-msg">
      <?=Html::encode($model->mensagem)?><br />
  </div>
  <div class="resposstas">
    <?php foreach ($model->respostas as $k => $resposta): ?>
      <div class="resp_item">
        <?= Html::encode($resposta->resposta)?>
      </div>
    <?php endforeach; ?>
  </div>


  <div id="responder">
  </div>

  <p>
    <a href="#" class="pull-right"
    data-ajaxrender="<?=Url::to(['blog/ajax-form-responder','comentario'=>$idcript])?>" data-ajaxid="#responder">
      <small class="text-small"><i class="fa fa-fw fa-reply-all"></i> Responder</small>
  </a>
</p>
</div>
