<?php

namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use Yii;

class ConfmanagerController extends ControllerHelper{

public function actionIndex(){

    \Yii::$app->view->title = "Configurações";
    \Yii::$app->view->params['title-page'] = 'Configurações';
    \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Configurações',]];

	return $this->render('index');
}

public function actionTemas(){

     \Yii::$app->view->title = "Gerenciar Temas";
    \Yii::$app->view->params['title-page'] = 'Temas';
    \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Temas',]];

    //pego o arquio de layout
    $jsonfileLayout = \app\components\helpers\LayoutHelper::loadThemesJson();

    $modeljson = New \app\_adm\models\ThemeJson();


    return $this->render('temas',[
        'jsonfileLayout'=>$jsonfileLayout,
        'modeljson'=>$modeljson
    ]);

}

public function actionSistema(){

    \Yii::$app->view->title = "Gerenciar Sistema";
    \Yii::$app->view->params['title-page'] = 'Sistema';
    \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Gerenciar o sistema',]];

    return $this->render('sistema');
}

}
