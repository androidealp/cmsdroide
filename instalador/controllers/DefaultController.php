<?php

namespace app\instalador\controllers;
use \app\components\helpers\LayoutHelper;
use yii\web\Controller;
use app\instalador\models\Instalador;

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->layout = LayoutHelper::loadThemesJson()->instalador();
		$editavel =  LayoutHelper::CheckWritable('@app/config/db.php');
		$model = new Instalador;
		$retorno_save = 0;
		if($model->load(\Yii::$app->request->post())){
			$retorno_save = $model->instalar('@app/config/db.php',$editavel);
		}

		return $this->render('index',[
			'model'=>$model,
			'editavel'=>$editavel,
			'retorno_save'=>$retorno_save
		]);
	}



}
