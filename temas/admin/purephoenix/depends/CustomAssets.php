<?php
namespace app\temas\admin\purephoenix\depends;
use yii\web\AssetBundle;
class CustomAssets extends AssetBundle{

	public $basePath = '@webroot';
    public $baseUrl = '@web';
	public $css = [
	'temas/purephoenix/css/custom.css',
	'temas/purephoenix/font/font-awesome/css/font-awesome.min.css',
	];
    public $js = [
			'temas/common/js/custom.js'
    ];

}
