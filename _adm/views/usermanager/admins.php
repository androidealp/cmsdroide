<?php use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\jui\DatePicker;


?>


<div class="box box-default color-palette-box">
  <!-- action box -->
       <?=ActionsBox::widget(['buttons'=>[
         'custom'=>[
           'type'=>'link',
           'text'=>'<i class="fa fa-users"></i> Gerenciar Grupos',
           'url'=>['usermanager/managergroups'],
           'params'=>[

             'class'=>'btn btn-success btn-sm',
           ]
         ],
          'default'=>[
              'add'=>[
                'url'=>'index.php?r=_adm/usermanager/ajaxcriarusuarioadm',
                'title'=>'Adicionar um usuário',
                'modalsize'=>'md',
                'formid'=>'form-admcriar',
                'pajaxid'=>'list-user'],
              'del'=>[
                'url'=>'index.php?r=_adm/usermanager/ajaxdeletarusuarioadm',
                'confirm'=>'Deseja deletar o(s) usuário(s)?',
                'title'=>'Deletar Usuario(s)',
                'gridid'=>'grid-user',
                'pajaxid'=>'list-user'],

          ]
       ]]); ?>
  <!-- fim action box -->

       <div class="content">
       <?php Pjax::begin(['id'=>'list-user']); ?>
              <?= GridView::widget([
              'id'=>'grid-user',
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
                        'attribute' => 'avatar',
                        'format' => 'html',
                        'value'=>function($data){
                          return ($data->avatar)?'<img src="'.$data->avatar.'" style="width:40px;" />':'<img src="temas/purephoenix/images/admin.png" style="width:40px;" />';
                        }

                    ],
                    [
                        'attribute' => 'grupos_id',
                        'format' => 'html',
                        'value'=>function($data){
                          return $data->grupos->nome;
                        },
                        'filter'=>$model->list_group
                    ],
                    [
                        'attribute' => 'nome',
                        'format' => 'html',
                        'value'=>function($data){
                          return Html::a(Html::encode($data->nome),['usermanager/editarusuarioadm','id'=>$data->id]);
                        }

                    ],
                    [
                        'attribute' => 'email',
                        'format' => 'html',
                        'value'=>function($data){
                          return Html::a(Html::encode($data->email),'mailto:'.$data->email);
                        }

                    ],

                    [
                        'attribute' => 'status_acesso',
                        'format' => 'html',
                        'value'=>function($data){
                          return ($data->status_acesso)?'<span class="fa fa-check text-success text-center block"></span>':'<span class="fa fa-times text-danger text-center"></span>';
                          },
                          'filter'=>array(1=>"Ativo",0=>"Inativo"),
                    ],
                    [
                        'attribute' => 'dt_cadastro',
                        'format' => ['date', 'php:d/m/Y'],
                        'filter'=>DatePicker::widget(['model'=>$model,'attribute'=>'dt_cadastro','language' => 'pt-BR', 'dateFormat' => 'dd-MM-yyyy','options'=>['class'=>'form-control']]),
                    ],
                     [
                        'attribute' => 'dt_ult_acesso',
                        'format' => 'text',
                        'filter'=>DatePicker::widget(['model'=>$model,'attribute'=>'dt_ult_acesso','language' => 'pt-BR', 'dateFormat' => 'dd-MM-yyyy','options'=>['class'=>'form-control']]),
                        'value'=>function($data){
                          return ($data->dt_ult_acesso != '0000-00-00 00:00:00')?$data->dt_ult_acesso:'nunca logou';
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
