<?php

namespace app\painel\controllers;
use Yii;
use app\components\helpers\ControllerHelper;
use app\models\LpusSearch;
use app\models\Lpus;

class MeuscontratosController extends ControllerHelper
{

    public function actionIndex()
    {
      \Yii::$app->view->title = 'Meus contratos';
     \Yii::$app->view->params['title-page'] = 'Meus contratos';
     \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Meus contratos',]];

     $model = new LpusSearch;

     $dataProvider = $model->searchMeusContratos(Yii::$app->request->queryParams);

        return $this->render('index',[
          'dataProvider'=>$dataProvider,
           'model'=>$model          
        ]);
    }

}
