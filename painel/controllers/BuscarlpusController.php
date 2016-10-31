<?php

namespace app\painel\controllers;
use Yii;
use app\components\helpers\ControllerHelper;
use app\models\LpusSearch;
use app\models\Lpus;
use app\models\Estados;
use yii\helpers\ArrayHelper;
class BuscarlpusController extends ControllerHelper
{

    public function actionIndex()
    {
      \Yii::$app->view->title = 'Buscar LPUS';
     \Yii::$app->view->params['title-page'] = 'Buscar LPUS';
     \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Buscar LPUS',]];


     $model = new LpusSearch;


     $dataProvider = $model->searchPrestadorLPU(\Yii::$app->request->queryParams);


        return $this->render('index',[
          'dataProvider'=>$dataProvider,
          'model' => $model
        ]);
    }

    public function actionDetalhes($id)
    {
      \Yii::$app->view->title = 'Buscar LPUS';
     \Yii::$app->view->params['title-page'] = 'Buscar LPUS';
     \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Buscar LPUS',]];


     $model = Lpus::find(['id'=>$id])->with('enderecos')->one();
     $enderecosbd = $model->enderecos;

        return $this->render('detalhes',[
          'model'=>$model,
          '$enderecosbd'=>$enderecosbd
        ]);
    }

}
