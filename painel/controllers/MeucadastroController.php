<?php

namespace app\painel\controllers;
use Yii;
use app\components\helpers\ControllerHelper;
use app\painel\models\User;

class MeucadastroController extends ControllerHelper
{

    public function actionIndex()
    {
      \Yii::$app->view->title = 'Meu cadastro';
     \Yii::$app->view->params['title-page'] = 'Meu cadastro';
     \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Meu cadastro',]];
      $userId = \Yii::$app->user->identity->id;
      $model = User::findOne($userId);
      $cadastro = \app\painel\models\UserCadastro::find(['user_id'=>$userId])->one();
      $cadastro->scenario = \app\painel\models\UserCadastro::SCENARIO_EDITAR;
	    $model->scenario = \app\painel\models\User::SCENARIO_EDITAR;
	   if ($model->load(Yii::$app->request->post())){

         $session = Yii::$app->session;

         $session->addFlash('success','usuario editado com sucesso');
     }

        return $this->render('index',[
        	'model'=>$model,
         	'cadastro'=>$cadastro
        	]);
    }

     public function actionAjaxinsertsenha(){
     	$model = new User;
     	return  $this->renderAjax('partialviews/_ajaxsenhas',['model'=>$model]);
    }

}
