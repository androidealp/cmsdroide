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

<div class="page-section">
  <div class="row">
    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">

      <div class="panel panel-default">
        <div class="panel-body">
          <h3 class="box-title">Gerenciar <?=$model->nome?> </h3>
          <div class="box-tools pull-right">
            <?=Html::a('<< Voltar',['/_adm/widget-effects'], ['class'=>'btn btn-danger']); ?>
            <?=Html::submitButton('<i class="fa fa-edit"></i> Editar',['class'=>'btn btn-primary']); ?>
          </div>


            <p class="text-info">
              Atenção qualquer modificação destes itens após o salvar implicará imediatamente na página configurada com o efeito.
            </p>
            <p >
              Tipo: <code><?=Html::encode(\Yii::$app->request->get('widget'));  ?></code><br />
              Chave de acesso: <code><?=$model->key?></code> <br/>
            </p>


        </div>
      </div>

      <div class="row">

        <div class="col-md-4">

          <div class="panel panel-default">
              <div class="panel-header">
                <h3 class="box-title"><?=$model->nome?> - Configurações</h3>
              </div>
              <!-- /.box-header -->
              <div class="panel-body margin">
                <?= $form->field($model, 'nome')->textInput(['class'=>'form-control']);?>
                <?= $form->field($model, 'desc')->label('Descrição')->textInput(['class'=>'form-control']);?>
                <?= $form->field($model, 'ativar')->checkBox(['label'=>'Publicado']);?>
                <?= $form->field($model, 'params[slide-auto]')->checkBox(['label'=>'Slide automatico']);?>
                <?= $form->field($model, 'params[panel-text]')->checkBox(['label'=>'Texto no banner']);?>
                <?= $form->field($model, 'params[navegacao]')->checkBox(['label'=>'Navegação']);?>
                <?= $form->field($model, 'params[prev-next]')->checkBox(['label'=>'Botões Anterior e próximo']);?>
              </div>
              <!-- /.panel-body -->
            </div>
            <!-- /.panel  -->


        </div>
          <!-- /.col-md-4  -->
        <div class="col-md-8">

          <div class="panel panel-default">

                <div class="panel-header">

                    <?php //Html::a('Adicionar Item','#', ['class'=>'btn btn-success']); ?>

                    <div class="row">

                      <div class="col-md-12">
                        <?=ActionsBox::widget(
                        [
                          //'add_titulo'=>false,
                          'buttons'=>[
                           'custom'=>[
                               'text'=>'<span class="fa fa-plus"></span>',
                               'params'=>[
                                 'data-btedturl'=>\yii\helpers\Url::to(['/_adm/widget-effects/ajax-novoitem','widget'=>'slideshow','key'=>$model->key]),
                                 'data-formid'=>'form-newitem',
                                 'data-pajaxid'=>'list-themes',
                                 'class'=>'btn btn-block btn-info',
                                 'title'=>'',
                               ]
                           ]
                        ]]); ?>
                      </div>

                    </div>


                </div>

             <div class="panel-body">
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
                                 <?= $form->field($model, 'items['.$k.'][video]')->label('Video do Youtube')->textInput(['class'=>'form-control']);?>
                                 <?= $form->field($model, 'items['.$k.'][order]')->label('ordem')->textInput(['class'=>'form-control']);?>
                               </div>
                             </div>
                           </div>
                         <?php endforeach; ?>
                       </div>
             </div>
          </div>

        </div>
        <!-- /col-md-8 -->
      </div>


    </div>
    <!-- /col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 -->
  </div>
</div>


<?php ActiveForm::end(); ?>
