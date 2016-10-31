<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\_adm\components\widgets\editor;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class EditorAssets extends AssetBundle
{
    public $sourcePath = '@app/_adm/components/widgets/editor/ckeditor';
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    /*public $css = [
        'css/site.css',
    ];*/
    public $js = [
        'ckeditor.js'
    ];
}
