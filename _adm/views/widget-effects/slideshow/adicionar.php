<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\_adm\components\widgets\editor\Editor;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;
use \app\_adm\components\widgets\actionsbox\ActionsBox;

$ckeditorOptions = ElFinder::ckeditorOptions('_adm/elfinder',[/* Some CKEditor Options */]);
 ?>

 <?php
 $form = ActiveForm::begin([
     'id'=>'form-catsave',
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

 <div class="row">
   <div class="col-md-12">
     <div class="box box-danger">
       <div class="box-header with-border">
         <h3 class="box-title">Novo Slideshow </h3>
         <div class="box-tools pull-right">
           <?=Html::a('<< Voltar',['/_adm/widget-effects'], ['class'=>'btn btn-danger']); ?>
           <?=Html::submitButton('<i class="fa fa-edit"></i> Salvar',['class'=>'btn btn-primary']); ?>
         </div>
       </div>
       <div class="box-body margin">
         <p class="text-info">
           Atenção para aplicar novos efeitos visuais é necessário chamar na instancia do component de carregamento no frontend.
         </p>

         <?=$form->errorSummary($model, array("class" => "alert alert-danger")); ?>
       </div>
     </div>
   </div>
 </div>

<div class="row">
  <div class="col-md-4">

    <div class="box box-primary direct-chat direct-chat-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Configurações</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body margin">
          <?= $form->field($model, 'nome')->textInput(['class'=>'form-control']);?>
          <?= $form->field($model, 'desc')->label('Descrição')->textInput(['class'=>'form-control']);?>
          <?= $form->field($model, 'ativar')->checkBox(['label'=>'Publicado']);?>
          <?= $form->field($model, 'params[slide-auto]')->checkBox(['label'=>'Slide automatico']);?>
          <?= $form->field($model, 'params[panel-text]')->checkBox(['label'=>'Texto no banner']);?>
          <?= $form->field($model, 'params[navegacao]')->checkBox(['label'=>'Navegação']);?>
          <?= $form->field($model, 'params[prev-next]')->checkBox(['label'=>'Botões Anterior e próximo']);?>


        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box  -->

  </div>
  <!--/.col-md-4  -->
  <div class="col-md-8">

    <div class="box box-default direct-chat direct-chat-default">
        <div class="box-header with-border">
          <h3 class="box-title">Items do Slider</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body margin">
          <div class="alert alert-info">
            Para adicionar itens no Slider salve o banner primeiro
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box  -->




  </div>
  <!--/.col-md-8  -->
</div>
<!--/.row  -->

<?php ActiveForm::end(); ?>
