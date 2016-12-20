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
             'default'=>[
                 'add'=>['url'=>Url::to(['gerenciadorconteudo/ajax-criar-categoria']),'title'=>'Adicionar Categoria','formid'=>'form-catsave','pajaxid'=>'list-category'],
                 'del'=>['url'=>Url::to(['gerenciadorconteudo/ajaxdeletar']),'confirm'=>'Deseja deletar a(s) categoria(s)', 'title'=>'Deletar Categoria(s)','gridid'=>'grid-categorias','pajaxid'=>'list-category'],
             ]
          ]]); ?>
        </div>
      </div>

      <!-- <h4 class="page-section-heading">Responsive Table</h4> -->
      <div class="panel panel-default">
        <!-- Progress table -->
        <?php Pjax::begin(['id'=>'list-category',
        'options'=>['class'=>"dataTables_wrapper"]
      ]); ?>

        <?= GridView::widget([
        'id'=>'grid-categorias',
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
                  'attribute' => 'nome',
                  'format' => 'raw',
                  'value'=>function($data){

                    $quantidade = $data->CountArtigos();
                    $qtde_layout = Html::a($quantidade,['gerenciadorconteudo/conteudo'],[
                      'class'=>'btn btn-default btn-stroke btn-circle pull-right',
                      'data-toggle'=>"tooltip",
                      'title'=>"Quantidade de Artigos vinculados"
                    ]);

                    $sub= '';
                    if($data->parent)
                    {
                      $sub = '<i class="fa fa-1x fa-angle-right faa-passing " style="color:#111; margin-right:5px;"></i>';
                    }


                    $html = $sub.Html::encode($data->nome).$qtde_layout;

                    if($data->checkAcoes('editar'))
                    {
                      $html = Html::a($sub.Html::encode($data->nome),['gerenciadorconteudo/editarcategoria','id'=>$data->id],['class'=>'faa-parent animated-hover']).$qtde_layout;
                    }

                    return $html;
                  }

              ],
              [
                  'attribute' => 'linguagem_id',
                  'format' => 'text',
                  'value'=>function($data){
                    return $data->linguagem->nome;
                  },
                  'filter'=>$model->ListLanguage()
              ],
              [
                  'attribute' => 'status',
                  'format' => 'html',
                  'value'=>function($data){
                    return ($data->status)?'<span class="fa fa-check text-success text-center block"></span>':'<span class="fa fa-times text-danger text-center"></span>';
                    },
                    'filter'=>array(1=>"Ativo",0=>"Inativo"),
              ],
              [
                  'attribute' => 'dt_criacao',
                  'format' => ['date', 'php:d/m/Y'],
                  'filter'=>\yii\helpers\Html::activeTextInput($model,'dt_criacao',['id'=>'datepicker','class'=>'form-control datepicker']),
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
