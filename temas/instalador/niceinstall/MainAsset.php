<?php
namespace app\temas\instalador\niceinstall;
use yii\web\AssetBundle;
class MainAsset extends AssetBundle
{
    //public $sourcePath = '@bower/';
    public $basePath = '@webroot/tema/niceinstall';
    public $baseUrl = '@web/temas/niceinstall';

    public $css = [
      'css/estilo.css',
    ];

    public $js = [
      'js/custom.js'
    ];


    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    public $jsOptions = [
      'position' => \yii\web\View::POS_HEAD
    ];
}
