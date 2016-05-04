<?php
namespace app\_adm\models;

use Yii;
use yii\base\Model;
use app\components\helpers\WidgeteffectsHelper;

/**
 *
 */
class WidgetJson extends  Model
{

  public $type = ''; //key slideshow
  public $icon = '';
  public $title = '';
  public $desc = '';


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'icon','title','desc'], 'required'],
        ];
    }

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


    // yii\helpers\FileHelper::findFiles('.',['only'=>['*.php','*.txt']]);
    public function savefile($widgeteffects){
      $jsonPath = Yii::getAlias('@app/temas/widgeteffects/widgeteffects.json');

      if(isset($widgeteffects[$this->type])){
        $this->addError(new WidgetJson, 'type', 'Este widget já existe no sistema');
        return false;
      }else{
        $widgeteffects[$this->type] = [
          "icon"=>$this->icon,
          "title"=>$this->title,
          "desc"=>$this->desc
        ];

        $filejson = json_encode($widgeteffects);

        return $this->WriteFileJson($jsonPath,$filejson);
      }


    }

    public function WriteFileJson($filepath, $data){

      $arquive = file_put_contents($filepath, $data, LOCK_EX);

      return $arquive;

    }
}

 ?>
