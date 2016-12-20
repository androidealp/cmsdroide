<?php
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\helpers\Url;

$grupos = $model->GruposList();

$icon = yii\helpers\Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle']);
if($model->avatar)
{
  $icon =  yii\helpers\Html::img('@web/'.$model->avatar, ['class'=>'img-circle']);
}

$status = '<i class="fa fa-times text-danger"></i>';

if($model->status_acesso)
{
  $status = '<i class="fa fa-check text-success"></i>';
}

?>


<div class="page-section">
  <div class="row">
    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
      <?php if ($model->HasErros()): ?>
        <div class="col-md-12">
          <div class="panel panel-danger ">
            <h1>Erros encontrados:</h1>
            <?php echo $model->HtmlErros(); ?>
          </div>
        </div>
      <?php else: ?>

      <?php endif; ?>

      <div class="col-md-4">
          <div class="panel panel-default widget-user-1 text-center">
            <div class="avatar">
              <?=$icon?>
              <h3><?=$model->nome?></h3>

              <small>Criado: <?=$model->dt_cadastro; ?> - Acessou: <?=$model->dt_ult_acesso; ?></small>
            </div>
            <div class="profile-icons margin-none">

              <span><i class="fa fa-clock-o"></i>Acessou: <?=$model->dt_ult_acesso; ?></span>
              <span><i class="fa fa-check-square-o"></i> Status: <?=$status; ?></span>

            </div>
            <?php if ($model->descricao): ?>
                <div class="panel-body">
                  <div class="expandable expandable-indicator-white expandable-trigger">
                    <h3>Descrição</h3>
                    <div class="expandable-content">
                      <p><?=$model->descricao?></p>
                    <div class="expandable-indicator"><i></i></div></div>
                  </div>
                </div>
            <?php endif; ?>
          </div>

          <!-- box1 -->
          <div class="panel panel-default">

            <div class="panel-body">
              <?php if ($model->checkAcoes('editar')): ?>
                  <?=Html::a('<i class="fa fa-edit"></i>', '#', ['class'=>'pull-right label label-primary','data-content'=>'#edit-senha' , 'data-ajaxrender'=>Url::to(['usermanager/ajax-inserir-senha','type'=>'admin','id'=>$model->id])]); ?>
              <?php endif; ?>

            <h3 class=" text-headline margin-top-none "><i class="fa fa-fw fa-lock text-default"></i> Minha Senha</h3>

              <div id="edit-senha" class="">
                <p class="text-info">
                   Sua senha está criptografada, para editar a senha clique no botão acima.
                </p>
              </div>

            </div>

          </div>
         <!-- box1 -->
      </div>
      <div class="col-md-8">
          <div class="panel panel-default">
            <?php
            $form = ActiveForm::begin([
                'id'=>'form-admeditar',
                'layout' => 'horizontal',
                'fieldConfig' => [
                   'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                  'horizontalCssClasses' => [
                      'label' => 'col-sm-3',
                      'offset' => 'col-md-offset-1',
                      'wrapper' => 'col-sm-12',
                      'error' => '',
                      'hint' => '',
                  ],
              ],
            ]);
            ?>
            <div class="panel-body">
                <?php if ($model->checkAcoes('editar')): ?>
                  <?= Html::submitButton(' Salvar', ['class' => ' pull-right btn btn-success fa fa-save block', 'name' => 'cadastro']) ?>
                <?php endif; ?>
                <h3 class="margin-none text-headline">Dados administrativos</h3>
                <?= $form->field($model, 'grupos_id')->dropDownList($grupos,['class'=>'form-control']); ?>

                <?= $form->field($model, 'cargo')->textInput(['class'=>'form-control','placeholder'=>'Informe o cargo do usuário']);?>

                <?= $form->field($model, 'avatar')->widget(InputFile::className(),[
                  'language'      => 'pt-BR',
                  'controller'    => '_adm/admimages',
                  'path' => 'image',
                  'filter'        => 'image',
                  'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                  'options'       => ['class' => 'form-control', 'placeholder'=>'Inserir imagem de logo (não é obrigatório)'],
                  'buttonOptions' => ['class' => 'btn btn-default'],
                  'multiple'      => false
                ]); ?>

                <?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do usário']);?>
                <!-- fim nome de usuario -->

                <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail para acesso']);?>
                <!-- fim email -->
                <h4>Descrição <small>Fincará visivel nos posts do blog</small></h4>
                <?= $form->field($model, 'descricao')->textarea(['class'=>'height-150 col-md-12']);?>

                <div class="panel-footer padding-none">
                  <div class="row">
                    <div class="col-md-4 col-md-offset-8">
                        <?=$form->field($model, 'status_acesso')->label(false)->checkBox(['data-truefalse'=>'1','data-off-label'=>'Desativar','data-on-label'=>'Ativar']);?>
                    </div>
                  </div>



                </div>

            </div>
            <?php ActiveForm::end(); ?>
          </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  // $(document).ready(function(){
  //   $('[data-editsenha]').on('click',function(e){
  //     e.preventDefault();
  //     botao = $(this);
  //     botao.text('aguarde ....');
  //     box = $($(this).attr('href'));
  //     $.post('<?=Url::to(['usermanager/ajaxinsertsenhaadm']);?>', function( data ) {
  //         $( box ).html( data );
  //         botao.remove();
  //     });
  //
  //   });
  // });
</script>
