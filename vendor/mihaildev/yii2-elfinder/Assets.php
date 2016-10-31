<<<<<<< HEAD
<?php

namespace mihaildev\elfinder;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class Assets extends AssetBundle
{
	public $css = array(
		'css/elfinder.min.css',
		'css/theme.css',
	);
	public $js = array(
		'js/elfinder.min.js'
	);
	public $depends = array(
		'yii\jui\JuiAsset',
	);

	public function init()
	{
		$this->sourcePath = __DIR__."/assets";
		parent::init();
	}

	/**
	 * @param string $lang
	 * @param \yii\web\View $view
	 */
	public static function addLangFile($lang, $view){
		$lang = ElFinder::getSupportedLanguage($lang);

		if ($lang !== false && $lang !== 'en'){
			list(,$path) = \Yii::$app->assetManager->publish(__DIR__."/assets");
			$view->registerJsFile($path.'/js/i18n/elfinder.' . $lang . '.js', ['depends' => [Assets::className()]]);
		}
	}

	/**
	 * @param \yii\web\View $view
	 */
	public static function noConflict($view){
		list(,$path) = \Yii::$app->assetManager->publish(__DIR__."/assets");
		$view->registerJsFile($path.'/js/no.conflict.js', ['depends' => [JqueryAsset::className()]]);
	}
}
=======
<?php

namespace mihaildev\elfinder;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class Assets extends AssetBundle
{
	public $sourcePath = '@vendor/studio-42/elfinder';

	public $publishOptions = [
        'except' => [
            'php/',
            'files/',
        ]
	];

	public $css = array(
		'css/elfinder.min.css',
		'css/theme.css',
	);
	public $js = array(
		'js/elfinder.min.js'
	);
	public $depends = array(
		'yii\jui\JuiAsset',
	);

	/**
	 * @param string $lang
	 * @param \yii\web\View $view
	 */
	public static function addLangFile($lang, $view){
		$lang = ElFinder::getSupportedLanguage($lang);

		if ($lang !== false && $lang !== 'en'){
			$view->registerJsFile(self::getPathUrl().'/js/i18n/elfinder.' . $lang . '.js', ['depends' => [Assets::className()]]);
		}
	}

    public static function getPathUrl(){
        return \Yii::$app->assetManager->getPublishedUrl("@vendor/studio-42/elfinder");
    }

    public static function getSoundPathUrl(){
        return self::getPathUrl()."/sounds/";
    }

	/**
	 * @param \yii\web\View $view
	 */
	public static function noConflict($view){
		list(,$path) = \Yii::$app->assetManager->publish(__DIR__."/assets");
		$view->registerJsFile($path.'/no.conflict.js', ['depends' => [JqueryAsset::className()]]);
	}
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
