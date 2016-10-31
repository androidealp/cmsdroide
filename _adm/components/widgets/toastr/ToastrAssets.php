<<<<<<< HEAD:temas/frontend/bootstrapdroide/AppAsset.php
<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}


=======
<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\_adm\components\widgets\toastr;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ToastrAssets extends AssetBundle
{
    public $sourcePath = '@app/_adm/components/widgets/toastr/';
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'toastr.min.css',
    ];
    public $js = [
        'assets/toastr.js'
    ];
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535:_adm/components/widgets/toastr/ToastrAssets.php
