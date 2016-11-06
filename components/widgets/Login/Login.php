<?php

namespace app\components\widgets\Login;
use yii\base\Widget;

class Login extends Widget{

  public $layout = 'default';
  public $model = '';


  public function run()
  {
    $model = new \app\painel\models\LoginForm;

    if($this->model){
      $model = $this->model;
      //

    }

    return  $this->render($this->layout,[
        'model'=>$model
      ]);
  }




}
