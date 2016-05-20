<?php

namespace app\painel;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\painel\controllers';

    public function init()
    {
      $this->defaultRoute = 'meucadastro';

      \Yii::$app->setComponents(
     [
         'errorHandler'=>[
             'errorAction'=>'institucional/erro',
             'class'=>'yii\web\ErrorHandler',
         ],
         'user' => [
             'class' => 'yii\web\User',
             'identityClass' => 'app\painel\models\User',
             'loginUrl' => \Yii::$app->urlManager->createUrl(['institucional/login']),
         ],
     ]
   );

        parent::init();

        // custom initialization code goes here
    }
}
