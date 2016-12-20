<?php
use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\helpers\Html;
 ?>
<div class="page-section">
  <div class="row">
    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">

      <div class="panel panel-default">
        <div class="panel-body">
          <?=ActionsBox::widget([
            'titulo'=>$effectSelect->nome_effect,
            'icon'=>$effectSelect->icon,
            'buttons'=>[
              'custom'=>[

                'text'=>'<span class="fa fa-edit"></span> Criar novo '.$effectSelect->nome_effect,
                'type'=>'link',
                'url'=>yii\helpers\Url::to(['widget-effects/criar-efeito','widget'=>$effectSelect->effect_key]),
                'params'=>[
                  'class'=>'btn btn-info btn-sm'
                ]
              ]
            ]
          ]); ?>
        </div>

        <div class="panel-body">
          <?php if($editavel): ?>
            <p class="text-success margin">O arquivo json é totalmente editável</p>
          <?php else: ?>
            <p class="text-danger margin">
              O arquivo json não tem permissão de escrita.
              <code><?=$widgets->$path.$effectSelect->effect_key.'.json'; ?></code>
            </p>
          <?php endif; ?>
        </div>

      </div>

      <div class="row">

        <?=\yii\widgets\ListView::widget([
            'dataProvider' => $dataprovider,
            'itemView' => '_listEffect',
            'emptyText'=>'<p class="alert alert-warning">Nenhum efeito criado.</p>',
            'viewParams'=>['widget'=>$effectSelect->effect_key],
            'itemOptions' => ['class'=>'col-md-4'],
            'layout'=>'{items}{pager}'
          ]);
         ?>

      </div>


    </div>
  </div>
</div>
