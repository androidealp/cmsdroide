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
/**
 * Abre o ssiema
 * @author André Luiz Pereira <andre@next4.com.br>
 * @return string - retorna a pagina do sistema
 */
public function actionSistema(){

    \Yii::$app->view->title = "Gerenciar Sistema";
    \Yii::$app->view->params['title-page'] = 'Sistema';
    \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Gerenciar o sistema',]];

    return $this->render('sistema');
}

public function actionEditartema($area, $theme){
  $modeljson = new \app\_adm\models\ThemeJson();
  $layoutfile = \app\components\helpers\LayoutHelper::loadThemesJson()->getFile();
  if ($modeljson->load(Yii::$app->request->post())){
   $edit = $modeljson->edit($area, $theme, $layoutfile);
   \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $return = ['msn'=>[
     'message'=>'<pre>'.$edit.'</pre>'
     ],
     'type'=>[
     'type'=>'danger'
     ]];

     return $return;

  }else{

    $modeljson->open($area, $theme, $layoutfile);
    return $this->renderAjax('_tema_form',['modeljson'=>$modeljson]);
  }

}

}
