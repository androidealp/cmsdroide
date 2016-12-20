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
     <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
       <div class="panel panel-default">
         <div class="panel-body">
           <h3 class="box-title">Gerenciar Banner Static: <code><?=$model->nome?></code> </h3>


           <?=$form->errorSummary($model, array("class" => "alert alert-danger")); ?>

           <div class="box-tools pull-right">
             <?=Html::a('<< Voltar',['/_adm/widget-effects'], ['class'=>'btn btn-danger']); ?>
             <?=Html::submitButton('<i class="fa fa-edit"></i> Editar',['class'=>'btn btn-primary']); ?>
           </div>
         </div>
       </div>

       <div class="panel panel-default">
         <div class="panel-heading">
           Atenção qualquer modificação destes itens após o salvar implicará imediatamente na página configurada com o efeito.
         </div>
         <div class="panel-body">
           <p class="alert alert-info">
             Tipo: <code><?=Html::encode(\Yii::$app->request->get('widget'));  ?></code><br />
             Chave de acesso: <code><?=$model->key?></code> <br/>

           </p>
         </div>
       </div>

     </div>

     <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">

     <div class="col-lg-5">
       <div class="panel panel-default">
         <div class="panel-heading">
           <h3 class="box-title">Configurações</h3>
         </div>
         <div class="panel-body">
           <?= $form->field($model, 'nome')->textInput(['class'=>'form-control']);?>
           <?= $form->field($model, 'desc')->label('Descrição')->textInput(['class'=>'form-control']);?>
           <?= $form->field($model, 'params[witht_default]')->label('Largura Padrão')->textInput(['class'=>'form-control']);?>
           <?= $form->field($model, 'params[height_default]')->label('Altura Padrão')->textInput(['class'=>'form-control']);?>
           <?= $form->field($model, 'ativar')->label(false)->checkBox(['data-truefalse'=>1,'data-off-label'=>'Desativado','data-on-label'=>'Ativado']);?>

         </div>
       </div>
     </div>

     <div class="col-lg-7">
       <div class="panel panel-default">
         <div class="panel-heading">
           <h3 class="box-title">Item Banner</h3>
         </div>
         <div class="panel-body">

           <?php if (!$model->items): ?>
           <?= $form->field($model, 'items[0][titulo]')->label('Titulo')->textInput(['class'=>'form-control']);?>
           <?= $form->field($model, 'items[0][desc]')->label('Descrição')->textArea(['class'=>'form-control']);?>
           <?= $form->field($model, 'items[0][urlbt]')->label('Url do botão')->textInput(['class'=>'form-control','placeholder'=>'Se não tiver link não colocar']);?>
           <?= $form->field($model, 'items[0][texto_bt]')->label('Texto do botão')->textInput(['class'=>'form-control','placeholder'=>'Se não tiver link não colocar']);?>

           <?= $form->field($model, 'items[0][image]')->label('Imagem')->widget(InputFile::className(),[
             'language'      => 'pt-BR',
             'controller'    => '_adm/elfinder',
             'path' => 'media/',
             //'filter'        => 'image',
             'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
             'options'       => ['class' => 'form-control'],
             'buttonOptions' => ['class' => 'btn btn-default'],
             'multiple'      => false
           ]); ?>
           <?php else: ?>

             <?php foreach ($model->items as $k => $item): ?>

               <?= $form->field($model, 'items['.$k.'][titulo]')->label('Titulo')->textInput(['class'=>'form-control']);?>
               <?= $form->field($model, 'items['.$k.'][desc]')->label('Descrição')->textArea(['class'=>'form-control']);?>
               <?= $form->field($model, 'items['.$k.'][urlbt]')->label('Url do botão')->textInput(['class'=>'form-control','placeholder'=>'Se não tiver link não colocar']);?>
               <?= $form->field($model, 'items['.$k.'][texto_bt]')->label('Texto do botão')->textInput(['class'=>'form-control','placeholder'=>'Se não tiver link não colocar']);?>

               <?= $form->field($model, 'items['.$k.'][image]')->label('Imagem')->widget(InputFile::className(),[
                 'language'      => 'pt-BR',
                 'controller'    => '_adm/elfinder',
                 'path' => 'media/',
                 //'filter'        => 'image',
                 'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                 'options'       => ['class' => 'form-control'],
                 'buttonOptions' => ['class' => 'btn btn-default'],
                 'multiple'      => false
               ]); ?>

             <?php endforeach; ?>

           <?php endif; ?>



         </div>
       </div>

     </div>

    </div>

   </div>
 </div>

<?php ActiveForm::end(); ?>
