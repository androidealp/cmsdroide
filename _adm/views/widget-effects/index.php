<?php
//use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\helpers\Html;
 ?>

 <div class="row">
   <div class="col-md-12">

     <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="<?=$effectSelect->icon ?> text-danger"></i> <?=$effectSelect->nome_effect ?></h3>

              <div class="box-tools pull-right">

                <?=Html::a('<span class="fa fa-edit"></span> Criar novo '.$effectSelect->nome_effect,
                ['widget-effects/criar-efeito','widget'=>$effectSelect->effect_key],[
                  'class'=>'btn btn-info btn-sm'
                ])?>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php if($editavel): ?>
                <p class="text-success margin">O arquivo json é totalmente editável</p>
              <?php else: ?>
                <p class="text-danger margin">
                  O arquivo json não tem permissão de escrita.
                  <code><?=$widgets->$path.$effectSelect->effect_key.'.json'; ?></code>
                </p>
              <?php endif; ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box  -->

   </div>
 </div>


 <div class="row">
    <?=\yii\widgets\ListView::widget([
        'dataProvider' => $dataprovider,
        'itemView' => '_listEffect',
        'emptyText'=>'<p class="alert alert-warning">Nenhum efeito criado.</p>',
        'viewParams'=>['widget'=>$effectSelect->effect_key],
        'layout'=>'{items}{pager}'
      ]);
     ?>
       </div>
