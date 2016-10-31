<?php use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\jui\DatePicker;

?>


<div class="box box-default color-palette-box">
  <!-- action box -->
       <?=ActionsBox::widget(['buttons'=>[
          'default'=>[
              'add'=>[
                'url'=>'index.php?r=_adm/usermanager/ajaxcriargroupadm',
                'title'=>'Adicionar Grupo',
                'modalsize'=>'md',
                'formid'=>'form-admcriar',
                'pajaxid'=>'list-group'],
              'del'=>[
                'url'=>'index.php?r=_adm/usermanager/ajaxdeletargroupadm',
                'confirm'=>'Deseja deletar o(s) grupo(s)?',
                'title'=>'Deletar grupo(s)',
                'gridid'=>'grid-group',
                'pajaxid'=>'list-group'],

          ]
       ]]); ?>
  <!-- fim action box -->

       <div class="content">
       <?php Pjax::begin(['id'=>'list-group']); ?>
              <?= GridView::widget([
              'id'=>'grid-group',
              'dataProvider' => $dataProvider,
              'filterModel' => $model,
              'tableOptions' => ['class' => 'table  table-bordered table-hover'],
              'summary'=>'De <span class="label label-default">{begin}</span> - <span class="label label-default">{end}</span> total de itens <span class="label label-default">{totalCount}</span>',
              'layout'=>"{items}<div class='pull-right'>{summary}</div>{pager}",
              'columns' => [
                   [
                        'attribute' => 'id',
                        'format' => 'text',
                    ],
                    [
                        'attribute' => 'nome',
                        'format' => 'html',
                        'value'=>function($data){
                          return Html::a(Html::encode($data->nome),['usermanager/editargroupadm','id'=>$data->id]);
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
