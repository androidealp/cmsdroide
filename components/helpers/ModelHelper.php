<?php
namespace app\components\helpers;
use Yii;
class ModelHelper extends \yii\db\ActiveRecord{


public function HtmlErros(){
$mderros = $this->getErrors();
$li = array();
foreach ($mderros as $k => $mderro) {
	foreach ($mderro as $c => $erro) {
		$li[] = $erro;
	}
}

$ul = \yii\helpers\BaseHtml::ul($li,[
	'class'=>'list-unstyled',
	'item'=>function($item, $index){
		return "<li><span class='label bg-yellow margin-right'><i class='fa fa-exclamation-triangle'></i></span> ".$item."</li>";
	}
	]);

return $ul;
}

public function ArrayErros(){

	$mderros = $this->getErrors();
	$lista = array();
	foreach ($mderros as $k => $mderro) {
		foreach ($mderro as $c => $erro) {
			$lista[] = $erro;
		}
	}
  return $lista;
}

}
