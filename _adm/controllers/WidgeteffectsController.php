<?php

namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use app\components\helpers\WidgeteffectsHelper;

class WidgeteffectsController extends ControllerHelper
{

    public function actionIndex()
    {
      \Yii::$app->view->title = "WidgetEffects";
      \Yii::$app->view->params['title-page'] = 'WidgetEffects Manager';
      \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'WidgetEffects Manager',]];

        $effects = WidgeteffectsHelper::loadEffects();
        return $this->render('index',[
          'effects'=>$effects
        ]);
    }
}
