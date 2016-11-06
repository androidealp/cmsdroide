<?php

namespace app\_adm\controllers;
use Yii;
use app\_adm\components\helpers\ControllerHelper;
use app\_adm\models\LoginForm;

class PainelController extends ControllerHelper
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionErro(){

        $this->render('error');
    }

    public function actionLogin(){
        //$md_ip = new Ips();

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //register ip pos login
           // $md_ip->register_ip();

            return $this->redirect(['/_adm/painel']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }

    }

    public function actionLogout(){

        Yii::$app->user->logout();
        return $this->goHome();
    }
}
