<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\_adm\components\widgets\editor\Editor;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;
use \app\_adm\components\widgets\actionsbox\ActionsBox;
// tutorial http://blog.vilourenco.com.br/criando-um-elemento-com-efeito-parallax-em-seu-projeto-com-bootstrap/
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
             'offset' => 'col-sm-offset-3',
             'wrapper' => 'col-sm-8',
             'error' => '',
             'hint' => '',
         ],
     ],
 ]);
 ?>

 <div class="page-section">
   <div class="row">
     <div class="col-lg-12">
       <div class="panel panel-default">
         <div class="panel-body">
           <h3 class="box-title">Banner static</h3>

           <p class="text-info">
             Atenção para aplicar novos efeitos visuais é necessário chamar na instancia do component de carregamento no frontend.
           </p>

           <?=$form->errorSummary($model, array("class" => "alert alert-danger")); ?>

           <div class="box-tools pull-right">
             <?=Html::a('<< Voltar',['/_adm/widget-effects'], ['class'=>'btn btn-danger']); ?>
             <?=Html::submitButton('<i class="fa fa-edit"></i> Salvar',['class'=>'btn btn-primary']); ?>
           </div>
         </div>
       </div>
     </div>

     <div class="col-lg-5">
       <div class="panel panel-default">
         <div class="panel-heading">
           <h3 class="box-title">Configurações</h3>
         </div>
         <div class="panel-body">
           <?= $form->field($model, 'nome')->textInput(['class'=>'form-control']);?>
           <?= $form->field($model, 'desc')->label('Descrição')->textInput(['class'=>'form-control']);?>
           <?php
           if(!$model->params)
           {
             $model->params = ['witht_default'=>1900, 'height_default'=>300];
           }
            ?>
           <?= $form->field($model, 'params[witht_default]')->label('Largura Padrão')->textInput(['class'=>'form-control']);?>
           <?= $form->field($model, 'params[height_default]')->label('Altura Padrão')->textInput(['class'=>'form-control']);?>
           <?= $form->field($model, 'ativar')->label(false)->checkBox(['data-truefalse'=>1,'data-off-label'=>'Desativado','data-on-label'=>'Ativado']);?>
         </div>
       </div>
     </div>

     <div class="col-lg-7">
       <div class="panel panel-default">
         <div class="panel-heading">
           <h3 class="box-title">Items</h3>
         </div>
         <div class="panel-body">
           <div class="alert alert-info">
             Para adicionar um banner com efeito parallax salve as configurações primeiro
           </div>
         </div>
       </div>

     </div>


   </div>
 </div>

<?php ActiveForm::end(); ?>
