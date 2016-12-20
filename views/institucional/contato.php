<?php
   use yii\helpers\Html;
   use yii\bootstrap\ActiveForm;
   ?>
<div class="container">
   <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default" style="position: relative; margin-top: 10%">
         <div class="panel-heading-success text-center">
            <h3 class="text-center">FALE CONOSCO
            <span>Entre em contato por meio deste canal e escreva seus comentários.</span></h3>

         </div>
         <div class="panel-body">
            <?php $form = ActiveForm::begin(['id' => 'formulario_de_contato']); ?>
             
                  <span id="ver"></span>
                  <span id="alert-msg"></span>
             
          
            <?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do usário'])->label(false);?>
            <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail para acesso'])->label(false);?>
            <?= $form->field($model, 'assunto')->textInput(['class'=>'form-control', 'placeholder'=>'Qual é o assunto?'])->label(false);?>
            <?= $form->field($model, 'mensagem')->textArea(['rows' => 6, 'placeholder'=>'Digite sua mensagem aqui!'])->label(false) ?>
            <div class="form-group">
               <!-- <?= Html::submitButton('ENVIAR CONTATO ', ['class' => 'btn-block btn-large btn btn-primary', 'name' => 'contato']) ?> -->
                 <?= Html::a('Enviar', '#',[
                  'data-compartilhe'=>'#formulario_de_contato', 
                  'data-url'=> \yii\helpers\Url::to(['institucional/contato']),
                  'class' => 'btn btn-success btn-block'
                  ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
         </div>
      </div>
   </div>
</div>
</div>

