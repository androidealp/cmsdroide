<?php
use yii\helpers\Html;
//$model

?>



<div class="panel-body">

  <div class="form-group">
    <?=Html::passwordInput('senha','', [
            'class'=>'form-control', 'placeholder'=>'Inserir nova senha'
          ]); ?>
  </div>

  <div class="form-group">
    <?=Html::passwordInput('repete_senha','',[
      'class'=>'form-control', 'placeholder'=>'Digite a senha novamente'
    ]); ?>
  </div>

  <div class="form-group">
    <?=Html::a('<i class="fa fa-save faa-shake"></i> Salvar Senha', '#',[
      'class'=>' pull-right btn btn-success display-block faa-parent animated-hover',
      'data-ajaxsave'=>yii\helpers\Url::to(['usermanager/ajax-salvar-senha','type'=>$type,'id'=>$id]),
      'data-content'=>'#edit-senha',
      'data-iconfalse'=>'fa fa-times'
    ]);  ?>
  </div>




      </div>
