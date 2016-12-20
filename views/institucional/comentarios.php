 <?php
   use yii\helpers\Html;
   use yii\widgets\ActiveForm;
?>
   
   <div class="container">
   <div id="form-comentarios">
      <div class="col-md-6 col-md-offset-3">
         <div class="panel panel-default" style="position: relative; margin-top: 10%">
            <div class="panel-heading">
               <h3 class="text-center">COMENTÁRIOS AMORMEU</h3>
            </div>
            <div class="panel-body">


             <?php if (Yii::$app->session->getFlash('success') !== NULL){ ?>
                <div class="alert text-center alert-success"><?=  Yii::$app->session->getFlash('success'); ?></div>
             <?php } ?>
          
               <?php
                  $form = ActiveForm::begin([
                      'id' => 'comentario',
                      'options' => ['class' => ''],
                  ]) ?>

                  <div id="alert-msg"></div>


               <div class="form-group">		
                  <?= $form->field($model, 'assunto')->textInput(['class' => 'form-control', 'placeholder'=>'Assunto da mensagem'])->label(false)?>
               </div>
               <div class="form-group">
                  <?= $form->field($model, 'mensagem')->textArea(['class' => '
                     form-control', 'placeholder'=>'Digite aqui sua mensagem'])->label(false)?>		
               </div>

                <div class="btn-group pull-right" role="group" aria-label="...">
                  
                  <?= Html::a('Enviar comentário', '#',[
                  'data-comentario'=>'#comentario', 
                  'data-url'=> \yii\helpers\Url::to(['institucional/ajax-criar-comentario']),
                  'class' => 'btn btn-success'
                  ]) ?>
               </div>                
               <?php ActiveForm::end() ?>
            </div>
         </div>
      </div>
      </div>

      <div class="col-md-8 col-md-offset-2">


      	 	<div class="panel panel-default" style="position: relative; margin-top: 10%">
	      	 	<div class="panel-heading">
	               <h3 class="text-center text-success"><i class="fa fa-fw fa-envelope-o"></i> COMENTÁRIOS PUBLICADO 

                  <span class="pull-right btn btn-sm btn-success" data-novo-coment="novo-comentario"> Adicionar comentário <i class="fa fa-fw fa-plus"></i></span></h3>

	            </div>
	            <div class="panel-body" data-list="list-comentarios">
               <?php for ($i=0; $i < 5 ; $i++) :  ?>
                     <div class="well"> 
                        <strong><i class="fa fa-fw fa-user"></i> Assunto da mensagem</strong><br />
                        Listando todos os comentarios.<br />

                        
                      <?php
                           $form = ActiveForm::begin([
                              'id' => 'comentario',
                              'options' => ['class' => ''],
                              ]) ?>
                        <p><a href="#" class="pull-right">
                           <small class="text-small"><i class="fa fa-fw fa-reply-all"></i> Responder</small></a></p>
                      <?php ActiveForm::end() ?>
                     </div>
	             <?php endfor; ?>
	            </div>
      	 	</div>
      </div>
   </div>
</div>

<!-- Modal para usário não logado -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Fazer login</h4>
      </div>
      <div class="modal-body">
      <p class="alert-success alert">
        Detectamos que voce nao esta autenticado para fazer comentarios.<br />
        <strong class="text-center">Preencha o formulario abaixo!</strong>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Logar-se</button>
      </div>
    </div>
  </div>
</div>