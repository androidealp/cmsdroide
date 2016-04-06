<?php
namespace app\temas\admin\purephoenix;
use yii\web\AssetBundle;
class LoginAsset extends AssetBundle
{
    public $sourcePath = '@bower/';
    public $css = [
         'admin-lte/dist/css/AdminLTE.css',
        'admin-lte/dist/css/font-aw-440/css/font-awesome.min.css',
        'admin-lte/dist/css/ionicons.min.css',
        'admin-lte/dist/css/skins/_all-skins.min.css'
        ];
    public $js = [
         'admin-lte/dist/js/app.js',
        'lt IE 9'=>'admin-lte/dist/js/ie9/html5shiv.min.js',
        'lt IE 9'=>'admin-lte/dist/js/ie9/respond.min.js',
        ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
