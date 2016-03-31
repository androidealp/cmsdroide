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


	public function actionAjaxinstall($type){
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

			switch ($type) {
				case 'configurar':
				//	$return = $model->aplicarbanco('@app/config/db.php');
				$return =[
								'error'=>0,
								'msn'=>'Ok Configuracão',
							];
					break;
				case 'instalar':
 				 //$return = $model->SQLimport();
				 $return =[
 								'error'=>0,
 								'msn'=>'Ok instalar',
 							];
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
