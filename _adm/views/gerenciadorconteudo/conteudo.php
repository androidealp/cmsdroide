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
              'add'=>['url'=>'index.php?r=_adm/gerenciadorconteudo/ajaxcriarconteudo','title'=>'Adicionar um Conteúdo','modalsize'=>'lg','formid'=>'form-contsave','pajaxid'=>'list-content'],
              'del'=>['url'=>'index.php?r=_adm/gerenciadorconteudo/ajaxdeletarconteudo','confirm'=>'Deseja deletar o(s) conteúdo(s)?', 'title'=>'Deletar Conteúdo(s)','gridid'=>'grid-content','pajaxid'=>'list-content'],
          ]
       ]]); ?>
  <!-- fim action box -->

       <div class="content">
       <?php Pjax::begin(['id'=>'list-content']); ?>
              <?= GridView::widget([
              'id'=>'grid-content',
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
                        'attribute' => 'titulo',
                        'format' => 'html',
                        'value'=>function($data){
                          return Html::a(Html::encode($data->titulo),['gerenciadorconteudo/editarconteudo','id'=>$data->id]);
                        }

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
                        'attribute' => 'categorias_conteudo_id',
                        'format' => 'text',
                        'value'=>function($data){
                          return $data->categoriasConteudo->nome;
                        },
                        'filter'=>$model->list_category,
                    ],
                    [
                      'class' => 'yii\grid\CheckboxColumn',
                    ]
                ],
              ]);?>
        <?php Pjax::end(); ?>
      </div>

</div>
