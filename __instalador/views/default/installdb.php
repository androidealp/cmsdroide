<?php
use yii\bootstrap\ActiveForm;

// cms_droide
// cms_dr
// and4563

$this->title = 'Instalador Droide';

$texto = [];
$permitir = 'success';
if(!$msn['error']){
  $texto[] = '<span class="text-success">'.$msn['msn'].'</span>';
}else{
  $permitir = 'danger';
  $texto[] = '<span class="text-danger">'.$msn['msn'].'</span>';
}

$mensagem = implode('<br />', $texto);
?>

<div class="container">
  <div class="page-header">
    <h1> Instalador <small>CMS Droide</small></h1>
  </div>
<div class="row">
<div class="col-md-8">
  <div class="panel panel-<?=$permitir?>">
    <div class="panel-heading">
      <h3 id="title" class="panel-title">Processo de instalação do banco</h3>
    </div>
    <div class="panel-body">
      <?=$mensagem?>

      <a href="index.php" class="btn btn-info btn-block">Remova o instalador e clique aqui para ir a home</a>
    </div>
  </div>


</div>
</div>

</div>
