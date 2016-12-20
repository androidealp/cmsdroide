<?php
namespace app\temas\admin\admamormeu;
use yii\web\AssetBundle;
class MainAsset extends AssetBundle
{
  public $basePath = '@webroot/temas/';
  public $baseUrl = '@web/temas/';
    public $css = [
        //  'admamormeu/css/vendor/all.css',
        // 'admamormeu/css/app/app.css',
        // 'admamormeu/css/vendor/font-awesome-animation.min.css',
        // 'adm-common/css/custom.css',
        ];

    public $js = [
        //'admamormeu/js/vendor/all.js',
          // 'admamormeu/js/vendor/core/jquery-ui.custom.js',
          // 'admamormeu/js/vendor/core/bootstrap.js',
          // 'admamormeu/js/vendor/core/breakpoints.js',
          // 'admamormeu/js/vendor/core/jquery.nicescroll.js',
          // 'admamormeu/js/vendor/core/isotope.pkgd.js',
          // 'admamormeu/js/vendor/core/packery-mode.pkgd.js',
          // 'admamormeu/js/vendor/core/jquery.grid-a-licious.js',
          // 'admamormeu/js/vendor/core/jquery.cookie.js',
          // 'admamormeu/js/vendor/core/jquery.hotkeys.js',
          // 'admamormeu/js/vendor/core/handlebars.js',
          // 'admamormeu/js/vendor/core/jquery.hotkeys.js',
          // 'admamormeu/js/vendor/core/load_image.js',
          // 'admamormeu/js/vendor/core/jquery.debouncedresize.js',
          // 'admamormeu/js/vendor/tables/all.js',
          // 'admamormeu/js/vendor/media/all.js',
          // 'admamormeu/js/vendor/forms/all.js',
          // 'admamormeu/js/vendor/charts/all.js',
          // 'admamormeu/js/vendor/charts/flot/all.js',
          // 'admamormeu/js/vendor/charts/easy-pie/jquery.easypiechart.js',
          // 'admamormeu/js/vendor/charts/morris/all.js',
          // 'admamormeu/js/vendor/charts/sparkline/all.js',
          // 'admamormeu/js/vendor/tree/jquery.fancytree-all.js',
          // 'admamormeu/js/vendor/nestable/jquery.nestable.js',
          // 'admamormeu/js/vendor/charts/easy-pie/jquery.easypiechart.js',
          //alimino todos que nao estou usando acima

         // 'admamormeu/js/vendor/forms/checkbox/bootstrap-checkbox.min.js',
         // 'admamormeu/js/app/app.js',
         // 'adm-common/js/eModal.min.js',
         // 'adm-common/js/modal-custom.js',
         // 'adm-common/js/tools.js',
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
