<<<<<<< HEAD:vendor/mihaildev/yii2-elfinder/LocalPath.php
<?php
/**
 * Date: 23.01.14
 * Time: 22:47
 */

namespace mihaildev\elfinder;

use Yii;

class LocalPath extends BasePath{
	public $path;

	public $baseUrl = '@web';

	public $basePath = '@webroot';

	public function getUrl(){
		return Yii::getAlias($this->baseUrl.'/'.trim($this->path,'/'));
	}

	public function getRealPath(){
		$path = Yii::getAlias($this->basePath.'/'.trim($this->path,'/'));

		if(!is_dir($path))
			mkdir($path, 0777, true);

		return $path;
	}

	public function getRoot(){

		$options = parent::getRoot();

		$options['path'] = $this->getRealPath();
		$options['URL'] = $this->getUrl();

		return $options;
	}
=======
<?php
/**
 * Date: 23.01.14
 * Time: 22:47
 */

namespace mihaildev\elfinder\volume;

use Yii;

class Local extends Base{
	public $path;

	public $baseUrl = '@web';

	public $basePath = '@webroot';

	public function getUrl(){
		return Yii::getAlias($this->baseUrl.'/'.trim($this->path,'/'));
	}

	public function getRealPath(){
		$path = Yii::getAlias($this->basePath.'/'.trim($this->path,'/'));

		if(!is_dir($path))
			mkdir($path, 0777, true);

		return $path;
	}

	protected function optionsModifier($options){

		$options['path'] = $this->getRealPath();
		$options['URL'] = $this->getUrl();

		return $options;
	}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535:vendor/mihaildev/yii2-elfinder/volume/Local.php
} 