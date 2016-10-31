<<<<<<< HEAD
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
=======
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
      'js/custom.js',
      'js/droide-process.js'
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
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
