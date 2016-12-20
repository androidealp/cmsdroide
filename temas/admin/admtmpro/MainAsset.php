<?php
namespace app\temas\admin\admtmpro;
use yii\web\AssetBundle;
class MainAsset extends AssetBundle
{
  public $basePath = '@webroot/temas/';
  public $baseUrl = '@web/temas/';
    public $css = [
         'admtmpro/css/vendor/all.css',
        'admtmpro/css/app/app.css',
        'admtmpro/css/vendor/font-awesome-animation.min.css',
        'adm-common/css/custom.css',
        ];

    public $js = [
        //'admtmpro/js/vendor/all.js',
        'admtmpro/js/vendor/core/jquery-ui.custom.js',
          'admtmpro/js/vendor/core/bootstrap.js',
          'admtmpro/js/vendor/core/breakpoints.js',
          'admtmpro/js/vendor/core/jquery.nicescroll.js',
          'admtmpro/js/vendor/core/isotope.pkgd.js',
          'admtmpro/js/vendor/core/packery-mode.pkgd.js',
          'admtmpro/js/vendor/core/jquery.grid-a-licious.js',
          'admtmpro/js/vendor/core/jquery.cookie.js',
          'admtmpro/js/vendor/core/jquery.hotkeys.js',
          'admtmpro/js/vendor/core/handlebars.js',
          'admtmpro/js/vendor/core/jquery.hotkeys.js',
          'admtmpro/js/vendor/core/load_image.js',
          'admtmpro/js/vendor/core/jquery.debouncedresize.js',
          'admtmpro/js/vendor/tables/all.js',
          'admtmpro/js/vendor/media/all.js',
          'admtmpro/js/vendor/forms/all.js',
          'admtmpro/js/vendor/charts/all.js',
          'admtmpro/js/vendor/charts/flot/all.js',
          'admtmpro/js/vendor/charts/easy-pie/jquery.easypiechart.js',
          'admtmpro/js/vendor/charts/morris/all.js',
          'admtmpro/js/vendor/charts/sparkline/all.js',
          'admtmpro/js/vendor/tree/jquery.fancytree-all.js',
          'admtmpro/js/vendor/nestable/jquery.nestable.js',
          'admtmpro/js/vendor/charts/easy-pie/jquery.easypiechart.js',
          //alimino todos que nao estou usando acima

         'admtmpro/js/vendor/forms/checkbox/bootstrap-checkbox.min.js',
         'admtmpro/js/app/app.js',
         'adm-common/js/eModal.min.js',
         'adm-common/js/modal-custom.js',
         'adm-common/js/tools.js',
        ];

    //public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
        //'app\temas\admin\purephoenix\depends\EModalAssets',
        //'app\temas\admin\purephoenix\depends\CustomAssets',
    ];
}
