<?php
//use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\helpers\Html;

use yii\widgets\ListView;
 ?>

 <div class="row">
   <div class="col-md-12">

     <?=\yii\widgets\ListView::widget([
         'dataProvider' => $dataProvider,
         'itemView' => '_widgets',
         'emptyText'=>'<p class="alert alert-warning">Nenhum widget criado.</p>',
         //'viewParams'=>['widget'=>$effectSelect->effect_key],
         'layout'=>'{items}{pager}'
       ]);
      ?>

   </div>
 </div>
