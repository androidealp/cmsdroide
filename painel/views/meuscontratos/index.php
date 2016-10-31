<?php
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\bootstrap\ActiveForm;

?>

<!--Box status-->
<div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-fw fa-check-square-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">CONTRATOS ATIVOS</span>
            <span class="info-box-number">760</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->
      

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-fw fa-exclamation-circle"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">CONTRATOS PENDENTES</span>
            <span class="info-box-number">2,000</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-fw fa-ban"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">CONTRATOS CANCELADOS</span>
            <span class="info-box-number">41,410</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->
    <!--Fim de box status-->
</div>

<div class="invoice no-box-margin">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-fw fa-search"></i> Buscar meus contratos
              </h2>

<?php $form = ActiveForm::begin([
    'id'=>'form-busca',
    'layout' => 'horizontal',
    'options' => ['enctype' => 'multipart/form-data'],
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'form-group',
            'error' => '',
            'hint' => '',

        ],
    ],
]);
?>
<div class="row">
  <div class="col-md-4">
    <?=Html::activeTextInput($model,'cod_lpu',['placeholder'=>'Buscar por código', 'class'=>'form-control']); ?>
  </div>
  <div class="col-md-4 select-padding">
    <?=Html::activeDropDownList($model, 'status_aceite', $model->StatusAceiteList(), ['prompt' => 'Por status']) ; ?>
    <?=Html::submitButton('Buscar contratos', ['class'=>'btn btn-bitbucket']); ?>
  </div>
</div>

<?php ActiveForm::end();



 ?>


            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">

    </div><!-- /.row -->
 </div>
<div class="clearfix"> </div>

<div class="box box-default color-palette-box">
       <div class="content">

       <?php Pjax::begin(['id'=>'list-content']); ?>
              <?= GridView::widget([
              'id'=>'grid-content',
              'dataProvider' => $dataProvider,
              'tableOptions' => ['class' => 'table  table-bordered table-hover'],
              'summary'=>'De <span class="label label-default">{begin}</span> - <span class="label label-default">{end}</span> total de itens <span class="label label-default">{totalCount}</span>',
              'layout'=>"{items}<div class='pull-right'>{summary}</div>{pager}",
              'columns' => [
                   [
                        'attribute' => 'cod_lpu',
                        'format' => 'text',
                    ],
                    [
                        'attribute' => 'titulo',
                        'format' => 'html',
                        'value'=>function($data){
                          return Html::a(Html::encode($data->titulo),['buscarlpus/detalhes','id'=>$data->id]);
                        }

                    ],
                    [
                        'attribute' => 'Status',
                        'format' => 'html',
                        'value'=>function($data){
                          return Html::a(Html::encode($data->aceiteLps->status_lpus_id),['buscarlpus/detalhes','id'=>$data->id]);
                        }

                    ],
                    [
                        'attribute' => 'dt_publicacao',
                        'format' => ['date', 'php:d/m/Y'],
                    ],

                    [
                      'class' => 'yii\grid\CheckboxColumn',
                    ]
                ],
              ]);?>
        <?php Pjax::end(); ?>

      </div>

</div>
