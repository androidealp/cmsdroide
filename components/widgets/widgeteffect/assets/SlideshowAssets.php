<?php
namespace app\components\widgets\widgeteffect\assets;

use yii\web\AssetBundle;

class SlideshowAssets extends AssetBundle
{
    public $sourcePath = '@app/components/widgets/widgeteffect/assets/slideshow/';
    // public $basePath = '@webroot/temas/amormeu/owl-carousel/';
    // public $baseUrl = '@web/temas/amormeu/owl-carousel/';
    public $css = [
        'css/owl.carousel.css',
        'css/owl.theme.css',
    ];
    public $js = [
         'js/owl.carousel.min.js',
         'js/slideshow.js',
    ];
    //
    public $jsOptions = ['position' => \yii\web\View::POS_END];
}
