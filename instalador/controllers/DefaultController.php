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

		return $this->render('index',[
			'model'=>$model,
			'editavel'=>$editavel,
			'retorno_save'=>$retorno_save
		]);
	}


	public function actionAjaxinstall(){
		$editavel =  LayoutHelper::CheckWritable('@app/config/db.php');
			$model = new Instalador;
			sleep(3);
		$return = [
			'error'=>1,
			'msn'=>'dados inconsistentes',
		];

		if(!$editavel){
			$return = [
				'error'=>1,
				'msn'=>'O arquivo Não é editável',

			];
		}

		if($editavel && $model->load(\Yii::$app->request->post())){

			$return = $model->instalar('@app/config/db.php');


		}


		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		return $return;

	}



}
