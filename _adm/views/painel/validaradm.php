<?php
use yii\helpers\Html;
 ?>

<div class="panel-body">

  <div class="alert alert-success">
    Seu ip foi liberado com sucesso, acesse a página e tente logar novamente. <br />
    <?=Html::a('Acessar login',['painel/login'],['class'=>'btn btn-primary'])?>
  </div>

</div>
