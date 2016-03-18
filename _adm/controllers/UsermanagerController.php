<?php
namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use app\_adm\models\AdmUserSearch;
use app\painel\models\UserSearch;
use Yii;
// use yii\data\ActiveDataProvider;

class UsermanagerController extends ControllerHelper
{


    public function actionAdmins()
    {
        /*INIT: Define atributos da pagina*/
       \Yii::$app->view->title = "Gerenciador de Usuários Administrativos";
        \Yii::$app->view->params['title-page'] = 'Gerenciador de Usuários Administrativos';
        \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Gerenciador de Usuários Administrativos',]]; 
        /*END: Define atributos da pagina*/

        $model = new AdmUserSearch;
        $dataProvider = $model->search(Yii::$app->request->queryParams);


        return $this->render('admins',[
            'dataProvider'=>$dataProvider,
            'model'=>$model,
            ]);
    }

    public function actionAssinantes()
    {
        /*INIT: Define atributos da pagina*/
       \Yii::$app->view->title = "Gerenciador de Usuários Assinantes";
        \Yii::$app->view->params['title-page'] = 'Gerenciador de Usuários Assinantes';
        \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Gerenciador de Assinantes Administrativos',]]; 
        /*END: Define atributos da pagina*/

        $model = new UserSearch;
        $dataProvider = $model->search(Yii::$app->request->queryParams);


        return $this->render('assinantes',[
            'dataProvider'=>$dataProvider,
            'model'=>$model,
            ]);
    }

}

