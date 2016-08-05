<?php

namespace app\temas\frontend\bootstrapdroide;

use yii\web\AssetBundle;

/**
 * @author andre Luiz and4563@gmail.com
 */
class DroideAsset extends AssetBundle
{
    public $basePath = '@webroot/temas';
    public $baseUrl = '@web/temas';
    public $css = [
        'bootstrapdroide/css/template.css',
    ];
    public $js = [
      'common/js/vue.min.js',
      'bootstrapdroide/js/template.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
