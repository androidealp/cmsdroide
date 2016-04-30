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


    // yii\helpers\FileHelper::findFiles('.',['only'=>['*.php','*.txt']]);
    public function save($area,$theme, $file){
       $jsonPath = Yii::getAlias('@app/temas/themas.json');
      unset($file[$area][$theme]);

      $file[$this->area][$this->tema] = [
        "default"=>$this->default,
        "layout"=>$this->layout
      ];

      if($this->default){
        foreach ($file[$this->area] as $theme => $params) {
          if($theme != $this->tema){
            $file[$this->area][$theme]['default'] = 0;
          }
        }
      }

      $filejson = json_encode($file);

      return $this->WriteFileJson($jsonPath,$filejson);
    }

    public function WriteFileJson($filepath, $data){

      $arquive = file_put_contents($filepath, $data, LOCK_EX);

      return $arquive;

    }
}

 ?>
