<?php

namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use app\components\helpers\WidgeteffectsHelper;


class WidgeteffectsController extends ControllerHelper
{

  public function actions()
  {
      return [
          'plugin' => [
              'class' => 'effectsplugins\slideshow',
          ],
      ];
  }

    public function actionIndex()
    {
      \Yii::$app->view->title = "WidgetEffects";
      \Yii::$app->view->params['title-page'] = 'WidgetEffects Manager';
      \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'WidgetEffects Manager',]];

        $effects = WidgeteffectsHelper::loadEffects('widgeteffects.json');
        return $this->render('index',[
          'effects'=>$effects
        ]);
    }


    public function actionEffect($type)
    {
      \Yii::$app->view->title = "SlideShow";
      \Yii::$app->view->params['title-page'] = 'SlideShow Manager';
      \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'SlideShow Manager',]];

      $effects = WidgeteffectsHelper::loadEffects($type.'/'.$type.'.json');

      $arrayEffect = $effects::$Filedata;

      $provider = new \yii\data\ArrayDataProvider([
              'allModels' => $arrayEffect,
              //'sort' =>['attributes' => ['ID', 'Description'],],
              'pagination' => ['pageSize' => 20]
              ]);

      return $this->render('plugins/slideshow',[
        'effects'=>$effects,
        'provider'=>$provider
      ]);
    }
}
