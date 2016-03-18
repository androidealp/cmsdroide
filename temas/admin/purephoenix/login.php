<?php
use yii\helpers\Html;
use app\temas\admin\purephoenix\LoginAsset;
//use app\temas\admin\purephoenix\AppAsset;
LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="<?= Yii::$app->charset ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  </head>
  <body class="login-page">
      <?php $this->beginBody() ?>
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>CMS</b>droide</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
         <?=$content ?>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>

