<?php
use yii\helpers\Html;
use app\temas\instalador\niceinstall\MainAsset;
//use app\temas\admin\purephoenix\AppAsset;
MainAsset::register($this);
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
  <body class="install-page">
      <?php $this->beginBody() ?>
    
      <div class="box-body">
         <?=$content ?>

      </div><!-- /.login-box-body -->
   
    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>

