<?php
namespace app\components\helpers;
use  app\components\helpers\LayoutHelper;
use \Yii;
class WidgeteffectsHelper {
  public static $urlBase = '@app/temas/widgeteffects/';
  public static $editavel = '';
  public static $Filedata = '';
  public static $listfiles = [];

  public function loadEffects($file = ''){

      $effectPath = Yii::getAlias(self::$urlBase.$file);
      $dataFile =Yii::$app->view->renderFile($effectPath);
      self::$editavel = LayoutHelper::CheckWritable($effectPath);
      self::$Filedata = json_decode($dataFile, true);
      return new WidgeteffectsHelper;
  }


  public function CheckEffect($name){
    $effectPath = Yii::getAlias(self::$urlBase.$name.'/');
    $json_existe = yii\helpers\FileHelper::findFiles($effectPath,['only'=>[$name.'.json']]);
    $editavel = LayoutHelper::CheckWritable($effectPath);
    $return_val = [];

    if(!count($json_existe)){
      $return_val[] = "O arquivo json {$name} não existe";
    }else{
      if(!$editavel){
        $return_val[] = "O arquivo json {$name} não é editável";
      }
    }

    return $return_val;

  }

  public function getWidget($widget, $key){
    $effect = WidgeteffectsHelper::loadEffects($widget.'.json');
    $return = false;
    if(isset(self::$Filedata[$key]['items'])){
      $return = self::$Filedata[$key]['items'];
    }

    return $return;

  }




}
