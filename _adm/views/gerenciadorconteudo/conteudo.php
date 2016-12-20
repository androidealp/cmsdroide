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
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <?=ActionsBox::widget(['buttons'=>[
             'default'=>[
               'add'=>['url'=>Url::to(['gerenciadorconteudo/ajax-criar-conteudo']),'title'=>'Adicionar um Conteúdo','modalsize'=>'lg','formid'=>'form-contsave','pajaxid'=>'list-content'],
               'del'=>['url'=>Url::to(['gerenciadorconteudo/ajax-deletar-conteudo']),'confirm'=>'Deseja deletar o(s) conteúdo(s)?', 'title'=>'Deletar Conteúdo(s)','gridid'=>'grid-content','pajaxid'=>'list-content'],
             ]
          ]]); ?>
        </div>
      </div>

      <div class="panel panel-default">
        <?php Pjax::begin(['id'=>'list-content','options'=>['class'=>"dataTables_wrapper"]]); ?>
            <?= GridView::widget([
            'id'=>'grid-content',
            'dataProvider' => $dataProvider,
            'filterModel' => $model,
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
                      'attribute' => 'titulo',
                      'format' => 'html',
                      'value'=>function($data){
                        $html = Html::encode($data->titulo);
                        if($data->checkAcoes('editar')){
                          $html = Html::a(Html::encode($data->titulo),['gerenciadorconteudo/editarconteudo','id'=>$data->id]);
                        }

                        return $html;
                      }

                  ],
                  [
                      'attribute' => 'alias',
                      'format' => 'text',
                  ],
                  [
                      'attribute' => 'destaque',
                      'format' => 'raw',
                      'filter'=>$model->list_destaque,
                      'value'=>function($data){
                        $iconFalse = '<i class="fa fa-fw fa-2x icon-refresh-star faa-pulse animated-hover"></i>';
                        $iconTrue = '<i class="fa fa-fw fa-2x icon-refresh-star-fill text-warning faa-pulse animated-hover"></i>';
                        $destaque = $iconFalse;
                        if($data->destaque)
                        {
                          $destaque = $iconTrue;
                        }

                        $html = $destaque;

                        if($data->checkAcoes('editar')){
                          $html = Html::a($destaque,'#',[
                            'data-btajaxsingle'=>Url::to(['gerenciadorconteudo/ajax-destaque-conteudo','id'=>$data->id]),
                            'data-icontrue'=>$iconTrue,
                            'data-iconfalse'=>$iconFalse,
                            'class'=>'text-center block text-color-default'
                          ]);
                        }

                        return $html;
                      }
                  ],
                  [
                      'attribute' => 'categorias_conteudo_id',
                      'format' => 'text',
                      'headerOptions' => ['style' => 'width:15%'],
                      'value'=>function($data){
                        return $data->categoriasConteudo->nome;
                      },
                      'filter'=>$model->list_category,
                  ],
                  [
                      'attribute' => 'status',
                      'format' => 'raw',
                      //'headerOptions' => ['style' => 'width:10%'],
                      'value'=>function($data){

                        $iconFalse = '<span class="fa fa-times text-danger faa-pulse fa-2x animated-hover text-center block"></span>';
                        $iconTrue = '<span class="fa fa-check fa-2x text-success text-center block faa-pulse animated-hover"></span>';
                        $status = $iconFalse;
                        if($data->status)
                        {
                          $status = $iconTrue;
                        }

                        $html = $status;

                        if($data->checkAcoes('editar')){
                          $html = Html::a($status,'#',[
                            'data-btajaxsingle'=>Url::to(['gerenciadorconteudo/ajax-status-conteudo','id'=>$data->id]),
                            'data-icontrue'=>$iconTrue,
                            'data-iconfalse'=>$iconFalse,
                            'class'=>'text-center block text-color-default'
                          ]);
                        }

                        return $html;
                        
                        },
                        'filter'=>array(1=>'<span class="fa fa-check text-success text-center block "></span>',0=>'<span class="fa fa-times text-danger text-center block"></span>'),
                  ],

                  [
                      'attribute' => 'autor',
                      'format' => 'text',
                      'filter'=>$model->list_autor
                  ],
                  [
                    'attribute' => 'dt_criacao',
                    'format' => ['date', 'php:d/m/Y'],
                    'filter'=>\yii\helpers\Html::activeTextInput($model,'dt_criacao',['id'=>'datepicker','class'=>'form-control datepicker']),
                  ],
                  [
                    'attribute' => 'dt_publicacao',
                    'format' => ['date', 'php:d/m/Y'],
                    'filter'=>\yii\helpers\Html::activeTextInput($model,'dt_publicacao',['id'=>'datepicker','class'=>'form-control datepicker']),
                  ],
                  [
                    'class' => 'yii\grid\CheckboxColumn',
                  ]
              ],
            ]);?>
        <?php Pjax::end(); ?>
      </div>


    </div>
    <!-- /.col-md-10 -->
  </div>
  <!-- /.row primeiro  -->
</div>
<!-- /.page-section -->
