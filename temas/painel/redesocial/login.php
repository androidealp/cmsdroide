<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
// use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
// use yii\widgets\Breadcrumbs;
use app\temas\frontend\amormeu\AmorMeuAsset;
  AmorMeuAsset::register($this);
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
  <!-- extra div for emulating position:fixed of the menu -->
   <?=$content?>
  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
