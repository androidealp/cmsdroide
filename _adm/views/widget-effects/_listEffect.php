<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;


?>
  <div class="panel panel-default">
    <div class="panel-body">

      <!-- Add the bg color to the header using any of the bg-* classes -->
       <div class="widget-user-header bg-aqua-active">
        <h3 class="widget-user-username title-theme"><?=$model['nome'] ?>
          <?=Html::a('<i class="fa fa-edit"></i>',
          ['/_adm/widget-effects/editar','widget'=>$widget,'key'=>$model['id']],
          ['class'=>'btn btn-primary btn-xs pull-right'] ); ?>
        </h3>
      </div>
      <div class="widget-user-image">
        <?php if ($model['item_main']): ?>
            <?=Html::img(\Yii::$app->request->baseUrl.'/'.$model['item_main'],['width'=>'100%'])  ?>
        <?php endif; ?>

      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-6 border-right">
            <div class="description-block">
              Itens: <span class="badge bg-blue"><?=$model['count_itens']?> </span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <div class="description-block">
              Status: <?=isset($model['status'])?'<span class="badge bg-green">Ativo</span>':'<span class="pull-right badge bg-red">Inativo</span>';  ?>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->

          <div class="col-sm-12">
            <div class="description-block">


              <?php
               // este cliente não pode remover os banners
              // Html::a('<i class="fa fa-times-circle-o"></i> Deletar',['/_adm/widget-effects/deletar','widget'=>$model['id']],[
              //   'class'=>'btn btn-danger'
              // ] ); ?>

            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>

    </div>
    <!-- fim painel-box-->
