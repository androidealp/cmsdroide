<?php
namespace app\_adm\components\widgets\editor;
use yii\base\Widget;
use app\_adm\components\widgets\editor\EditorAssets;
use yii\helpers\BaseHtml;

class Editor extends Widget{

public $id;
public $model;
public $ajaxSave = true;

public function init(){

EditorAssets::register($this->view);

}

public function run(){

			$js ="
			 $(function () {

    			CKEDITOR.replace('{$this->id}');
  });
";

$this->getView()->registerJs($js, \yii\web\View::POS_END, 'editor');	

$options = [];

$options['id'] = $this->id;

if($this->ajaxSave){
	$options['data-ckecommand'] = 'CKEDITOR.instances.'.$this->id.'.getData()';
}


		return BaseHtml::activeTextarea($this->model,$this->id,$options);
	

}



}