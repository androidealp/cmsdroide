<?php

namespace app\temas\frontend\bootstrapdroide;

use yii\web\AssetBundle;

/**
 * @author andre Luiz and4563@gmail.com
 */
class DroideAsset extends AssetBundle
{
    public $basePath = '@webroot/temas/bootstrapdroide';
    public $baseUrl = '@web/temas/bootstrapdroide';
    public $css = [
        'css/template.css',
    ];
    public $js = [
      'js/template.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
