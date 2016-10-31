<<<<<<< HEAD
<?php
/**
 * Date: 23.01.14
 * Time: 0:51
 */

namespace mihaildev\elfinder;


use yii\web\AssetBundle;

class AssetsCallBack extends AssetBundle{
	public $js = array(
		'js/elfinder.callback.js'
	);
	public $depends = array(
		'yii\web\JqueryAsset'
	);

	public function init()
	{
		$this->sourcePath = __DIR__."/assets";
		parent::init();
	}
=======
<?php
/**
 * Date: 23.01.14
 * Time: 0:51
 */

namespace mihaildev\elfinder;


use yii\web\AssetBundle;

class AssetsCallBack extends AssetBundle{
	public $js = array(
		'elfinder.callback.js'
	);
	public $depends = array(
		'yii\web\JqueryAsset'
	);

	public function init()
	{
		$this->sourcePath = __DIR__."/assets";
		parent::init();
	}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
} 