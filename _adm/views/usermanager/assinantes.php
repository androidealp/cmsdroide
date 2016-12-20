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

          <?=ActionsBox::widget([
            'icon'=>'fa fa-users',
            'titulo'=>'Gerenciador de Administradores',
            'buttons'=>[
             'default'=>[
                 'add'=>[
                   'url'=>yii\helpers\Url::to(['usermanager/ajax-criar-assinante']),
                   'title'=>'Adicionar Administrador',
                   'modalsize'=>'md',
                   'formid'=>'form-admcriar',
                   'pajaxid'=>'list-user'],
                 'del'=>[
                   'url'=>yii\helpers\Url::to(['usermanager/ajax-deletar-assinante']),
                   'confirm'=>'Deseja deletar o(s) usuário(s)?',
                   'title'=>'Deletar Usuario(s)',
                   'gridid'=>'grid-user',
                   'pajaxid'=>'list-user'],

             ]
          ]]); ?>

        </div>
      </div>
      <!-- end head -->

      <div class="panel panel-default">
        <?php Pjax::begin(['id'=>'list-user','options'=>['class'=>"dataTables_wrapper"]]); ?>
        <?= GridView::widget([
        'id'=>'grid-user',
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
                  'format' => 'html',
                  'value'=>function($data){
                     $icon = yii\helpers\Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle', 'style'=>'height:40px; margin-right:5px;']);

                     $html = $icon.Html::encode($data->nome);
                    if($data->checkAcoes('editar'))
                    {
                      $html = $icon.' '.Html::a(Html::encode($data->nome),['usermanager/editar-assinantes','id'=>$data->id],['style'=>'line-height:35px; height:35px;']);
                    }



                    return $html;
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
                  'attribute' => 'status_user_id',
                  'format' => 'html',
                  'value'=>function($data){
                    return ($data->status_user_id)?'<span class="fa fa-check text-success text-center block"></span>':'<span class="fa fa-times text-danger text-center"></span>';
                    },
                    'filter'=>array(1=>'<span class="fa fa-check text-success text-center block "></span>',0=>'<span class="fa fa-times text-danger text-center block"></span>'),
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
