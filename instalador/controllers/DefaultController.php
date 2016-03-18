<?php

namespace app\instalador\controllers;
use \app\components\helpers\LayoutHelper;
use yii\web\Controller;

class DefaultController extends Controller
{
	public function actionIndex()
	{

		$this->layout = LayoutHelper::loadThemesJson()->instalador();
		return $this->render('index');
	}


	 public static function import($file = '')
	{
		$pdo = Yii::app()->db->pdoInstance;
		try 
		{ 
			if (file_exists($file)) 
			{
				$sqlStream = file_get_contents($file);
				$sqlStream = rtrim($sqlStream);
				$newStream = preg_replace_callback("/\((.*)\)/", create_function('$matches', 'return str_replace(";"," $$$ ",$matches[0]);'), $sqlStream); 
				$sqlArray = explode(";", $newStream); 
				foreach ($sqlArray as $value) 
				{ 
					if (!empty($value))
					{
						$sql = str_replace(" $$$ ", ";", $value) . ";";
						$pdo->exec($sql);
					} 
				} 
				//echo "succeed to import the sql data!";
				return true;
			} 
		} 
		catch (PDOException $e) 
		{ 
			echo $e->getMessage();
			exit; 
		}
	}
}
