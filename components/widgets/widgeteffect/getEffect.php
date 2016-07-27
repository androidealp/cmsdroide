<?php
namespace app\components\widgets\widgeteffect;
use app\components\helpers\WidgeteffectsHelper;
use yii\base\Widget;
use yii\helpers\Html;

class getEffect extends Widget
{
  public $layout = 'home-slide';
  public $tipo = '';
  public $chave = '';
  private $data = [];

  public function init(){

    $this->data = WidgeteffectsHelper::getWidget($this->tipo, $this->chave);

  }

  public function run(){

  echo $this->render($this->layout,[
      'items'=>$this->data
    ]);
  }
}

 ?>
