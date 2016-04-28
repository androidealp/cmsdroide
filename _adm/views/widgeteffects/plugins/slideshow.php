<?php
use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\widgets\Pjax;
use yii\grid\GridView;
 ?>

<div class="row">
  <div class="col-md-12">
    <?php if($effects::$editavel): ?>
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">slideshow.json</h3>
        </div>
        <div class="panel-body">
          <p class="text-success">O arquivo json é totalmente editável</p>
          
        </div>
      </div>
    <?php else:?>
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">slideshow.json</h3>
        </div>
        <div class="panel-body">
          <p class="text-danger">
            O arquivo json não tem permissão de escrita
          </p>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<div class="box box-default color-palette-box">
  <!-- action box -->
       <?=ActionsBox::widget(['buttons'=>[
          'default'=>[
              'add'=>['url'=>'index.php?r=_adm/widgeteffects/ajaxcriarslideshow','title'=>'Criar Slideshow','modalsize'=>'lg','formid'=>'form-contsave','pajaxid'=>'list-content'],
              'del'=>['url'=>'index.php?r=_adm/widgeteffects/ajaxdeletarslideshow','confirm'=>'Deseja deletar o(s) Slideshow(s)?', 'title'=>'Deletar Slideshow(s)','gridid'=>'grid-content','pajaxid'=>'list-content'],
          ]
       ]]); ?>
  <!-- fim action box -->

       <div class="content">
       <?php Pjax::begin(['id'=>'list-content']); ?>
              <?= GridView::widget([
              'id'=>'grid-content',
              'dataProvider' => $provider,
              'tableOptions' => ['class' => 'table  table-bordered table-hover'],
              'summary'=>'De <span class="label label-default">{begin}</span> - <span class="label label-default">{end}</span> total de itens <span class="label label-default">{totalCount}</span>',
              'layout'=>"{items}<div class='pull-right'>{summary}</div>{pager}",
              'columns' => [
                    [
                        'attribute' => 'nome',
                        'format' => 'html',
                        'value'=>function($data){
                          return Html::a(Html::encode($data->nome),['widgeteffects/editarslidshow','id'=>$data->id]);
                        }

                    ],

                    [
                      'class' => 'yii\grid\CheckboxColumn',
                    ]
                ],
              ]);?>
        <?php Pjax::end(); ?>
      </div>

</div>
