<?php
namespace app\temas\admin\gentelella;
use yii\web\AssetBundle;
class MainAssets extends AssetBundle
{
    public $basePath = '@webroot/temas/';
    public $baseUrl = '@web/temas/';
    public $css = [
         //'gentelella/vendors/bootstrap/dist/css/bootstrap.min.css',
         'gentelella/vendors/font-awesome/css/font-awesome.min.css',
         'gentelella/vendors/nprogress/nprogress.css',
         'gentelella/vendors/iCheck/skins/flat/green.css',
         'gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
         'gentelella/vendors/jqvmap/dist/jqvmap.min.css',
         'gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css',
         //'gentelella/vendors/animate.css/animate.min.css',
         'gentelella/assets/css/custom.min.css',
         'adm-common/css/custom.css',
        ];
    public $js = [
        'gentelella/vendors/fastclick/lib/fastclick.js',
        'gentelella/vendors/nprogress/nprogress.js',
        'gentelella/vendors/Chart.js/dist/Chart.min.js',
        'gentelella/vendors/gauge.js/dist/gauge.min.js',
        'gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js',
        'gentelella/vendors/iCheck/icheck.min.js',
        'gentelella/vendors/skycons/skycons.js',
        'gentelella/vendors/Flot/jquery.flot.js',
        'gentelella/vendors/Flot/jquery.flot.pie.js',
        'gentelella/vendors/Flot/jquery.flot.time.js',
        'gentelella/vendors/Flot/jquery.flot.stack.js',
        'gentelella/vendors/Flot/jquery.flot.resize.js',
        'gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js',
        'gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js',
        'gentelella/vendors/flot.curvedlines/curvedLines.js',
        'gentelella/vendors/DateJS/build/date.js',
        'gentelella/vendors/jqvmap/dist/jquery.vmap.js',
        'gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js',
        'gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js',
        'gentelella/vendors/moment/min/moment.min.js',
        'gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js',
        'gentelella/assets/js/custom.min.js',

      //'admamormeu/js/vendor/all.js',
      //'admamormeu/js/app/app.js',

        ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}