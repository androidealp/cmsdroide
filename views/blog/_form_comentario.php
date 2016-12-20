<?php
  use yii\widgets\ActiveForm;
  use yii\helpers\Url;
  use yii\helpers\Html;
 ?>
<div  class="panel panel-default" style="position: relative;">
  <div class="panel-heading">
     <h3 class="text-center">COMENTÁRIOS AMORMEU</h3>
  </div>

  <div class="panel-body">

    <?php if(\Yii::$app->user->isGuest): ?>
      <div class="alert alert-info">
        Olá visitante, para efetuar um comentário é necessário cadastro.
        <span class="btn-group pull-right">
          <?=Html::a('Quero cadastrar-me',['institucional/cadastrar'],['class'=>'btn btn-xs btn-success']); ?>
          <?=Html::a('Entrar',['#'],['class'=>'btn btn-xs btn-danger','data-modalajax'=>yii\helpers\Url::to(['institucional/ajax-login']),'title'=>'Acesso restrito']); ?>
        </span>
      </div>
    <?php else: ?>
      <?php
         $form = ActiveForm::begin([
             'id' => 'comentario',
             'options' => ['class' => ''],
         ]) ?>

       <div class="form-group">
          <?= $form->field($comentarios, 'assunto')->textInput(['class' => 'form-control', 'placeholder'=>'Assunto da mensagem'])->label(false)?>
       </div>

       <div class="form-group">
          <?= $form->field($comentarios, 'mensagem')->textArea(['class' => '
             form-control', 'placeholder'=>'Digite aqui sua mensagem'])->label(false)?>
       </div>

       <div class="btn-group pull-right" role="group" aria-label="...">

         <?= Html::a('Enviar comentário', '#',[
         'data-ajaxid'=>'#comentario',
         'data-savecoment'=> \yii\helpers\Url::to(['blog/ajax-form-comentario','alias'=>$alias]),
         'class' => 'btn btn-success'
         ]) ?>
      </div>

      <?php ActiveForm::end() ?>
    <?php endif; ?>



  </div>

</div>
