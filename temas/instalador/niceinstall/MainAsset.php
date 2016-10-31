<?php
namespace app\temas\instalador\niceinstall;
use yii\web\AssetBundle;
class MainAsset extends AssetBundle
{
    public $sourcePath = '@bower/';

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    public $jsOptions = array(
    'position' => \yii\web\View::POS_HEAD
);
}
