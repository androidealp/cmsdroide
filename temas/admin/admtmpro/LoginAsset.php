<?php
namespace app\temas\admin\admtmpro;
use yii\web\AssetBundle;
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot/temas/';
    public $baseUrl = '@web/temas/';
    public $css = [
          'admtmpro/css/vendor/all.css',
         'admtmpro/css/app/app.css',
         'adm-common/css/custom.css',
        ];
    public $js = [
      //'admamormeu/js/vendor/all.js',
      //'admamormeu/js/app/app.js',

        ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
