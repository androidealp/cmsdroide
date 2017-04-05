<?php
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use app\temas\admin\gentelella\MainAssets;
use app\_adm\components\helpers\MenuHelper;
use app\_adm\components\widgets\menu\Menu;
use app\_adm\components\widgets\toastr\Toastr;

//use \app\_adm\components\widgets\admMensagens\admMensagens;

MainAssets::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    
    <title><?=(isset($this->title))?Html::encode($this->title):'Admin - CMSDroide'; ?></title>
      <?php $this->head() ?>
  </head>
<body class="nav-md">
    <?php $this->beginBody(); ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <!-- menu profile quick info -->
            <div class="profile clearfix" style="padding:0 10px;">
               <a href="<?=Url::to(['/_adm'])?>">
              <?=Html::img(\Yii::$app->getModule('_adm')->params['logo'], ['style'=>'width:100%;']); ?>  
              </a>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->

            <?=Menu::widget([
                'datamenu'=>MenuHelper::AdmMenu()->ListMenu()
              ]) ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Meu perfil" href="<?=Url::to(['usermanager/editar-adm','id'=>\Yii::$app->user->identity->id]);?>">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=Url::to(['painel/logout']);?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">


                  <?php if (\Yii::$app->user->identity->avatar): ?>
                  <?=Html::img('@web/'.\Yii::$app->user->identity->avatar, []); ?>  
                <?php else: ?>
                    <?=Html::img('@web/temas/adm-common/img/icons/user.svg', []); ?>
                <?php endif; ?>
                    <?=\Yii::$app->user->identity->nome ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=Url::to(['usermanager/editar-adm','id'=>\Yii::$app->user->identity->id]);?>"><i class="fa fa-user"></i>Perfil</a></li>
                    <li><a href="<?=Url::to(['painel/logout']);?>"><i class="fa fa-sign-out pull-right"></i>Sair</a></li>
                  </ul>
                </li>

                <?php //admMensagens::widget([]);?>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <?=$content  ?>      
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            CMSDroide - Desenvolvido por André Luiz Pereira <a href="http://www.github.com/androidealp"><i class="fa fa-github"></i></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
  <?=Toastr::widget()?>
  <?php $this->endBody() ?>
  </body>

</html>
<?php $this->endPage() ?>
