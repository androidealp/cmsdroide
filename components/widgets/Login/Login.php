<?php

namespace app\components\widgets\Login;
use yii\base\Widget;

class Login extends Widget{

  public $layout = 'default';
  public $model = '';
  public $enable = 1;


  public function init(){



    parent::init();
  }

  public function run()
  {
    $model = new \app\painel\models\LoginForm;

    if($this->model){
      $model = $this->model;
    }

    if($this->enable == 0){
      return '';
    }else{
      // echo $this->enable;
      return  $this->render($this->layout,[
        'model'=>$model,
        ]);
    }
  }
}
