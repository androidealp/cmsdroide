<?php
namespace app\components\helpers;
use  app\components\helpers\LayoutHelper;
use \Yii;
class WidgeteffectsHelper {
  public static $urlBase = '@app/temas/widgeteffects/';
  public static $editavel = '';
  public static $Filedata = '';
  public static $listfiles = [];

  public function loadEffects($url = ''){

      if($url) self::$urlBase = $url;

      $themesPath = Yii::getAlias(self::$urlBase);

      $results = scandir($themesPath);

      $list = [];

      foreach ($results as $result) {
          if ($result === '.' || $result === '..') {
              continue;
          }

          $list[] = [
            'editavel'=> LayoutHelper::CheckWritable(self::$urlBase.$result),
            'file'=>$result,

          ];
      }

      

      self::$listfiles = $list;

      return new WidgeteffectsHelper;
  }

  public function getFile(){
    $dataFile =$this->renderFile(self::$urlBase.'widgeteffects.json');
    self::$editavel =LayoutHelper::CheckWritable(self::$urlBase.'widgeteffects.json');
    self::$Filedata = json_decode($dataFile, true);

    return new WidgeteffectsHelper;
  }




}
