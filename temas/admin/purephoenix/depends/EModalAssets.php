<?php 
namespace app\temas\admin\purephoenix\depends;
use yii\web\AssetBundle;
class EModalAssets extends AssetBundle{

	public $basePath = '@webroot';
    public $baseUrl = '@web';
	public $css = [];
    public $js = [
    	'temas/purephoenix/js/eModal.min.js',
    	'temas/purephoenix/js/modal-custom.js'
    ];

}