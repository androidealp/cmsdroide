<?php
  use yii\grid\GridView;
  use yii\widgets\Pjax;
  use yii\helpers\Html;
  use yii\jui\DatePicker;
  use yii\bootstrap\ActiveForm;

?>


<div class="invoice no-box-margin">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header"><i class="fa fa-fw fa-search"></i> Buscar LPUS </h2>

              <?php $form = ActiveForm::begin([
                    'id'=>'form-busca',
                    'layout' => 'horizontal',
                    'method'=>'GET',
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
      <div class="col-md-8 select-padding">
        <?=Html::activeTextInput($model,'cidades',['placeholder'=>'Buscar por cidades', 'class'=>'fieldbusca-titulo']); ?>

          <?=Html::activeDropDownList($model,'estados',$model->EstadoList(),
            ['prompt' => 'Por Estados']);
           ?>

            <?=Html::activeDropDownList($model, 'servicos',$model->ServicosList(),
            ['prompt' => 'Por Serviços']);
           ?>
       <?=Html::submitButton('Buscar contratos', ['class'=>'btn btn-bitbucket']); ?>


      </div>
    </div>

  <?php ActiveForm::end();

?>



        </div><!-- /.col -->
    </div>
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
