<?php
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\helpers\Url;

$grupos = $model->GruposList();
?>

<?php
$form = ActiveForm::begin([
    'id'=>'form-admeditar',
    'layout' => 'horizontal',
    'fieldConfig' => [
      // 'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
      'horizontalCssClasses' => [
          //'label' => 'col-sm-3',
          //'offset' => 'col-sm-offset-4',
          //'wrapper' => 'col-sm-8',
          'error' => '',
          'hint' => '',
      ],
  ],
]);
?>

<div class="pad margin no-print pull-right">
    <div class="box-tools">
    <?= Html::submitButton(' Salvar alterações', ['class' => 'btn btn-lg btn-success fa fa-save', 'name' => 'contact-button']) ?>
    <a href="<?=Url::to(['usermanager/admins']);?>" class="btn btn-lg btn-primary fa fa-angle-double-left">  Voltar</a>
    </div>
</div>
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-6">
    <div class="box box-default">

      <div class="box-body">
      <div class="box-header ui-sortable-handle">
          <h3 class="box-title">Admistrador:  <?=$model->nome; ?> <br /><small>Criado: <?=$model->dt_cadastro; ?> - Acessou: <?=$model->dt_ult_acesso; ?></small> </h3>
          <?=($model->status_acesso)?'<span class="badge bg-green pull-right">Ativo</span>':'<span class="badge bg-red">Inativo</span>'; ?>
      </div>

      <div id="erros">
      <?=$form->errorSummary($model); ?>
      </div>

      <?= $form->field($model, 'avatar')->widget(InputFile::className(),[
        'language'      => 'pt-BR',
        'controller'    => '_adm/admimages',
        //'path' => '/media/admavatar/',
        'filter'        => 'image',
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => ['class' => 'form-control'],
        'buttonOptions' => ['class' => 'btn btn-default'],
        'multiple'      => false
      ]); ?>
      <!-- fim avatar  -->

      <?= $form->field($model, 'grupos_id')->dropDownList($grupos,['class'=>'form-control']); ?>
      <!-- fim drop grupos -->


      <?= $form->field($model, 'nome')->textInput(['class'=>'form-control','placeholder'=>'Nome do usário']);?>
      <!-- fim nome de usuario -->

      <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail para acesso']);?>
      <!-- fim email -->

      <?= $form->field($model, 'status_acesso')->checkBox(['label'=>'Ativar']);?>
      <!-- fim ativar -->

    </div>
      <!-- fim box body  -->

    </div>
    <!-- fim do box-default -->
  </div>
  <!-- fim col-6 -->
  <div class="col-md-6">

    <div class="box box-default">

      <div class="box-header ui-sortable-handle">
          <!-- <h3 class="box-title">Dados do perfil</h3> -->
          <div class="bg-aqua-active pull-left img-circle margin-right">
            <?php if($model->avatar): ?>
            <img width="150px"  src="<?=$model->avatar ?>" alt="" />
          <?php else: ?>
            <img class="img-circle" src="temas/purephoenix/images/admin.png" alt="" />
          <?php endif; ?>
          </div>
          <div >
            <p><strong>Nome:</strong> <?=$model->nome;?></p>
            <p><strong>E-mail:</strong> <a href="mailto:<?=$model->email;?>"><?=$model->email;?></a></p>
            <p><strong>Grupo:</strong> <span class="label label-success"><?=$grupos[$model->grupos_id];?></span></p>
          </div>
      </div>

    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Editar senha <?=Html::a('<i class="fa fa-edit"></i>', '#edit-senha', ['class'=>'btn btn-primary btn-xs','data-editsenha'=>'']); ?></h3>
      </div>
      <div class="panel-body">
        <div id="edit-senha" class="">
          <p class="alert alert-info">
            Sua senha está criptografada, para editar a senha clique no botão do lado de editar senha.
          </p>
        </div>
      </div>
    </div>
    <!-- fim painel default -->
  </div>
  <!-- fim col-6 -->
</div>
<!-- fim row -->


<?php ActiveForm::end(); ?>


<script type="text/javascript">
  $(document).ready(function(){
    $('[data-editsenha]').on('click',function(e){
      e.preventDefault();
      botao = $(this);
      botao.text('aguarde ....');
      box = $($(this).attr('href'));
      $.post('<?=Url::to(['usermanager/ajaxinsertsenhaadm']);?>', function( data ) {
          $( box ).html( data );
          botao.remove();
      });

    });
  });
</script>
