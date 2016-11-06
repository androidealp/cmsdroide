<?php

namespace app\components\widgets\widgeteffect\assets;

use yii\web\AssetBundle;
class ParallaxAssets extends AssetBundle
{
  public $sourcePath = '@app/components/widgets/widgeteffect/assets/parallax/';
  //public $basePath = '@webroot/temas/amormeu/parallax/';
  //public $baseUrl = '@web/temas/amormeu/parallax/';

  public $js = [
       'js/parallax.js',
  ];
  //
  public $jsOptions = ['position' => \yii\web\View::POS_END];

}
