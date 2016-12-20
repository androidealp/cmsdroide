<?php
  use yii\helpers\Html;



?>
  <h1 class="text-headline page-section-heading"><?=\Yii::$app->getModule('_adm')->params['title-page'];?></h1>
  <div class="row" data-toggle="isotope">

    <div class="item col-xs-12 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="btn-group btn-group-justified">
            <a href="#" class="btn btn-default">Now</a>
            <a href="#" class="btn btn-white">Yesterday</a>
          </div>
        </div>
        <hr class="margin-none" />
        <div class="panel-body text-center">
          <h4 class="text-display-1">&dollar;129,563</h4>
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="progress progress-mini">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
                  <span class="sr-only">55% Complete</span>
                </div>
              </div>
            </div>
            <a href="#" class="btn btn-white">Add <i class="fa fa-plus"></i></a>
          </div>
        </div>
        <ul class="list-group">
          <li class="list-group-item">
            <div class="media v-middle">
              <div class="media-left">
                <a href="#">
                  <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle width-30']);  ?>

                </a>
              </div>
              <div class="media-body">
                <a href="#" class="text-subhead">Adrian Demian</a>
              </div>
              <div class="media-right">
                <div class="text-subhead">&dollar;12,201</div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="media v-middle">
              <div class="media-left">
                <a href="#">
                  <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle width-30']);  ?>
                </a>
              </div>
              <div class="media-body">
                <a href="#" class="text-subhead">Suzanne Morris</a>
              </div>
              <div class="media-right">
                <div class="text-subhead">&dollar;11,546</div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="media v-middle">
              <div class="media-left">
                <a href="#">
                  <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle width-30']);  ?>
                </a>
              </div>
              <div class="media-body">
                <a href="#" class="text-subhead">Jonny Sea</a>
              </div>
              <div class="media-right">
                <div class="text-subhead">&dollar;8,732</div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="media v-middle">
              <div class="media-left">
                <a href="#">
                <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle width-30']);  ?>
                </a>
              </div>
              <div class="media-body">
                <a href="#" class="text-subhead">
      Mary Dawson
    </a>
              </div>
              <div class="media-right">
                <div class="text-subhead">&dollar;6,732</div>
              </div>
            </div>
          </li>
        </ul>

      </div>
    </div>

    <div class="item col-xs-12 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4 text-center">
              <p class="text-body-2 text-light margin-none">Total</p>
              <p class="text-title text-primary margin-none">12,309</p>
            </div>
            <div class="col-md-4 text-center">
              <p class="text-body-2 text-light margin-none">Earned</p>
              <p class="text-title text-success margin-none">14,309</p>
            </div>
            <div class="col-md-4 text-center">
              <p class="text-body-2 text-light margin-none">Spent</p>
              <p class="text-title text-danger margin-none">2,000</p>
            </div>
          </div>
        </div>
        <hr />
        <div id="area-chart" data-toggle="morris-chart-area" class="height-200"></div>
        <div class="btn-group btn-group-footer btn-group-justified">
          <a href="#" class="btn btn-lg">
            <i class="fa fa-bell-o"></i>
          </a>
          <a href="#" class="btn btn-lg">
            <i class="fa fa-calendar"></i>
          </a>
          <a href="#" class="btn btn-lg">
            <i class="fa fa-plus"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="item col-xs-12 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="media v-middle">
            <div class="media-left">
              <a href="#">
                <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle width-40']);  ?>
              </a>
            </div>
            <div class="media-body">
              <a href="#" class="text-subhead link-text-color">
    Adrian Demian
  </a>
              <div class="text-caption text-light">Earned: &dollar;12,300</div>
            </div>
            <div class="media-right">
              <div class="width-100 text-right">
                <a href="#" class="btn btn-primary btn-sm"> View</a>
              </div>
            </div>
          </div>
        </div>
        <hr class="margin-none" />
        <div id="bar-chart" data-toggle="morris-chart-bar" class="height-150"></div>
      </div>
    </div>

    <div class="item col-md-4 col-sm-6 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-body">
          <h3 class="text-center text-headline margin-none">

            Sales Target:
            <span class="text-primary">85%</span>
          </h3>
        </div>
        <hr/>
        <div class="panel-body">
          <div data-percent="85" data-size="95" class="easy-pie inline-block primary" data-scale-color="false" data-track-color="#efefef" data-line-width="6">
            <div class="value text-center">
              <span class="strong"><i class="icon-graph-up-1 fa-3x text-default"></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="item col-md-4 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-6">
              <h4 class="text-headline margin-none">291</h4>
              <p class="text-light"><i class="fa fa-circle-o text-success fa-fw"></i> Subscribers</p>
            </div>
            <div class="col-xs-6">
              <h4 class="text-headline margin-none">17</h4>
              <p class="text-light"><i class="fa fa-circle-o text-danger fa-fw"></i> Unsubscribers</p>
            </div>
          </div>

          <div class="progress progress-mini">
            <div class="progress-bar progress-bar-success" style="width: 85%">
              <span class="sr-only">35% Complete (info)</span>
            </div>
            <div class="progress-bar progress-bar-danger" style="width: 15%">
              <span class="sr-only">10% Complete (danger)</span>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <div class="text-right">
            <a href="#" class="btn btn-white">View Activity</a>
          </div>
        </div>

      </div>
    </div>

    <div class="item col-md-4 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div id="world-map-markers" data-toggle="vector-world-map-markers" class="overflow-hidden height-180"></div>
        </div>
        <ul class="list-group">
          <li class="list-group-item">
            <div class="media v-middle">
              <div class="media-left">
                <div class="width-30">
                  <i class="fa fa-circle text-red-400"></i>
                </div>
              </div>
              <div class="media-body">
                United States
              </div>
              <div class="media-right">
                <div class="text-right">
                  <div class="sparkline-line width-100" sparkHeight="20" sparkWidth="100%" data-data="[ 184, 357, 297, 591, 196, 108, 466, 186 ]"></div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="media v-middle">
              <div class="media-left">
                <div class="width-30">
                  <i class="fa fa-circle text-blue-400"></i>
                </div>
              </div>
              <div class="media-body">
                Europe
              </div>
              <div class="media-right">
                <div class="text-right">
                  <div class="sparkline-line width-100" sparkHeight="20" sparkWidth="100%" data-data="[ 184, 357, 297, 591, 196, 108, 466, 186 ]"></div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="media v-middle">
              <div class="media-left">
                <div class="width-30">
                  <i class="fa fa-circle text-grey-400"></i>
                </div>
              </div>
              <div class="media-body">
                Asia
              </div>
              <div class="media-right">
                <div class="text-right">
                  <div class="sparkline-line width-100" sparkHeight="20" sparkWidth="100%" data-data="[ 184, 357, 297, 591, 196, 108, 466, 186 ]"></div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <div class="item col-md-4 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row text-center">
            <div class="col-md-6">
              <h4 class="margin-none">Gross Revenue</h4>
              <p class="text-display-1 text-warning margin-none">102.4k</p>
            </div>
            <div class="col-md-6">
              <h4 class="margin-none">Net Revenue</h4>
              <p class="text-display-1 text-success margin-none">55k</p>
            </div>
          </div>
        </div>
        <hr/>
        <div class="panel-body">
          <div id="line-holder" data-toggle="flot-chart-lines-3" class="flotchart-holder height-200"></div>
        </div>
      </div>
    </div>
    <div class="item col-md-4 col-sm-6 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-body">
          <h4 class="text-headline">Overall Performance</h4>
          <p class="text-h2 text-primary">
            <strong>+309</strong>
          </p>
        </div>
        <hr class="margin-none" />
        <div class="panel-body">
          <div class="sparkline-bar" sparkHeight="66">
            <span class="hide">0:10,7:3,5:5,6:4,3:7,7:3,5:5,6:4,2:8,3:7,7:3,5:5,0:10</span>
          </div>
        </div>
      </div>
    </div>
    <div class="item col-md-4 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="media sparkline-stats">
          <div class="pull-left">
            <div class="panel-body">
              <div class="sparkline-bar" data-colors="true">
                <span>6,5,8,6,1</span>
              </div>
            </div>
          </div>
          <div class="media-body">
            <ul class="list-group">
              <li class="list-group-item"><i class="fa fa-fw fa-square text-primary"></i>
                <strong>5,931</strong> Visits</li>
              <li class="list-group-item"><i class="fa fa-fw fa-square text-success"></i>
                <strong>402</strong> Conversions</li>
              <li class="list-group-item"><i class="fa fa-fw fa-square text-danger"></i>
                <strong>402</strong> Conversions</li>
              <li class="list-group-item"><i class="fa fa-fw fa-square text-muted"></i>
                <strong>15,120</strong> Pageviews</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="item col-md-4 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div id="chart_horizontal_bars" data-toggle="flot-chart-horizontal-bars" class="flotchart-holder height-200"></div>
        </div>
      </div>
    </div>
  </div>

  <h1 class="text-headline page-section-heading">Usuários</h1>
  <div class="row" data-toggle="isotope">
    <div class="item col-md-4 col-xs-12">
      <div class="panel panel-default">
        <div class="profile-block">
          <div class="cover overlay cover-image-full">
            <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'cover','alt'=>'cover']);  ?>

            <div class="overlay overlay-full overlay-bg-black">
              <div class="v-top v-spacing-2">
                <a href="#" class="icon pull-right">
                  <i class="fa fa-comment"></i>
                </a>
                <div class="text-headline text-overlay">Adrian Demian</div>
                <p class="text-overlay">User Interface Designer</p>
              </div>
              <div class="v-bottom">
                <a href="#">
                  <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle avatar width-40']);  ?>

                </a>
              </div>
            </div>
          </div>

          <div class="profile-icons">
            <span><i class="fa fa-users"></i> 372</span> <span><i class="fa fa-photo"></i> 43</span>
            <span><i class="fa fa-video-camera"></i> 3 </span>
          </div>
        </div>
      </div>

    </div>
    <div class="item col-md-4 col-sm-6 col-xs-12">
      <div class="panel panel-default widget-user-1 text-center">
        <div class="avatar">
          <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle width-120']);  ?>
          <h3>Adrian Demian</h3>
          <a href="#" class="btn btn-success">Following <i class="fa fa-check-circle fa-fw"></i></a>
        </div>
        <div class="profile-icons margin-none">
          <span><i class="fa fa-users"></i> 372</span>
          <span><i class="fa fa-photo"></i> 43</span>
          <span><i class="fa fa-video-camera"></i> 3</span>
        </div>
        <div class="panel-body">
          <div class="expandable expandable-indicator-white expandable-trigger">
            <div class="expandable-content">
              <p>Hi! I'm Adrian the Senior UI Designer at
                <strong>MOSAICPRO</strong>. We hope you enjoy the design and quality of Social.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut autem delectus dolorum necessitatibus neque odio quam quas qui quod soluta? Aliquid eius esse minima.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="item col-md-4 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="media">
            <div class="pull-left">
              <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'media-object img-circle']);  ?>
            </div>
            <div class="media-body">
              <h4 class="media-heading margin-v-5"><a href="#">Adrian D.</a></h4>
              <div class="profile-icons">
                <span><i class="fa fa-users"></i> 372</span>
                <span><i class="fa fa-photo"></i> 43</span>
                <span><i class="fa fa-video-camera"></i> 3</span>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-body">
          <p class="common-friends">Amigos em comum</p>
          <div class="user-friend-list">
            <a href="#">

              <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle width-100']);  ?>
            </a>
            <a href="#">
              <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle width-100']);  ?>
            </a>
            <a href="#">
              <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle width-100']);  ?>
            </a>
            <a href="#">
              <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'img-circle width-100']);  ?>
            </a>
          </div>
        </div>
        <div class="panel-footer">
          <a href="#" class="btn btn-default btn-sm">Follow <i class="fa fa-share"></i></a>
        </div>
      </div>
    </div>
    <div class="item col-md-4 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading panel-heading-gray">
          <div class="pull-right">
            <a href="#" class="btn btn-primary btn-xs">Add <i class="fa fa-plus"></i></a>
          </div>
          <i class="icon-user-1"></i> Friends
        </div>
        <div class="panel-body">
          <ul class="img-grid">
            <li>
              <a href="#">
                <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'']);  ?>

              </a>
            </li>
            <li>
              <a href="#">
                <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'','alt'=>'']);  ?>
              </a>
            </li>
            <li>
              <a href="#">
                <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'','alt'=>'']);  ?>
              </a>
            </li>
            <li>
              <a href="#">
                <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'','alt'=>'']);  ?>
              </a>
            </li>
            <li>
              <a href="#">
                <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'','alt'=>'']);  ?>
              </a>
            </li>
            <li class="clearfix">
              <a href="#">
                <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'','alt'=>'']);  ?>
              </a>
            </li>
            <li>
              <a href="#">
                <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'','alt'=>'']);  ?>
              </a>
            </li>
            <li>
              <a href="#">
                <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'','alt'=>'']);  ?>
              </a>
            </li>
            <li>
              <a href="#">
                <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'','alt'=>'']);  ?>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="item col-md-4 col-sm-6 col-xs-12">
      <!-- User Box -->
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="media user-box">
            <a class="media-left" href="#">
              <?=Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'media-object img-circle','alt'=>'']);  ?>
            </a>
            <div class="media-body">
              <h4 class="media-heading margin-v-5">Jonathan Smith</h4>
              <p class="text-uppercase text-muted">Works at Mosaicpro</p>
            </div>

            <div class="media-right">
              <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-envelope"></i></a>
            </div>

          </div>
        </div>
      </div>
      <!-- // User Box -->
    </div>
  </div>

  <h2 class="page-section-heading">Tables &amp; lists</h2>

  <div class="row" data-toggle="isotope">
    <div class="item col-md-6 col-sm-6 col-xs-12">
      <!-- Leaderboard -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">Top 5</h4>
        </div>
        <table class="table table-leaderboard margin-none">
          <tbody>
            <tr>
              <td width="20">1</td>
              <td><a href="#"><i class="fa fa-flag text-muted"></i> Jonathan Smith</a></td>
              <td><span class="pull-right">14,200</span></td>
            </tr>
            <tr>
              <td width="20">2</td>
              <td><a href="#">Michelle S.</a></td>
              <td><span class="pull-right">11,591</span></td>
            </tr>
            <tr>
              <td width="20">3</td>
              <td><a href="#">Anthony Smith</a></td>
              <td><span class="pull-right">10,232</span></td>
            </tr>
            <tr>
              <td width="20">4</td>
              <td><a href="#">First Smith</a></td>
              <td><span class="pull-right">9,002</span></td>
            </tr>
            <tr>
              <td width="20">5</td>
              <td><a href="#">Second Smith</a></td>
              <td><span class="pull-right">8,694</span></td>
            </tr>
          </tbody>
        </table>

        <div class="panel-footer padding-none">
          <div class="row">
            <div class="col-sm-6">
              <div class="score-block">
                <div class="title">Min</div>
                <div class="score">126</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="score-block">
                <div class="title">Max</div>
                <div class="score">11,421</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- // Leaderboard -->
    </div>
    <div class="item col-md-6 col-xs-12">
      <!-- Notifications -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="pull-right ">
            <a href="#" class="btn btn-default btn-xs"><i class="fa fa-cog"></i></a>
          </div>
          <h4 class="panel-title">Notifications</h4>
        </div>
        <ul class="notifications-timeline">
          <li>
            <span class="date">24 Aug</span>
            <span class="circle orange"></span>
            <span class="content"><a href="#">Jonathan</a> has a due payment of $299</span>
          </li>
          <li>
            <span class="date">13 Aug</span>
            <span class="circle blue"></span>
            <span class="content"><a href="#">Michelle</a> became a PRO Member.</span>
          </li>
          <li>
            <span class="date">10 Aug</span>
            <span class="circle gray-light"></span>
            <span class="content"><a href="#">Jonathan</a> has registered.</span>
          </li>
          <li>
            <span class="date">1 Aug</span>
            <span class="circle gray"></span>
            <span class="content">This is a basic text notification.</span>
          </li>
          <li>
            <span class="date">27 Jul</span>
            <span class="circle gray-light"></span>
            <span class="content"><a href="#">Jonathan</a> has a due payment of $299</span>
          </li>
        </ul>
      </div>
      <!-- // Notifications -->
    </div>
    <div class="item col-md-6 col-xs-12">
      <div class="panel panel-default">
        <table class="table table-striped margin-none">
          <thead>
            <tr>
              <th>Box office</th>
              <th class="text-right">Cash</th>
              <th class="text-right width-100">Trend</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <strong class="text-muted">1.</strong> <a href="#" class="text-primary">Frozen</a></td>
              <td class="text-right">&euro;8,718,939</td>
              <td class="text-right">
                <div class="sparkline-line width-100" sparkHeight="20" sparkWidth="100%" data-data="[ 484, 457, 397, 591, 496, 508, 366, 196 ]"></div>
              </td>
            </tr>
            <tr>
              <td>
                <strong class="text-muted">2.</strong> <a href="#" class="text-primary">The Hobbit 2</a></td>
              <td class="text-right">&euro;7,800,000</td>
              <td class="text-right">
                <div class="sparkline-line width-100" sparkHeight="20" sparkWidth="100%" data-data="[ 363, 371, 221, 258, 318, 582, 536, 312 ]"></div>
              </td>
            </tr>
            <tr>
              <td>
                <strong class="text-muted">3.</strong> <a href="#" class="text-primary">The Wolf of Wall</a></td>
              <td class="text-right">&euro;5,671,036</td>
              <td class="text-right">
                <div class="sparkline-line width-100" sparkHeight="20" sparkWidth="100%" data-data="[ 315, 568, 323, 517, 520, 368, 311, 284 ]"></div>
              </td>
            </tr>
            <tr>
              <td>
                <strong class="text-muted">4.</strong> <a href="#" class="text-primary">Iron Man 3</a></td>
              <td class="text-right">&euro;409,013,994</td>
              <td class="text-right">
                <div class="sparkline-line width-100" sparkHeight="20" sparkWidth="100%" data-data="[ 188, 522, 457, 246, 323, 456, 429, 478 ]"></div>
              </td>
            </tr>
            <tr>
              <td>
                <strong class="text-muted">5.</strong> <a href="#" class="text-primary">Catching Fire</a></td>
              <td class="text-right">&euro;398,327,026</td>
              <td class="text-right">
                <div class="sparkline-line width-100" sparkHeight="20" sparkWidth="100%" data-data="[ 366, 589, 556, 312, 361, 523, 281, 558 ]"></div>
              </td>
            </tr>
            <tr>
              <td>
                <strong class="text-muted">6.</strong> <a href="#" class="text-primary">Despicable Me</a></td>
              <td class="text-right">&euro;367,835,345</td>
              <td class="text-right">
                <div class="sparkline-line width-100" sparkHeight="20" sparkWidth="100%" data-data="[ 318, 586, 529, 298, 109, 436, 512, 184 ]"></div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="item col-sm-6 col-xs-12">
      <!-- Recent tickets -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">Recent Tickets</h4>
        </div>
        <ul class="list-group">
          <li class="list-group-item">
            <span class="label label-default">#8010</span> &nbsp;
            <div class="pull-right">
              <span class="text-muted  text-small">2 hrs ago</span>
            </div>
            <a href="#">How can I use UI Kit?</a>
          </li>
          <li class="list-group-item">
            <span class="label label-default">#8010</span> &nbsp;
            <div class="pull-right">
              <span class="text-muted  text-small">2 hrs ago</span>
            </div>

            <a href="#">How can I use UI Kit?</a>
          </li>
          <li class="list-group-item">
            <span class="label label-default">#8010</span> &nbsp;
            <div class="pull-right">
              <span class="text-muted  text-small">2 hrs ago</span>
            </div>

            <a href="#">How can I use UI Kit?</a>
          </li>
          <li class="list-group-item">
            <span class="label label-default">#8010</span> &nbsp;
            <div class="pull-right">
              <span class="text-muted  text-small">2 hrs ago</span>
            </div>

            <a href="#">How can I use UI Kit?</a>
          </li>
          <li class="list-group-item text-right">
            <a class="btn btn-sm btn-danger" href="#">Go to support <i class="fa fa-fw fa-arrow-right"></i></a>
          </li>
        </ul>
      </div>
      <!-- // Recent tickets -->
    </div>

  </div>
