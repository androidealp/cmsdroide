<?php use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\helpers\Url;

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
          <?=ActionsBox::widget(['buttons'=>[
            'custom'=>[
              'type'=>'link',
              'text'=>'Gerenciar Comentários ',
              'url'=>['gerenciadorconteudo/comentarios'],
              'params'=>[

                'class'=>'btn btn-success btn-sm',
              ]
            ],
             'default'=>[
               'del'=>['url'=>Url::to(['gerenciadorconteudo/ajax-deletar-respostas']),'confirm'=>'Esta ação irá deletar as respostas e seus vinculos com o usuários, deseja continuar?', 'title'=>'Deletar Respostas','gridid'=>'grid-comentarios','pajaxid'=>'list-comentarios'],
             ]
          ]]); ?>
        </div>
      </div>

      <!-- <h4 class="page-section-heading">Responsive Table</h4> -->
      <div class="panel panel-default">
        <!-- Progress table -->
        <?php Pjax::begin(['id'=>'list-comentarios',
        'options'=>['class'=>"dataTables_wrapper"]
      ]); ?>

        <?= GridView::widget([
        'id'=>'grid-comentarios',
        'dataProvider' => $dataProvider,
        //'filterModel' => $model,
        'tableOptions' => ['class' => 'table v-middle'],
        'summary'=>$sumario,
        'pager'=>[
          'pageCssClass'=>'pagination',
          'hideOnSinglePage'=>false
        ],
        'layout'=>"{items}<div class='row'><div class='col-sm-5'>{summary}</div><div class='col-sm-7'><div class='dataTables_paginate paging_simple_numbers'>{pager}</div></div></div>",
        'columns' => [
             [
                  'attribute' => 'id',
                  'format' => 'text',
              ],
              [
                'attribute' => 'user.nome',
                'format' => 'text',
              ],
              [
                'attribute' => 'comentario.assunto',
                'format' => 'text',
              ],
              [
                  'attribute' => 'resposta',
                  'format' => 'raw',
                  'value'=>function($data){
                    return Html::a(substr(Html::encode($data->resposta), 0,50).'...','#',['data-btalert'=>Html::encode($data->resposta),'title'=>'Reposta']);
                  }
              ],
              [
                  'attribute' => 'status_resposta',
                  'format' => 'raw',
                  'value'=>function($data){

                    $iconFalse = '<span class="fa fa-times text-danger faa-pulse fa-2x animated-hover text-center block"></span>';
                    $iconTrue = '<span class="fa fa-check fa-2x text-success text-center block faa-pulse animated-hover"></span>';

                    $status = $iconFalse;

                    if($data->status_resposta)
                    {
                      $status = $iconTrue;
                    }

                    $html = $status;

                    if($data->checkAcoes('editar'))
                    {
                          $html = Html::a($status,'#',[
                            'data-btajaxsingle'=>Url::to(['gerenciadorconteudo/ajax-status-resposta','id'=>$data->id]),
                            'data-icontrue'=>$iconTrue,
                            'data-iconfalse'=>$iconFalse,
                            'class'=>'text-center block text-color-default'
                          ]);
                    }
                    return $html;

                    },
              ],
              [
                  'attribute' => 'dt_resposta',
                  'format' => ['date', 'php:d/m/Y'],
                  //'filter'=>\yii\helpers\Html::activeTextInput($model,'dt_publicacao',['id'=>'datepicker','class'=>'form-control datepicker']),
              ],
              [
                'class' => 'yii\grid\CheckboxColumn',
                // usar var keys = $('#grid').yiiGridView('getSelectedRows'); para os iscripts
              ]
          ],
        ]);?>

          <?php Pjax::end(); ?>
        <!-- // Progress table -->
      </div>
      <!-- table fim -->
    </div>
    <!-- alinhamento content -->
  </div>
  <!-- /row -->
</div>
<!-- /page-section -->
