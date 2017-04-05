<?php
namespace app\temas\admin\gentelella;
use yii\web\AssetBundle;
class LoginAssets extends AssetBundle
{
    public $basePath = '@webroot/temas/';
    public $baseUrl = '@web/temas/';
    public $css = [
         //'gentelella/vendors/bootstrap/dist/css/bootstrap.min.css',
         'gentelella/vendors/font-awesome/css/font-awesome.min.css',
         'gentelella/vendors/nprogress/nprogress.css',
         'gentelella/vendors/animate.css/animate.min.css',
         'gentelella/assets/css/custom.min.css',
         //'adm-common/css/custom.css',
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