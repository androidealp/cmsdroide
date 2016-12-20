<?php

namespace app\temas\frontend\protheme;

use yii\web\AssetBundle;

/**
 * @author andre Luiz and4563@gmail.com
 */
class ProThemeAsset extends AssetBundle
{
    public $basePath = '@webroot/temas';
    public $baseUrl = '@web/temas';
    public $css = [
        //'protheme/css/vendor/all.css',
        'protheme/css/app/app.css',
        'protheme/css/app/colors-buttons.css',
        'protheme/css/app/colors-background.css',
        'protheme/css/vendor/bootstrap.css',
        'protheme/css/vendor/font-awesome.css',
        'protheme/css/plugins/toastr.min.css',
        'protheme/css/template.css',
    ];
    public $js = [
        'admtmpro/js/vendor/core/bootstrap.js',
        'admtmpro/js/vendor/core/jquery.nicescroll.js',
        'admtmpro/js/vendor/core/jquery.cookie.js',
        'protheme/js/app/app.js',
        'admtmpro/js/vendor/forms/all.js',
        'protheme/js/vendor/forms/bootstrap-datepicker.js',
        'admtmpro/js/vendor/core/breakpoints.js',
      //'protheme/js/app/main.js',
      'common/js/vue.min.js',
      //crid com effeito
      // 'protheme/js/vendor/core/jquery.grid-a-licious.js',
      'protheme/js/plugins/toastr.js',
      'protheme/js/plugins/eModal.min.js',
      'protheme/js/templates.js',

    ];
    public $depends = [
        //verifico se há a necessidade
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
