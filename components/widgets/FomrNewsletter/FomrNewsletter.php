<?php

namespace app\components\widgets\FomrNewsletter;
use Yii;
use yii\base\Widget;
use \app\models\Newsletter;

class FomrNewsletter extends Widget{

  public $layout = 'default';
  private $data = [];

  public function init(){
    parent::init();
  }

  public function run(){
    $model = new Newsletter();

    return $this->render($this->layout,[
      'model'=>$model
    ]);
  }
}
