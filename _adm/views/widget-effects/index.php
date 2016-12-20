<?php
use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\helpers\Html;

use yii\widgets\ListView;
 ?>

 <div class="page-section">
   <div class="row">
     <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">

       <div class="panel panel-default">
         <div class="panel-body">
           <?=ActionsBox::widget(); ?>
         </div>
       </div>

     <?=\yii\widgets\ListView::widget([
         'dataProvider' => $dataProvider,
         'itemView' => '_widgets',
         'emptyText'=>'<p class="alert alert-warning">Nenhum widget criado.</p>',
         //'viewParams'=>['widget'=>$effectSelect->effect_key],
         'layout'=>'<div class="row" >{items}</div>{pager}'
       ]);
      ?>

    </div>
  </div>
</div>
