<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use \app\_adm\components\widgets\maps\Maps;

//print_r(Yii::$app->request->post());
$mark = [];
$options = [];
if($model->id){
  $mark[] = [
    'lat'=>$model->lat,
    'lng'=>$model->long,
    'title'=>$model->bairro,
    'infoWindow'=>[
      'content'=>'<p>'.$model->logradouro.', '.$model->numero.', '.$model->bairro.', '.$model->cidade.', '.$model->estado.' </p>'
    ]
  ];

  $options = [
    'div'=>'#mapa-min',
    'lat'=>$model->lat,
    'lng'=>$model->long,
    'zoom'=>15
  ];
}


?>

<div class="maps-popup">
<?=Maps::widget([
  'id'=>'mapa-min',
  'options'=>$options,
  'markers'=>$mark,
  'ckeckendereco'=>[
    'numero'=>'numero',
    'lat'=>'lat',
    'lng'=>'long',
    'enderecos'=>['logradouro','numero','bairro','cidade','estado']
  ],
  'htmloptions'=>['class'=>'mapa-min']
]);?>
</div>

<?php
$form = ActiveForm::begin([
    'id'=>'form-enderecolpu',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-3',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]);
?>

<div id="erros">
</div>

<?=Html::activeHiddenInput($model,'lpus_id') ?>
<?=Html::activeHiddenInput($model,'lat',['id'=>'lat'])?>
<?=Html::activeHiddenInput($model,'long',['id'=>'long'])?>

<div id="info-cep">

</div>

<div><?=$form->field($model, 'cep')->widget(\yii\widgets\MaskedInput::className(),[
  'mask' => '99999-999',
  'options'=>['class'=>'form-control','id'=>'cep']
]);?>
</div>

<div><?=$form->field($model, 'logradouro')->textInput(['class'=>'form-control ','id'=>'logradouro']);?></div>
<div><?=$form->field($model, 'numero')->textInput(['class'=>'form-control','id'=>'numero']);?></div>
<div><?=$form->field($model, 'bairro')->textInput(['class'=>'form-control','id'=>'bairro']);?></div>
<div><?=$form->field($model, 'cidade')->textInput(['class'=>'form-control','id'=>'cidade']);?></div>
<div><?= $form->field($model, 'estado')->dropDownList($model->EstadoList(),['class'=>'form-control','id'=>'estado']); ?></div>


<?php ActiveForm::end(); ?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#cep').on('blur',function(e){
      cep = $(this).val();

      if(cep != ''){
        $.ajax({
          url:"<?=Url::to(['lpus/ajaxcorreios']);?>",
          method:"POST",
          dataType:'json',
          data:{'cep':cep},
          beforeSend:function(){
            $('#info-cep').html('<p id="alert-cep" class="alert alert-info">Aguarde....</p>');
          },
          success:function(data){
            data = jQuery.parseJSON(data);
            $('#logradouro').val(data.logradouro);
            $('#bairro').val(data.bairro);
            $('#cidade').val(data.localidade);
            $('#estado').val(data.uf);
            $('#alert-cep').remove();

          }
        });
      } //fim do if

    });
  });
</script>
