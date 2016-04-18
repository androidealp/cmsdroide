<?php
namespace app\components\helpers;
use  app\components\helpers\LayoutHelper;
class WidgeteffectsHelper {
  public static $urlBase = '@app/temas/frontend/';
  public static $editavel = '';
  public static $Filedata = '';

  public function loadEffects($url = ''){

      if($url) self::$urlBase = $url;

      $dataFile =$this->renderFile(self::$urlBase.'widgeteffects.json');
      self::$editavel =LayoutHelper::CheckWritable(self::$urlBase.'widgeteffects.json');
      self::$Filedata = json_decode($dataFile, true);

      return new WidgeteffectsHelper;
  }

}
