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
         <h3 class="box-title">Gerenciar <?=$model->nome?> </h3>
         <div class="box-tools pull-right">
           <?=Html::a('<< Voltar',['/_adm/widget-effects'], ['class'=>'btn btn-danger']); ?>
           <?=Html::submitButton('<i class="fa fa-edit"></i> Editar',['class'=>'btn btn-primary']); ?>
         </div>
       </div>
       <div class="box-body margin">
         <p class="text-info">
           Atenção qualquer modificação destes itens após o salvar implicará imediatamente na página configurada com o efeito.
         </p>
         <p >
           Tipo: <code><?=Html::encode(\Yii::$app->request->get('widget'));  ?></code><br />
           Chave de acesso: <code><?=$model->key?></code> <br/>

         </p>
       </div>
     </div>
   </div>
 </div>

<div class="row">
  <div class="col-md-4">

    <div class="box box-primary direct-chat direct-chat-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$model->nome?> - Configurações</h3>
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
          <h3 class="box-title"><?=$model->nome?> - Items Banner</h3>
          <div class="box-tools pull-right">
            <?php //Html::a('Adicionar Item','#', ['class'=>'btn btn-success']); ?>

            <?=ActionsBox::widget(
            [
              //'add_titulo'=>false,
              'buttons'=>[
               'custom'=>[
                   'text'=>'<span class="fa fa-plus"></span> Adicionar novo Item',
                   'params'=>[
                     'data-btedturl'=>\yii\helpers\Url::to(['/_adm/widget-effects/ajax-novoitem','widget'=>'slideshow','key'=>$model->key]),
                     'data-formid'=>'form-newitem',
                     'data-pajaxid'=>'list-themes',
                     'class'=>'btn btn-block btn-info',
                     'title'=>'Adicionar novo item',
                   ]
               ]
            ]]); ?>


          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body margin">

          <!-- NEW BOX ACCORDION -->
          <div class="box-group" id="accordion">
                    <?php foreach ($model->items as $k => $item): ?>
                      <div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?=$k?>"  class="">
                              <?=$item['titulo'] ?>
                            </a>
                          </h4>
                          <div class="box-tools pull-right">
                            <?=Html::a('<i class="fa fa-times"></i>','#',
                            [
                              'class'=>'btn btn-xs btn-danger',
                              'title'=>'Esta ação irá remover ['.$item['titulo'].'] deseja continuar?',
                              'data-mdconfirm'=>\yii\helpers\Url::to(['/_adm/widget-effects/ajax-delete-item','widget'=>'slideshow','key'=>$model->key,'item'=>$k]),

                          ]); ?>

                          </div>
                        </div>
                        <div id="collapse-<?=$k?>" class="panel-collapse collapse <?=($k == 0)?'in':''?>" >
                          <div class="box-body">
                            <?= $form->field($model, 'items['.$k.'][titulo]')->label('Titulo')->textInput(['class'=>'form-control']);?>
                            <?= $form->field($model, 'items['.$k.'][desc]')->label('Descrição')->textArea(['class'=>'form-control']);?>
                            <?= $form->field($model, 'items['.$k.'][urlbt]')->label('Url do botão')->textInput(['class'=>'form-control']);?>
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
                            <?= $form->field($model, 'items['.$k.'][video]')->label('Video do Youtube')->textInput(['class'=>'form-control']);?>
                            <?= $form->field($model, 'items['.$k.'][order]')->label('ordem')->textInput(['class'=>'form-control']);?>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
          <!-- /NEW BOX ACCORDION -->

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box  -->




  </div>
  <!--/.col-md-8  -->
</div>
<!--/.row  -->

<?php ActiveForm::end(); ?>
