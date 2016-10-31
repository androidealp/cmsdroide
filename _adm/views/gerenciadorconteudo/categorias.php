<<<<<<< HEAD
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
              'add'=>['url'=>'index.php?r=_adm/gerenciadorconteudo/ajaxcriar','title'=>'Adicionar Categoria','formid'=>'form-catsave','pajaxid'=>'list-category'],
              'del'=>['url'=>'index.php?r=_adm/gerenciadorconteudo/ajaxdeletar','confirm'=>'Deseja deletar a(s) categoria(s)', 'title'=>'Deletar Categoria(s)','gridid'=>'grid-categorias','pajaxid'=>'list-category'],
          ]
       ]]); ?>
  <!-- fim action box -->

       <div class="content">
       <?php Pjax::begin(['id'=>'list-category']); ?>
              <?= GridView::widget([
              'id'=>'grid-categorias',
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
                          return Html::a(Html::encode($data->nome),['gerenciadorconteudo/editarcategoria','id'=>$data->id]);
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
                        'filter'=>DatePicker::widget(['model'=>$model,'attribute'=>'dt_criacao','language' => 'pt-BR', 'dateFormat' => 'dd-MM-yyyy','options'=>['class'=>'form-control']]),
                    ],
                    [
                      'class' => 'yii\grid\CheckboxColumn', 
                      // usar var keys = $('#grid').yiiGridView('getSelectedRows'); para os iscripts
                    ]
                ],
              ]);?>
        <?php Pjax::end(); ?>
      </div>
        
</div>

=======
<?php use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\helpers\Url;


?>


<div class="box box-default color-palette-box">
  <!-- action box -->
       <?=ActionsBox::widget(['buttons'=>[
          'default'=>[
              'add'=>['url'=>Url::to(['gerenciadorconteudo/ajax-criar-categoria']),'title'=>'Adicionar Categoria','formid'=>'form-catsave','pajaxid'=>'list-category'],
              'del'=>['url'=>Url::to(['gerenciadorconteudo/ajaxdeletar']),'confirm'=>'Deseja deletar a(s) categoria(s)', 'title'=>'Deletar Categoria(s)','gridid'=>'grid-categorias','pajaxid'=>'list-category'],
          ]
       ]]); ?>
  <!-- fim action box -->

       <div class="content">
       <?php Pjax::begin(['id'=>'list-category']); ?>
              <?= GridView::widget([
              'id'=>'grid-categorias',
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
                          return Html::a(Html::encode($data->nome),['gerenciadorconteudo/editarcategoria','id'=>$data->id]);
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
                        'filter'=>DatePicker::widget(['model'=>$model,'attribute'=>'dt_criacao','language' => 'pt-BR', 'dateFormat' => 'dd-MM-yyyy','options'=>['class'=>'form-control']]),
                    ],
                    [
                      'class' => 'yii\grid\CheckboxColumn',
                      // usar var keys = $('#grid').yiiGridView('getSelectedRows'); para os iscripts
                    ]
                ],
              ]);?>
        <?php Pjax::end(); ?>
      </div>

</div>
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
