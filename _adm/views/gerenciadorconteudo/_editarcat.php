<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use \app\_adm\components\widgets\actionsbox\ActionsBox;
use yii\helpers\Url;
?>


<div class="page-section">
  <div class="row">
    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">

      <div class="panel panel-default">
        <div class="panel-body">
          <?=ActionsBox::widget(); ?>
        </div>
      </div>

      <?php
      $form = ActiveForm::begin([
          'id'=>'form-cateditar',
          'layout' => 'horizontal',
          'fieldConfig' => [
              'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
              'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'offset' => 'col-md-offset-3',
                'wrapper' => 'col-sm-9',
                'error' => '',
                'hint' => '',
              ],
          ],
      ]);
      ?>
      <div class="tabbable tabs-primary">
        <!-- Tabs -->
        <ul class="nav nav-tabs">
          <li class="active" ><a href="#categorias" class="faa-parent animated-hover" data-toggle="tab"><i class="fa fa-fw fa-sitemap fa-2x faa-shake"></i> Categorias</a></li>
          <li><a href="#extra_params" class="faa-parent animated-hover" data-toggle="tab"><i class="fa fa-fw fa-plug fa-2x faa-shake"></i> Parametros Extras</a></li>
        </ul>
        <!-- // END Tabs -->
        <div class="tab-content">
          <div id="categorias" class="tab-pane active">
            <?= $form->field($model, 'linguagem_id')->dropDownList($languages,['class'=>'form-control']); ?>

            <?= $form->field($model, 'parent')->dropDownList($model->ListaCategoriasPais(),['class'=>'form-control','prompt'=>'Sem vínculo atualmente']); ?>

            <?= $form->field($model, 'nome')->textInput(['class'=>'form-control']);?>

            <?= $form->field($model, 'alias')->textInput(['class'=>'form-control', 'placeholder'=>'Gera dinamicamente se vazio']);?>

            <?= $form->field($model, 'status')->label(false)->checkBox(['data-truefalse'=>1,'data-off-label'=>'Desativar','data-on-label'=>'Ativar']);?>
          </div>
          <div id="extra_params" class="tab-pane">

            <div class="row">
              <div class="col-md-3">
                <label for="" class="label-check">Tamanho Imagem Intro </label>
              </div>
              <div class="col-md-9">
                <?= $form->field($model, 'parametros_extra[size_imagem_intro]')
                ->label(false)
                ->textInput([
                  'class'=>'form-control form-control-sm ',
                  'placeholder'=>'size px: 300|300'
                ])?>
              </div>
            </div>


            <div class="row">
              <div class="col-md-3">
                <label for="" class="label-check">Tamanho Imagem Conteúdo </label>
              </div>
              <div class="col-md-9">
                <?= $form->field($model, 'parametros_extra[size_imagem_content]')
                ->label(false)
                ->textInput([
                  'class'=>'form-control form-control-sm ',
                  'placeholder'=>'size px: 300|300'
                ])?>
              </div>
            </div>

            <h3 class="text-danger">Configuração SEO</h3>
            <p>Estas configurações serão usadas para listagem de categoria.</p>
            <div class="row">
              <div class="col-md-3">
                <label for="" class="label-check">KeyWords </label>
              </div>
              <div class="col-md-9">
                <?= $form->field($model, 'parametros_extra[seo_keywords]')
                ->label(false)
                ->textInput([
                  'class'=>'form-control form-control-sm ',
                  'placeholder'=>'texto, texto2'
                ])?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <label for="" class="label-check">Description </label>
              </div>
              <div class="col-md-9">
                <?= $form->field($model, 'parametros_extra[seo_description]')
                ->label(false)
                ->textArea([
                  'class'=>'form-control form-control-sm ',
                  'placeholder'=>'Descrição aqui...'
                ])?>
              </div>
            </div>




          </div>
          <!-- end tab -->
        </div>
      </div>

      <div class="panel panel-default">

        <div class="panel-body">


          <div class="form-group form-control-line-tb border-default border-x2 form-control-padding-tb">
            <div class="col-md-6 col-md-offset-6">
              <div class="btn-group pull-right">
                <!-- faa-pulse -->
                <?=Html::a('<i class="fa fa-fw icon-reply-fill faa-pulse"></i> Voltar',['gerenciadorconteudo/categorias'], ['class' => 'btn btn-danger btn-stroke faa-parent animated-hover'])  ?>
                <?php if ($model->checkAcoes('editar')): ?>
                    <?= Html::submitButton('<i class="fa fa-save faa-shake"></i> Gravar', ['class' => 'btn btn-success btn-stroke faa-parent animated-hover']) ?>
                <?php endif; ?>

              </div>
            </div>
          </div>


        </div>
      </div>

      <?php ActiveForm::end(); ?>

    </div>
  </div>
</div>
