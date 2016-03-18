<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\_adm\components\widgets\notify;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class NotifyAssets extends AssetBundle
{
    public $sourcePath = '@app/_adm/components/widgets/notify/';
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    /*public $css = [
        'css/site.css',
    ];*/
    public $js = [
        'notify-doc/bootstrap-notify.min.js'
    ];
}
