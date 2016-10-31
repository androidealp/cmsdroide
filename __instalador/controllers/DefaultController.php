<<<<<<< HEAD
<?php

namespace app\instalador\controllers;
use \app\components\helpers\LayoutHelper;
use yii\web\Controller;
use app\instalador\models\Instalador;

class DefaultController extends Controller
{

	public function beforeAction($action) {
    \Yii::$app->controller->enableCsrfValidation = false;
    return parent::beforeAction($action);
}

	public function actionIndex()
	{
		$this->layout = LayoutHelper::loadThemesJson()->instalador();
		$model = new Instalador();
		$editavel = array();
		$editavel['bd'] =  LayoutHelper::CheckWritable($model->db_file);
		$editavel['parans'] =  LayoutHelper::CheckWritable($model->parans_file);

		$retorno_save = 0;

		return $this->render('index',[
			'model'=>$model,
			'editavel'=>$editavel,
			'retorno_save'=>$retorno_save
		]);
	}

	public function actionInstallbd($error=1)
	{
		$this->layout = LayoutHelper::loadThemesJson()->instalador();
		$msn = [
			'error'=>1,
			'msn'=>'Ocorreu um erro no processo de geração de arquivos, verifique se são editáveis'
		];
		if(!$error){
				$model = new Instalador;
				$msn = $model->instalar();
		}

		return $this->render('installdb',[
			'msn'=>$msn,
		]);
	}


	public function actionAjaxinstallfiles(){
		$model = new Instalador;
		$editavel['bd'] =  LayoutHelper::CheckWritable($model->db_file);
		$editavel['parans'] =  LayoutHelper::CheckWritable($model->parans_file);

		$return = [
			'error'=>1,
			'msn'=>'Dados inconsistentes',
		];
		$editavelbol = 1;
		if(!$editavel['bd'] || !$editavel['bd']){
			$editavelbol = 0;
			$return = [
				'error'=>1,
				'msn'=>'O arquivo não é editável',

			];
		}

		if($editavelbol && $model->load(\Yii::$app->request->post())){

				 $return = $model->aplicarRegras();
				// $return = [
				// 	'error'=>0,
				// 	'msn'=>'Dados retornados '.print_r($model->attributes,true).' --- '.print_r(\Yii::$app->request->post(),true),
				// ];
		}

		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		return $return;

	}



}
=======
<?php

namespace app\instalador\controllers;
use \app\components\helpers\LayoutHelper;
use yii\web\Controller;
use app\instalador\models\Instalador;

class DefaultController extends Controller
{

	public function beforeAction($action) {
    \Yii::$app->controller->enableCsrfValidation = false;
    return parent::beforeAction($action);
}

	public function actionIndex()
	{
		$this->layout = LayoutHelper::loadThemesJson()->instalador();
		$model = new Instalador();
		$editavel = array();
		$editavel['bd'] =  LayoutHelper::CheckWritable($model->db_file);
		$editavel['parans'] =  LayoutHelper::CheckWritable($model->parans_file);

		$retorno_save = 0;

		return $this->render('index',[
			'model'=>$model,
			'editavel'=>$editavel,
			'retorno_save'=>$retorno_save
		]);
	}

	public function actionInstallbd($error=1)
	{
		$this->layout = LayoutHelper::loadThemesJson()->instalador();
		$msn = [
			'error'=>1,
			'msn'=>'Ocorreu um erro no processo de geração de arquivos, verifique se são editáveis'
		];
		if(!$error){
				$model = new Instalador;
				$msn = $model->instalar();
		}

		return $this->render('installdb',[
			'msn'=>$msn,
		]);
	}

	public function actionInitInstall()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		sleep(1);
		$model = new Instalador;

		$ck_proc = $model->checkProc();
		$return = [
			'json'=>['process'=>10, 'text'=>'Erro dados incompletos'],
			'getData'=>[
				'stopExec'=>1
			]
		];

		$ck_parans = LayoutHelper::CheckWritable($model->parans_file);
		$erroEscrita  = $model->ckFile();

		if($erroEscrita)
		{
			$return['json']['text'] = $erroEscrita;
		}

		if(!$erroEscrita && $ck_proc == 'files')
		{
			$return =  $this->installFiles($model, $return);
		}

		if(!$erroEscrita && $ck_proc == 'bd')
		{
			$return = $this->installBD($model, $return);
		}

		return $return;

	}

	private function installBD($model, $return)
	{
		
		$ret_banco = $model->instalar();

			$return['json']['process'] = $ret_banco['porcentagem'];
			$return['json']['text'] = $ret_banco['msn'];
			$return['getData']['stopExec'] = 1;

		return $return;
	}

	private function installFiles($model, $return)
	{

		$files = $model->aplicarRegras();

		$return['json']['process'] = ($files['error'])?27:50;
		$return['json']['text'] = $files['msn'];

		$return['getData']['stopExec'] = ($files['error'])?1:0;
		$return['getData']['bd'] = 'bd';

		return $return;
	}


	public function actionAjaxinstallfiles(){
		$model = new Instalador;
		$editavel['bd'] =  LayoutHelper::CheckWritable($model->db_file);
		$editavel['parans'] =  LayoutHelper::CheckWritable($model->parans_file);

		$return = [
			'error'=>1,
			'msn'=>'Dados inconsistentes',
		];
		$editavelbol = 1;
		if(!$editavel['bd'] || !$editavel['bd']){
			$editavelbol = 0;
			$return = [
				'error'=>1,
				'msn'=>'O arquivo não é editável',

			];
		}

		if($editavelbol && $model->load(\Yii::$app->request->post())){

				 $return = $model->aplicarRegras();
				// $return = [
				// 	'error'=>0,
				// 	'msn'=>'Dados retornados '.print_r($model->attributes,true).' --- '.print_r(\Yii::$app->request->post(),true),
				// ];
		}

		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		return $return;

	}



}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
