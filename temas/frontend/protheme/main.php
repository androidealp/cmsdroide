<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
// use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
// use yii\widgets\Breadcrumbs;
use app\temas\frontend\protheme\ProThemeAsset;

ProThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?=(isset($this->title))?Html::encode($this->title):'AmorMeu'; ?></title>
<?php $this->head() ?>

<!--[if lt IE 9]>
<script src="<?=Url::to('@web/temas/amormeu/js/ie9/html5shiv.min.js')?>"></script>
<script src="<?=Url::to('@web/temas/amormeu/js/ie9/respond.min.js')?>"></script>
<![endif]-->

</head>

<body>
  <?php $this->beginBody() ?>
  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container">
    <!-- Fixed navbar -->
    <div class="navbar navbar-main navbar-default navbar-fixed-top" role="navigation">

      <div class="container">

          <!-- <div class="navbar-header navbar-logo"> -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- <a href="#sidebar-chat" data-toggle="sidebar-menu" class="toggle pull-right visible-xs"><i class="fa fa-comments"></i></a> -->
            <a class="navbar-brand-amormeu navbar-brand-logo" href="<?=Url::toRoute('institucional/index', true);?>">
              <?=Html::img('@web/temas/amormeu/images/amormeu/logo-amormeu.png',[
                ]) ?>
            </a>
          </div>

          <!-- Campos de login inserir aqui -->

          <!-- Collect the nav links, forms, and other content for toggling -->
          <?php echo \app\components\widgets\Login\Login::widget(['enable'=>0]);?>

<div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=Url::toRoute('institucional/quem-somos', true);?>">Institucional</a></li>
            <!-- <li><a href="<?=Url::toRoute('institucional/depoimentos', true);?>">Depoimentos</a></li> -->
            <li><a href="<?=Url::toRoute('institucional/como-funciona', true);?>">Como funciona</a></li>
            <li><a href="<?=Url::toRoute('/blog', true);?>">Blog</a></li>
            <li><a href="<?=Url::toRoute('institucional/cadastrar', true);?>">Cadastre-se</a></li>
            <li><a href="<?=Url::toRoute('institucional/contato', true);?>">Contato</a></li>

            <?php if(\Yii::$app->user->isGuest): ?>
            <li><a href="#" data-modalajax="<?=Url::toRoute('institucional/ajax-login', true);?>" title="Acesso Restrito" >Login</a></li>
          <?php else: ?>
            <!-- <li><a href="<?=Url::toRoute('painel/index', true);?>" title="Acesso Restrito" >Meu Painel</a></li> -->

             <li class="dropdown user">
              <a href="#" title="Meu Painel" data-toggle="dropdown" aria-expanded="false">
                <?php echo Html::img('@web/temas/admamormeu/img/avatar_user.png', ['class'=>'img-circle avatar-menu'], ['alt'=>'Meu painel']) ?>Painel<span class="caret"></span>

              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=Url::toRoute('blog/index', true);?>"><i class="fa fa-user"></i>Meu painel</a></li>
                <!-- <li><a href="#"><i class="fa fa-wrench"></i>Configurações</a></li> -->
                <li><?=Html::a('<i class="fa fa-sign-out"></i> Sair',['institucional/logout'])?></li>

              </ul>
            </li>
          <?php endif; ?>

          </ul>
          <!-- /.navbar-collapse -->

          </div>
      </div>
    </div>

    <!-- content push wrapper -->
    <div class="st-pusher" id="content">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">
            <?=$content?>
        </div>
        <!-- Footer aqui!-->

      </div>
      <!-- /st-content -->

    </div>
    <!-- /st-pusher -->

    <!-- Footer -->
    <footer class="footer bg-blue-grey-800">
      <div class="container">
        <div class="col-md-6">
            <strong>Todos os direitos reservados Copyright</strong> &copy; 2016 - AmorMeu
        </div>
        <div class="col-md-6">
          <div class="pull-right">
              <a target="_blank" href="http://www.next4.com.br">Desenvolvido por Agência Next4</a>
          </div>
        </div>
      </div>
    </footer>
    <!-- // Footer -->

  </div>
  <!-- /st-container -->
  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "learning",
      skins: {
        "default": {
          "primary-color": "#16ae9f"
        },
        "orange": {
          "primary-color": "#e74c3c"
        },
        "blue": {
          "primary-color": "#4687ce"
        },
        "purple": {
          "primary-color": "#af86b9"
        },
        "brown": {
          "primary-color": "#c3a961"
        }
      }
    };
  </script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
