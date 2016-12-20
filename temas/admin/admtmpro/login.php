<?php
use yii\helpers\Html;
use app\temas\admin\admtmpro\LoginAsset;
LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="login">
  <head>
      <meta charset="<?= Yii::$app->charset ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
    <?= Html::csrfMetaTags() ?>
    <title><?=(isset($this->title))?Html::encode($this->title):\Yii::$app->getModule('_adm')->params['title-page'] ?> </title>
    <?php $this->head() ?>
  </head>
  <body class="login-page">
      <?php $this->beginBody() ?>
      <div class="container-fluid">

        <div class="brand-logo">
          <?=Html::img(\Yii::$app->getModule('_adm')->params['logo'], ['style'=>'width:160px;']);  ?>
        </div>
        <div class="row">

          <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-default">
              <?=$content ?>
            </div>
          </div>
          <!-- containt -->
        </div>

      </div>
    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>
