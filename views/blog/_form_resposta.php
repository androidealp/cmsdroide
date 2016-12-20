<?php
  use yii\widgets\ActiveForm;
  use yii\helpers\Url;
  use yii\helpers\Html;
 ?>


<?php if (\Yii::$app->user->isGuest): ?>
  <div class="alert alert-info">
    Olá visitante, para efetuar um comentário é necessário cadastro.
    <span class="btn-group pull-right">
      <?=Html::a('Quero cadastrar-me',['institucional/cadastrar'],['class'=>'btn btn-xs btn-success']); ?>
      <?=Html::a('Entrar',['#'],['class'=>'btn btn-xs btn-danger','data-modalajax'=>yii\helpers\Url::to(['institucional/ajax-login']),'title'=>'Acesso restrito']); ?>
    </span>

  </div>
<?php else: ?>
  <div  class="panel panel-default" style="position: relative;">
      <div class="panel-body">
        <?php
           $form = ActiveForm::begin([
               'id' => 'resposta',
               'options' => ['class' => ''],
           ]) ?>


         <div class="form-group">
            <?= $form->field($resposta, 'resposta')->textArea(['class' => '
               form-control', 'placeholder'=>'Digite aqui sua mensagem'])->label(false)?>
         </div>

         <div class="btn-group pull-right" role="group" aria-label="...">

           <?= Html::a('Responder', '#',[
           'data-ajaxid'=>'#responder',
           'data-savecoment'=> \yii\helpers\Url::to(['blog/ajax-form-responder','comentario'=>$cript_comentario]),
           'class' => 'btn btn-success btn-sm'
           ]) ?>
        </div>

        <?php ActiveForm::end() ?>

      </div>
  </div>
<?php endif; ?>
