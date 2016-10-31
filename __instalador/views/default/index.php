<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
//cms_droide
//cms_dr
$this->title = 'Instalador Droide';
$editavelreturn = [];
$texto = [];
$permitir = 'success';
if($editavel['bd']){
  $texto[] = '<span class="text-success">O arquivo '.\Yii::getAlias($model->db_file).' é totalmente editável, após a instalação mudar para leitura.</span>';
}else{
  $permitir = 'danger';
  $texto[] = '<span class="text-danger">O arquivo '.\Yii::getAlias($model->db_file).' não é editável, edite antes para poder fazer a instalação do banco.</span>';
}

if($editavel['parans']){
  $texto[] = '<span class="text-success">O arquivo '.\Yii::getAlias($model->parans_file).' é totalmente editável, após a instalação mudar para leitura.</span>';
}else{
  $permitir = 'danger';
  $texto[] = '<span class="text-danger">O arquivo '.\Yii::getAlias($model->parans_file).' não é editável, edite antes para poder fazer a instalação do banco.</span>';
}


  $editavelreturn = [
    'type'=>$permitir,
    'msn'=>implode('<br /><br />',$texto)
  ];


?>

<div id="instalador" class="container">
  <div class="block-center">
      <div class="page-header">
        <h1>CMS Droide<small> Instalador</small></h1>
      </div>
    <div class="row">
    <div class="col-md-12">
      <div class="panel panel-<?=$editavelreturn['type'];?>">
        <div class="panel-heading">
          <h3 id="title" class="panel-title">Arquivo config/DB</h3>
        </div>
        <div class="panel-body">
          <?=$editavelreturn['msn'];?>

          <div id="returnsend"></div>
        </div>
      </div>

    <?php if($permitir == 'success'): ?>

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

    <?=$form->field($model, 'parans_file')->textInput(['class'=>'form-control','placeholder'=>'Host, geralmente localhost']); ?>

    <?=$form->field($model, 'db_file')->textInput(['class'=>'form-control','placeholder'=>'Host, geralmente localhost']); ?>

    <?=$form->field($model, 'host')->textInput(['class'=>'form-control','placeholder'=>'Host, geralmente localhost']); ?>

    <?=$form->field($model, 'banco')->textInput(['class'=>'form-control','placeholder'=>'Nome do banco de dados']); ?>

    <?=$form->field($model, 'user')->textInput(['class'=>'form-control','placeholder'=>'Usuário do banco']); ?>

    <?=$form->field($model, 'pass')->passwordInput(['class'=>'form-control','placeholder'=>'Senha do banco']); ?>

    <?=$form->field($model, 'charset')->textInput(['class'=>'form-control','placeholder'=>'Charset geralmente utf8']); ?>

    <?=$form->field($model, 'alias')->textInput(['class'=>'form-control','placeholder'=>'O alias é importante para o bom andamento do sistema.'])->label('Alias <small class="text-danger">(é importante para o bom andamento do sistema, e proteção da base)</small>'); ?>

      <button  id="instalar" class="btn btn-default">Instalar</button>

    <?php ActiveForm::end(); ?>

    <?php endif; ?>
    </div>
    </div>
  </div>
</div>



<script type="text/javascript">
$(document).ready(function(){
  $('#returnsend').droideProcess({
    elementClick:"#instalar",
    getUrl: "<?=Url::to('instalador/default/init-install')?>",
    dataForm:$('#form-install')
  });
});
</script>
