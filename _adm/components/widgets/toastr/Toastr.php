<?php
namespace app\_adm\components\widgets\toastr;
use yii\base\Widget;
use app\_adm\components\widgets\toastr\ToastrAssets;
use Yii;

class Toastr extends Widget{

  private $session = [];

  public function init(){

  $this->session = Yii::$app->session;

    ToastrAssets::register($this->view);

  }


  public function run(){
  	if($this->session->hasFlash('alert')){
  		$toastr = $this->session->getFlash('alert',0);
      $type = $toastr['type'];
      $msn = $toastr['msn'];
  		if($toastr){

  			$js =<<<HTML
  			$(document).ready(function(){
  				 toastr["$type"]("$msn")
  			});
HTML;

  			return \Yii::$app->view->registerJs($js, \yii\web\View::POS_END, 'toastr');
  		}

  	}

  }

}
