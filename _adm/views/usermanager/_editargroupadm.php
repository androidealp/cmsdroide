<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use \app\_adm\components\widgets\actionsbox\ActionsBox;
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
          'id'=>'form-admeditar',
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

      <div class="panel panel-default">
        <div class="panel-body">

        <?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do grupo']);?>

        <?=$form->field($model, 'menu_permissoes')->dropDownList($model->getPermissoes(),[
          'class'=>'form-control',
          'placeholder'=>'Permissões do menu',
          'multiple'=>true

        ]);?>


        <?=$form->field($model, 'atrib_permissoes')->dropDownList($model->getAttributes(),[
          'class'=>'form-control',
          'placeholder'=>'Permissões Globais',
          'multiple'=>true

        ]);?>

        <div class="form-group form-control-line-tb border-default border-x2 form-control-padding-tb">
          <div class="col-md-6 col-md-offset-6">
            <div class="btn-group pull-right">
              <!-- faa-pulse -->
              <?=Html::a('<i class="fa fa-fw icon-reply-fill faa-pulse"></i> Voltar',['usermanager/managergroups'], ['class' => 'btn btn-danger btn-stroke faa-parent animated-hover'])  ?>
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
