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


	public function ajaxInstall($type){
		$editavel =  LayoutHelper::CheckWritable('@app/config/db.php');
			$model = new Instalador;

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

			switch ($type) {
				case 'configurar':
					$return = $model->aplicarbanco('@app/config/db.php');
					break;
				case 'instalar':
 				 $return = $model->SQLimport();
 				 break;
				default:
				$return = [
					'error'=>1,
					'msn'=>'Algum erro encontrado no processo',
				];
					break;
			}

		}


		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		return $return;

	}



}
