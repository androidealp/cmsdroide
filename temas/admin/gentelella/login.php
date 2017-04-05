<?php
use yii\helpers\Html;
use app\temas\admin\gentelella\LoginAssets;
LoginAssets::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="<?= Yii::$app->charset ?>">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?= Html::csrfMetaTags() ?>
    <title><?=(isset($this->title))?Html::encode($this->title):\Yii::$app->getModule('_adm')->params['title-page'] ?> </title>
    <?php $this->head() ?>
  </head>
  <body class="login">
      <?php $this->beginBody() ?>
      <div>

        

        <?=$content ?>
   
          <!-- containt -->
      </div>

    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>