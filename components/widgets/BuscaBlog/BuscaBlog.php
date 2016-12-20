<?php
namespace app\components\widgets\BuscaBlog;
use Yii;
use yii\base\Widget;
use \app\models\Busca;

class BuscaBlog extends Widget{

  public $layout = 'default';
  public $action = ['blog/index'];
  private $data = [];

  public function init(){
    parent::init();
  }

  public function run(){
    $model = new Busca();

  return $this->render($this->layout,[
      'model'=>$model,
      'action'=>$this->action
    ]);
  }
}
