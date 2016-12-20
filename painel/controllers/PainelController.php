<?php
namespace app\painel\controllers;
use Yii;
use app\painel\components\helpers\ControllerHelper;
use app\painel\models\User;

class PainelController extends ControllerHelper
{


    public function actionIndex()
    {
      

        return $this->render('index',[
        	
        	]);
    }


    public function actionLogin()
    {
      $this->layout = '@app/temas/painel/redesocial/login';

      return $this->render('login');
    }

 

}
