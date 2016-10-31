<?php
namespace app\_adm\components\widgets\notify;
use yii\base\Widget;
use app\_adm\components\widgets\notify\NotifyAssets;
use Yii;


class Notify extends Widget{

private $session = [];


public function init(){

$this->session = Yii::$app->session;

NotifyAssets::register($this->view);

}

public function run(){
	if($this->session->hasFlash('notify')){
		$notify = $this->session->getFlash('notify',0);
		if($notify){
			$notfjs = json_encode($notify);
			$js =<<<HTML
			$(document).ready(function(){
				$.notify({$notfjs});
			});
HTML;

			return \Yii::$app->view->registerJs($js, \yii\web\View::POS_END, 'notify');	
		}

	}

}

/*
types

$.notify({
	icon: 'glyphicon glyphicon-star',
	title: "Welcome:",
	message: "Everyone loves font icons! Use them in your notification!"
},{
	type: 'danger' // warning | success
	delay: 5000,
	template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
		'<span data-notify="title">{1}</span>' +
		'<span data-notify="message">{2}</span>' +
	'</div>'
});
*/

}
