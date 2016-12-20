<?php
namespace app\_adm\components\widgets\menu;
use yii\base\Widget;

use Yii;

class Menu extends Widget{

  public $datamenu = [];

  public $layout = 'default';

  public function init(){

  }


  public function run(){

    return $this->render($this->layout,[
      'datamenu'=>$this->datamenu
    ]);

  }

}
