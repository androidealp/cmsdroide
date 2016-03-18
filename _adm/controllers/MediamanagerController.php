<?php

namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use Yii;

class MediamanagerController extends ControllerHelper{

public function actionIndex(){

    \Yii::$app->view->title = "Gerenciador de Mídias";
    \Yii::$app->view->params['title-page'] = 'Gerenciador de Mídias';
    \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Gerenciador de Mídias',]]; 

	return $this->render('index');
}

}