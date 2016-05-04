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

    public function actionAjaxcriareffect(){

      $modeljson = new \app\_adm\models\WidgetJson();

        if ($modeljson->load(\Yii::$app->request->post())){

          \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

          $effects = WidgeteffectsHelper::loadEffects('widgeteffects.json');
          $edit = $modeljson->savefile($effects);

           if($edit){
             $return = ['msn'=>[
                 'message'=>'Um novo widget foi adicionado '.$edit.' bytes'
                 ],
                 'type'=>[
                     'type'=>'success'
                 ]];
           }else{
               $return = ['msn'=>[
                'message'=>'Não foi possivel salvar por algum erro inesperado.'.$modeljson->HtmlErros()
                ],
                'type'=>[
                'type'=>'danger'
                ]];
           }

           return $return;

        }else{

          return $this->renderAjax('_criareffect',[
            'modeljson'=>$modeljson
          ]);
        }

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
