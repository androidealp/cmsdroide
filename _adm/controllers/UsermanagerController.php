<?php
namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use app\_adm\models\AdmUserSearch;
use app\_adm\models\AdmUser;
use app\painel\models\UserSearch;
use app\_adm\models\AdmGruposSearch;
use app\_adm\models\AdmGrupos;
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

    public function actionManagergroups(){
      /*INIT: Define atributos da pagina*/
      \Yii::$app->view->title = "Gerenciar Grupos";
      \Yii::$app->view->params['title-page'] = 'Gerenciador de Grupos administrativos';
      \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Gerenciador de Grupos administrativos',]];
      /*END: Define atributos da pagina*/
      $model = new AdmGruposSearch;
      $dataProvider = $model->search(Yii::$app->request->queryParams);
      return $this->render('managergroups',[
        'model'=>$model,
        'dataProvider'=>$dataProvider
      ]);
    }

    public function actionAjaxcriargroupadm(){
      $model = new AdmGrupos;

      if ($model->load(Yii::$app->request->post())){
          \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

          if($model->save()){
          $return = ['msn'=>[
                'message'=>'Grupo '.$model->nome.' adicionado com sucesso!'
              ],
              'type'=>[
                'type'=>'success'
              ]];
          }else{
              $return = ['msn'=>[
              'message'=>'Grupo '.$model->nome.' Possui algum item com erro!<br /><br />'
              ],
              'type'=>[
                'type'=>'danger'
              ]];
          }

          return $return;

      }else{
          return $this->renderAjax('_ajaxAdmgrupocriar',[
          'model'=>$model,
          ]);
      }
    }

    public function actionEditargroupadm($id){
         \Yii::$app->view->title = "Editar group admin";
        \Yii::$app->view->params['title-page'] = 'Editar grupo';
        \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Editar grupo',]];
       $model = AdmGrupos::findOne($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()){

            $session = Yii::$app->session;

            $session->addFlash('notify',[[
                'icon'=>'glyphicon glyphicons-check',
                'title'=>'<strong>Edição de grupo</strong>',
                'message'=>'Grupo '.$model->nome.' editado com sucesso!'
                ],[
                'type'=>'success'
                ]]);
            $this->redirect('index.php?r=_adm/usermanager/managergroups',302);
        }

        return $this->render('_editargroupadm',[
            'model'=>$model,
            ]);

    }

    public function actionAjaxcriarusuarioadm(){
      $model = new AdmUser;

      if ($model->load(Yii::$app->request->post())){
          \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

          if($model->save()){
          $return = ['msn'=>[
              'message'=>'Categoria '.$model->nome.' adicionada com sucesso!'
              ],
              'type'=>[
              'type'=>'success'
              ]];
          }else{
              $return = ['msn'=>[
              'message'=>'Categoria '.$model->nome.' Possui algum item com erro!<br /><br />'.$model->HtmlErros()
              ],
              'type'=>[
              'type'=>'danger'
              ]];
          }

          return $return;

      }else{
          return $this->renderAjax('_ajaxAdmCriar',[
          'model'=>$model,
          ]);
      }
    }


    public function actionEditarusuarioadm($id){
      \Yii::$app->view->title = "Editar Usuario Admin";
     \Yii::$app->view->params['title-page'] = 'Editar usuários administrators';
     \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Editar usuários administrators',]];
    $model = AdmUser::findOne($id);


     if ($model->load(Yii::$app->request->post()) && $model->save()){

         $session = Yii::$app->session;

         $session->addFlash('notify',[[
             'icon'=>'glyphicon glyphicons-check',
             'title'=>'<strong>Edição de usuário admin</strong>',
             'message'=>'Usuairo '.$model->nome.' editado!'
             ],[
             'type'=>'success'
             ]]);
         $this->redirect('index.php?r=_adm/usermanager/admins',302);
     }

     return $this->render('_editarusuarioadm',[
         'model'=>$model,
         ]);
    }

}
