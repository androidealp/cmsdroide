<?php
namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use app\_adm\models\AdmUserSearch;
use app\_adm\models\AdmUsuarios;
use app\painel\models\User;
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

      \Yii::$app->view->title = "Gerenciador de Assinantes";
       \Yii::$app->view->params['title-page'] = 'Gerenciador de Assinantes';

       $model = new User;

       $dataProvider = $model->search(Yii::$app->request->queryParams);

       return $this->render('assinantes',[
           'dataProvider'=>$dataProvider,
           'model'=>$model,
           ]);

    }

    public function actionAjaxDeletarAdm(){
      $model = new \app\_adm\models\AdmUsuarios;
      $return = ['msg'=>'É necessário selecionar uma linha para poder deletar!',
              'type'=>'error'
              ];

        if(\Yii::$app->request->post('del-list')){
          $post = \Yii::$app->request->post('del-list');
          $registro = \Yii::$app->request->post('del-list');
          $total =count($post);
          $del = 0;
          if(is_array($registro)){
            $del = $model->deleteAll(['id'=>$registro]);
          }

          if($del){
              $msn = ($total>1)?"$total registros foram deletados.":"$total registro foi deletado.";

              $return = ['msg'=>$msn,
                  'type'=>'success'
                ];
          }else{
             $return = ['msg'=>'Erro ao tentar deletar o registro. ',
              'type'=>'error'
            ];
          }



        }

      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      return $return;
    }

    public function actionAjaxDeletarGroupAdm()
    {

      $model = new AdmGrupos;
      $return = ['msg'=>'É necessário selecionar uma linha para poder deletar!',
              'type'=>'error'
              ];

        if(\Yii::$app->request->post('del-list')){
            $post = Yii::$app->request->post('del-list');
            $registro = Yii::$app->request->post('del-list');
            $total =count($post);


            if(is_array($registro)){

              $check_exists = $model->checkUsuarios($registro);

              if(!$check_exists)
              {
                $model->deleteAll(['id'=>$registro]);

                $return = ['msg'=>($total>1)?"$total registros foram deletados.":"$total registro foi deletado.",
                        'type'=>'success'
                        ];

              }else{

                $return = ['msg'=>'Não é permitido remover grupos com usuários vinculádos, remova os usuários primeiro',
                        'type'=>'error'
                        ];

              }


            }





        }

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return $return;

    }

    public function actionManagergroups(){
      /*INIT: Define atributos da pagina*/
      \Yii::$app->view->title = "Gerenciar Grupos";
      \Yii::$app->view->params['title-page'] = 'Gerenciador de grupos administrativos';
      \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Gerenciador de grupos administrativos',]];
      /*END: Define atributos da pagina*/
      $model = new AdmGruposSearch;
      $dataProvider = $model->search(Yii::$app->request->queryParams);
      return $this->render('managergroups',[
        'model'=>$model,
        'dataProvider'=>$dataProvider
      ]);
    }

    public function actionAjaxCriarGrupoAdm(){
      $model = new AdmGrupos;

      if ($model->load(Yii::$app->request->post())){
          \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

          if($model->save()){
          $return = ['msg'=>'Grupo '.$model->nome.' adicionado com sucesso!',
              'type'=>'success'
            ];
          }else{
              $return = [
                'msg'=>'Grupo '.$model->nome.' Possui algum item com erro!<br /><br />',
              'type'=>'error'
            ];
          }

          return $return;

      }else{
          return $this->renderAjax('_ajaxAdmgrupocriar',[
          'model'=>$model,
          ]);
      }
    }

    public function actionEditarGrupoAdm($id){
        \Yii::$app->view->title = "Editar Grupo de administradores";
        \Yii::$app->view->params['title-page'] = 'Editar grupo Administradores';
       $model = AdmGrupos::findOne($id);

        if ($model->load(Yii::$app->request->post())){

            $session = \Yii::$app->session;

            if($model->save())
            {
              $session->addFlash('alert',[
                'msn'=>'Grupo '.$model->nome.' editado com sucesso!',
                'type'=>'success'
                ]);
                return $this->redirect(['usermanager/managergroups'],302);
            }else{
              $session->addFlash('alert',[
                'msn'=>'Foi detectado os seguintes erros no banco:'.$model->TextErros(),
                'type'=>'error'
                ]);
                return $this->redirect(['usermanager/editar-grupo-adm','id'=>$id],302);
            }


        }

        return $this->render('_editargroupadm',[
            'model'=>$model,
            ]);

    }





    public function actionAjaxSalvarSenha($type = "admin", $id = 0)
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $return = [
          'msg'=>'Dados insuficientes',
          'type'=>'error'
          ];

      if($type == 'admin')
      {
        $admin = new AdmUsuarios;

        return  $admin->EditarSenha($id);

      }
          return $return;

    }

    public function actionAjaxInserirSenha($type,$id){
      $model = new AdmUsuarios;
     return  $this->renderAjax('partialviews/_ajaxsenhas',['type'=>$type,'id'=>$id]);
    }





    public function actionAjaxCriarAdm(){
      $model = new AdmUsuarios;
      $model->scenario = 'criar';

      if ($model->load(\Yii::$app->request->post())){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $allgetscenario = $model->getCustomScenarios();

        if($model->save(true, $allgetscenario['criar'])){
            $return = [
                'msg'=>'Usuário '.$model->nome.' adicionado com sucesso!',
                'type'=>'success'
                ];
            }else{
                $return = [
                  'msg'=>'Erros encontrados!<br /><br />'.$model->HtmlErros(),
                  'type'=>'error'
                ];
            }

            return $return;
      }

      return $this->renderAjax('_ajaxAdmCriar',[
          'model'=>$model
          ]);


    }


    public function actionEditarAdm($id){

      \Yii::$app->view->title = "Editar Usuario Admin";
     \Yii::$app->view->params['title-page'] = 'Editar usuários administratores';

    $model = AdmUsuarios::findOne($id);

    $model->scenario = AdmUsuarios::SCENARIO_EDITAR;
    $allgetscenario = $model->getCustomScenarios();
     if ($model->load(\Yii::$app->request->post()) && $model->save(true, $allgetscenario[AdmUsuarios::SCENARIO_EDITAR])){

         $session = \Yii::$app->session;

         $session->addFlash('alert',[
              'type'=>'success',
              'msn'=>'Usuário '.$model->nome.' editado com sucesso!',
            ]);

         return $this->redirect(['usermanager/admins'],302);
     }

     return $this->render('_editarusuarioadm',[
         'model'=>$model,
         ]);
    }

}
