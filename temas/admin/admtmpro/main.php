<?php
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use app\temas\admin\admtmpro\MainAsset;
use app\_adm\components\helpers\MenuHelper;
use app\_adm\components\widgets\menu\Menu;
use app\_adm\components\widgets\toastr\Toastr;

MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l3" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=(isset($this->title))?Html::encode($this->title):'AmorMeu'; ?></title>
      <?php $this->head() ?>
  </head>
<body>
  <?php $this->beginBody(); ?>
  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container">

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="#sidebar-menu" data-toggle="sidebar-menu" data-effect="st-effect-3" class="toggle pull-left visible-xs"><i class="fa fa-bars"></i></a>

          <a href="#sidebar-chat" data-toggle="sidebar-menu" class="toggle pull-right"><i class="fa fa-comments"></i></a>

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.html" class="navbar-brand hidden-xs navbar-brand-primary">
            <?=Html::img(\Yii::$app->getModule('_adm')->params['logo'], ['style'=>'width:160px;']);  ?>
          </a>
        </div>
        <div class="navbar-collapse collapse" id="collapse">

          <ul class="nav navbar-nav navbar-right">
            <!-- notifications -->
            <li class="dropdown notifications updates hidden-xs hidden-sm">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-primary">4</span>
              </a>
              <ul class="dropdown-menu" role="notification">
                <li class="dropdown-header">Notifications</li>
                <li class="media">
                  <div class="pull-right">
                    <span class="label label-success">New</span>
                  </div>
                  <div class="media-left">
                    <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"30"]);  ?>
                  </div>
                  <div class="media-body">
                    <a href="#">Adrian D.</a> posted <a href="#">a photo</a> on his timeline.
                    <br/>
                    <span class="text-caption text-muted">5 mins ago</span>
                  </div>
                </li>
                <li class="media">
                  <div class="pull-right">
                    <span class="label label-success">New</span>
                  </div>
                  <div class="media-left">
                    <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"30"]);  ?>

                  </div>
                  <div class="media-body">
                    <a href="#">Bill</a> posted <a href="#">a comment</a> on Adrian's recent <a href="#">post</a>.
                    <br/>
                    <span class="text-caption text-muted">3 hrs ago</span>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <span class="icon-block s30 bg-grey-200"><i class="fa fa-plus"></i></span>
                  </div>
                  <div class="media-body">
                    <a href="#">Mary D.</a> and <a href="#">Michelle</a> are now friends.
                    <p>
                      <span class="text-caption text-muted">1 day ago</span>
                    </p>
                    <a href="">
                      <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'width-30 img-circle']);  ?>

                    </a>
                    <a href="">
                      <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'width-30 img-circle']);  ?>
                    </a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- // END notifications -->
            <!-- messages -->
            <li class="dropdown notifications hidden-xs hidden-sm">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>

                <span class="badge floating badge-danger">12</span>

              </a>
              <ul class="dropdown-menu">
                <li class="media">
                  <div class="media-left">
                    <a href="#">
                      <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'media-object thumb']);  ?>
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="pull-right">
                      <span class="label label-default">5 min</span>
                    </div>
                    <h5 class="media-heading">Adrian D.</h5>

                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <a href="#">
                      <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'media-object thumb']);  ?>
                    </a>
                  </div>

                  <div class="media-body">
                    <div class="pull-right">
                      <span class="label label-default">2 days</span>
                    </div>
                    <h5 class="media-heading">Jane B.</h5>
                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <a href="#">
                      <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'media-object thumb']);  ?>
                    </a>
                  </div>

                  <div class="media-body">
                    <div class="pull-right">
                      <span class="label label-default">3 days</span>
                    </div>
                    <h5 class="media-heading">Andrew M.</h5>
                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
              </ul>
            </li>
            <!-- // END messages -->
            <!-- user -->
            <li class="dropdown user">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                if(! \Yii::$app->user->isGuest){
                  $avatar = \Yii::$app->user->identity->avatar;
                  echo ($avatar)?Html::img('@web/'.$avatar, ['class'=>'img-circle']):Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle']);
                 echo \Yii::$app->user->identity->nome;
                }
                 ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=Url::to(['usermanager/editar-adm','id'=>\Yii::$app->user->identity->id]);?>"><i class="fa fa-user"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-wrench"></i>Settings</a></li>
                <li><a href="<?=Url::to(['painel/logout']);?>"><i class="fa fa-sign-out"></i>Sair</a></li>
              </ul>
            </li>
            <!-- // END user -->
          </ul>
        </div>
      </div>
    </div>

    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar sidebar-chat right sidebar-size-2 sidebar-offset-0 chat-skin-white st-effect-1" id=sidebar-chat>
      <div class="split-vertical">
        <div class="chat-search">
          <input type="text" class="form-control" placeholder="Search" />
        </div>

        <ul class="chat-filter nav nav-pills ">
          <li class="active"><a href="#" data-target="li">All</a></li>
          <li><a href="#" data-target=".online">Online</a></li>
          <li><a href="#" data-target=".offline">Offline</a></li>
        </ul>
        <div class="split-vertical-body">
          <div class="split-vertical-cell">
            <div data-scrollable>
              <ul class="chat-contacts">
                <li class="online" data-user-id="1">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"40" ]);  ?>
                      </div>
                      <div class="media-body">

                        <div class="contact-name">Jonathan S.</div>
                        <small>"Free Today"</small>
                      </div>
                    </div>
                  </a>
                </li>

                <li class="online away" data-user-id="2">
                  <a href="#">

                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"40" ]);  ?>
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Mary A.</div>
                        <small>"Feeling Groovy"</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online" data-user-id="3">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left ">
                        <span class="status"></span>
                        <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"40" ]);  ?>

                      </div>
                      <div class="media-body">
                        <div class="contact-name">Adrian D.</div>
                        <small>Busy</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="offline" data-user-id="4">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"40" ]);  ?>
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Michelle S.</div>
                        <small>Offline</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="offline" data-user-id="5">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"40" ]);  ?>
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Daniele A.</div>
                        <small>Offline</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online" data-user-id="6">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"40" ]);  ?>
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Jake F.</div>
                        <small>Busy</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online away" data-user-id="7">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"40" ]);  ?>
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Jane A.</div>
                        <small>"Custom Status"</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="offline" data-user-id="8">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"40" ]);  ?>
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Sabine J.</div>
                        <small>"Offline right now"</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online away" data-user-id="9">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"40" ]);  ?>
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Danny B.</div>
                        <small>Be Right Back</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online" data-user-id="10">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"40" ]);  ?>
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Elise J.</div>
                        <small>My Status</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online" data-user-id="11">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle','width'=>"40" ]);  ?>
                      </div>
                      <div class="media-body">
                        <div class="contact-name">John J.</div>
                        <small>My Status #1</small>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script id="chat-window-template" type="text/x-handlebars-template">

      <div class="panel panel-default">
        <div class="panel-heading" data-toggle="chat-collapse" data-target="#chat-bill">
          <a href="#" class="close"><i class="fa fa-times"></i></a>
          <a href="#">
            <span class="pull-left">
                    <img src="{{ user_image }}" width="40">
                </span>
            <span class="contact-name">{{user}}</span>
          </a>
        </div>
        <div class="panel-body" id="chat-bill">
          <div class="media">
            <div class="media-left">
              <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
            </div>
            <div class="media-body">
              <span class="message">Feeling Groovy?</span>
            </div>
          </div>
          <div class="media">
            <div class="media-left">
              <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
            </div>
            <div class="media-body">
              <span class="message">Yep.</span>
            </div>
          </div>
          <div class="media">
            <div class="media-left">
              <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
            </div>
            <div class="media-body">
              <span class="message">This chat window looks amazing.</span>
            </div>
          </div>
          <div class="media">
            <div class="media-left">
              <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
            </div>
            <div class="media-body">
              <span class="message">Thanks!</span>
            </div>
          </div>
        </div>
        <input type="text" class="form-control" placeholder="Type message..." />
      </div>
    </script>

    <div class="chat-window-container"></div>

    <!-- sidebar effects OUTSIDE of st-pusher: -->
    <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->

    <!-- content push wrapper -->
    <div class="st-pusher">

      <!-- Sidebar component with st-effect-3 (set on the toggle button within the navbar) -->
      <div class="sidebar left st-effect-3 sidebar-size-3 sidebar-offset-0 sidebar-skin-blue sidebar-visible-desktop" id=sidebar-menu data-type=collapse>
        <div class="split-vertical">
          <div class="sidebar-block tabbable tabs-icons">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#sidebar-tabs-menu" data-toggle="tab"><i class="fa fa-bars"></i></a></li>
              <li><a href="#sidebar-tabs-2" data-toggle="tab"><i class="fa fa-bar-chart-o"></i></a></li>
            </ul>
          </div>
          <div class="split-vertical-body">
            <div class="split-vertical-cell">
              <div class="tab-content">

                <div class="tab-pane active" id="sidebar-tabs-menu">
                  <div data-scrollable>
                    <!-- ANDRE - MENU CAMPO -->
                    <?php

                    echo Menu::widget([
                      'datamenu'=>MenuHelper::AdmMenu()->ListMenu()
                    ]);

                    ?>
                    <!-- ANDRE MENU CAMPO FIM -->

                  </div>
                </div>
                <!-- // END .tab-pane -->

                <div class="tab-pane" id="sidebar-tabs-2">
                  <div data-scrollable>

                    <div class="category">Activity</div>
                    <div class="sidebar-block">
                      <div class="sidebar-feed">
                        <ul>
                          <li class="media news-item">
                            <span class="news-item-success pull-right "><i class="fa fa-circle"></i></span>
                            <span class="pull-left media-object">
                                                <i class="fa fa-fw fa-bell"></i>
                                            </span>
                            <div class="media-body">
                              <a href="" class="text-white">Adrian</a> just logged in
                              <span class="time">2 min ago</span>
                            </div>
                          </li>
                          <li class="media news-item">
                            <span class="news-item-success pull-right "><i class="fa fa-circle"></i></span>
                            <span class="pull-left media-object">
                                                <i class="fa fa-fw fa-bell"></i>
                                            </span>
                            <div class="media-body">
                              <a href="" class="text-white">Adrian</a> just added <a href="" class="text-white">mosaicpro</a> as their office
                              <span class="time">2 min ago</span>
                            </div>
                          </li>
                          <li class="media news-item">
                            <span class="pull-left media-object">
                                                <i class="fa fa-fw fa-bell"></i>
                                            </span>
                            <div class="media-body">
                              <a href="" class="text-white">Adrian</a> just logged in
                              <span class="time">2 min ago</span>
                            </div>
                          </li>
                          <li class="media news-item">
                            <span class="pull-left media-object">
                                                <i class="fa fa-fw fa-bell"></i>
                                            </span>
                            <div class="media-body">
                              <a href="" class="text-white">Adrian</a> just logged in
                              <span class="time">2 min ago</span>
                            </div>
                          </li>
                          <li class="media news-item">
                            <span class="pull-left media-object">
                                                <i class="fa fa-fw fa-bell"></i>
                                            </span>
                            <div class="media-body">
                              <a href="" class="text-white">Adrian</a> just logged in
                              <span class="time">2 min ago</span>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!--End user-->

                    <div class="sidebar-block equal-padding">
                      <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <label class="btn btn-default active">
                          <input type="radio" name="options" id="option1" autocomplete="off" checked> <i class="fa fa-envelope"></i>
                        </label>
                        <label class="btn btn-default">
                          <input type="radio" name="options" id="option2" autocomplete="off"> <i class="fa fa-lock"></i>
                        </label>
                        <label class="btn btn-default">
                          <input type="radio" name="options" id="option31" autocomplete="off"> <i class="fa fa-list"></i>
                        </label>
                        <label class="btn btn-default">
                          <input type="radio" name="options" id="option32" autocomplete="off"> <i class="fa fa-group"></i>
                        </label>
                      </div>
                    </div>

                    <!-- Calendar -->
                    <div class="category">Calendar</div>
                    <div class="sidebar-block padding-none">
                      <div class="datepicker"></div>
                    </div>

                  </div>
                </div>

              </div>
              <!-- // END .tab-content -->

            </div>
            <!-- // END .split-vertical-cell -->

          </div>
          <!-- // END .split-vertical-body -->

          <ul class="sidebar-menu sm-active-item-bg sm-icons-right sm-icons-block">
            <li><a target="_blank"  href="http://www.next4.com.br/login.php"><i class="fa fa-eye"></i> <span>Suporte Next4</span></a></li>
          </ul>

        </div>
      </div>

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">
          <!-- PRINCIPAL   -->
          <div class="container-fluid">
            <?=$content  ?>
          </div>
          <!-- /container-fluid -->
        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
    <!-- /st-pusher -->

    <!-- Footer -->
    <footer class="footer">
      <a href="http:://www.next4.com.br" target="_blank"><strong>Next4</strong> Todos os direitos reservados.</a>
    </footer>
    <!-- // Footer -->

  </div>
  <!-- /st-container -->

  <script type="text/javascript">

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
      theme: "admin",
      skins: {
        "default": {
          "primary-color": "#81b53e"
        }
      }
    };
  </script>

  <?=Toastr::widget()?>

  <?php $this->endBody() ?>

</body>

</html>
<?php $this->endPage() ?>
