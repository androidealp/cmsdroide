<?php use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\jui\DatePicker;


$sumario = <<<HTML
<div class="dataTables_info">
De <span class="">{begin}</span> - <span class="">{end}</span> total de itens <span class="">{totalCount}</span>
</div>

HTML;

?>

<div class="page-section">
  <div class="row">
    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">

          <!-- action box -->
               <?=ActionsBox::widget(['buttons'=>[
                  'default'=>[
                      'add'=>[
                        'url'=>\yii\helpers\Url::to(['usermanager/ajax-criar-grupo-adm']),
                        'title'=>'Adicionar Grupo',
                        'modalsize'=>'md',
                        'formid'=>'form-admcriar',
                        'pajaxid'=>'list-group'],
                      'del'=>[
                        'url'=>\yii\helpers\Url::to(['usermanager/ajax-deletar-group-adm']),
                        'confirm'=>'Deseja deletar o(s) grupo(s)?',
                        'title'=>'Deletar grupo(s)',
                        'gridid'=>'grid-group',
                        'pajaxid'=>'list-group'],

                  ]
               ]]); ?>
          <!-- fim action box -->

        </div>
      </div>

      <div class="panel panel-default">
        <?php Pjax::begin(['id'=>'list-group','options'=>['class'=>"dataTables_wrapper"]]); ?>
        <?=GridView::widget([
        'id'=>'grid-group',
        'dataProvider' => $dataProvider,
        'filterModel' => $model,
        'tableOptions' => ['class' => 'table v-middle'],
        'pager'=>[
          'pageCssClass'=>'pagination',
          'hideOnSinglePage'=>false
        ],
        'summary'=>$sumario,
        'layout'=>"{items}<div class='row'><div class='col-sm-5'>{summary}</div><div class='col-sm-7'><div class='dataTables_paginate paging_simple_numbers'>{pager}</div></div></div>",
        'columns' => [
             [
                  'attribute' => 'id',
                  'format' => 'text',
              ],
              [
                  'attribute' => 'nome',
                  'format' => 'html',
                  'value'=>function($data){

                    $html = Html::encode($data->nome);
                    if($data->checkAcoes('editar'))
                    {
                      $html = Html::a(Html::encode($data->nome),['usermanager/editar-grupo-adm','id'=>$data->id]);
                    }


                    return $html;
                  }

              ],
              [
                  'attribute' => 'Adms vinculados',
                  'format' => 'html',
                  'headerOptions' => ['style' => 'width:15%'],
                  'value'=>function($data){
                    $html = "<span class='label label-danger text-center'>{$data->count_users}</label>";
                    return $html;
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
  </div>
</div>
