<?php
use yii\bootstrap\ActiveForm;
$this->title = 'Instalador Droide';
$editavelreturn = [];
if ($editavel) {
  $editavelreturn = [
    'type'=>'success',
    'msn'=>'Este arquivo é totalmente editável, após a instalação mudar para leitura'
  ];
}else{
  $editavelreturn = [
    'type'=>'danger',
    'msn'=>'Este arquivo Não é editável, esta instalação poderá não ser bem sucedida, após instalar o banco editar manualmente o arquivo db'
  ];
}

?>

<div class="container">
  <div class="page-header">
    <h1> Instalador <small>CMS Droide</small></h1>
  </div>
<div class="row">
<div class="col-md-6">
  <div class="panel panel-<?=$editavelreturn['type'];?>">
    <div class="panel-heading">
      <h3 id="title" class="panel-title">Arquivo config/DB</h3>
    </div>
    <div class="panel-body">
      <?=$editavelreturn['msn'];?>

      <div id="returnsend"></div>
    </div>
  </div>

  <?php
  $form = ActiveForm::begin([
      'id'=>'form-install',
      'layout' => 'default',
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

<?=$form->field($model, 'host')->textInput(['class'=>'form-control','placeholder'=>'Host, geralmente localhost']); ?>

<?=$form->field($model, 'banco')->textInput(['class'=>'form-control','placeholder'=>'Nome do banco de dados']); ?>

<?=$form->field($model, 'user')->textInput(['class'=>'form-control','placeholder'=>'Usuário do banco']); ?>

<?=$form->field($model, 'pass')->passwordInput(['class'=>'form-control','placeholder'=>'Senha do banco']); ?>

<?=$form->field($model, 'charset')->textInput(['class'=>'form-control','placeholder'=>'Charset geralmente utf8']); ?>

  <a data-install="#form-install" href="#" class="btn btn-default">Instalar</a>

<?php ActiveForm::end(); ?>


</div>
</div>

</div>

<script type="text/javascript">
  $(document).ready(function(){

    ajax = function(type, serealize){
      $.ajax({
        url:'index.php?r=instalador&type='+type,
        data:serealize,
        method:'post',
        type:'json',
        beforeSend:function(){

        }
      });
    }

    $('[data-install]').on('click',function(e){
      e.prevendDefault();
      button = $(this).data('install');

      $.each(['configurar','instalar'],function(i,e){

      });

    });


  });
</script>
