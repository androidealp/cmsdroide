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



    public function actionPrestadores()
    {
        /*INIT: Define atributos da pagina*/
       \Yii::$app->view->title = "Gerenciador de Prestadores";
        \Yii::$app->view->params['title-page'] = 'Gerenciador de Prestadores';
        \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Gerenciador de Prestadores',]];
        /*END: Define atributos da pagina*/

        $model = new UserSearch;
        $dataProvider = $model->search(Yii::$app->request->queryParams);


        return $this->render('prestadores',[
            'dataProvider'=>$dataProvider,
            'model'=>$model,
            ]);
    }

    public function actionAjaxcriarprestadores(){
      $model = new \app\painel\models\User;
      $cadastro = new \app\painel\models\UserCadastro;
      $model->scenario = \app\painel\models\User::SCENARIO_ADMCRIAR;
      $cadastro->scenario = \app\painel\models\UserCadastro::SCENARIO_ADMCRIAR;
      if ($model->load(\Yii::$app->request->post()) && $cadastro->load(\Yii::$app->request->post()) ){
          \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

          if($model->save()){

            $cadastro->user_id = $model->id;
            if ($cadastro->save()){
              $return = ['msn'=>[
                  'message'=>'Prestador '.$model->nome.' adicionado com sucesso!'
                  ],
                  'type'=>[
                  'type'=>'success'
                  ]];

            }else{
                $model->delete();
              $return = ['msn'=>[
              'message'=>'Formulário de cadastro de usuário possui algum item com erro! erro amais<br /><br />'.$cadastro->HtmlErros()
              ],
              'type'=>[
              'type'=>'danger'
              ]];
            }


          }else{
              $return = ['msn'=>[
              'message'=>'Formulário de usuário possui algum item com erro!<br /><br />'.$model->HtmlErros()
              ],
              'type'=>[
              'type'=>'danger'
              ]];
          }

          return $return;

      }else{
          return $this->renderAjax('_ajaxprestcriar',[
          'model'=>$model,
          'cadastro'=>$cadastro
          ]);
      }
    }


    public function actionEditarprestador($id){
      \Yii::$app->view->title = "Editar Prestador";
     \Yii::$app->view->params['title-page'] = 'Editar Prestador';
     \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Editar Prestador',]];
  //  $model = \app\painel\models\User::find()->where(['id'=>$id])->with('userCadastro')->one();
  $model = \app\painel\models\User::find()->where(['id'=>$id])->with('statusPrestador')->one();
  $cadastro = \app\painel\models\UserCadastro::find()->where(['user_id'=>$id])->one();
  $cadastro->scenario = 'admeditar';
  $model->scenario = 'admeditar';

     if ($model->load(\Yii::$app->request->post()) && $cadastro->load(\Yii::$app->request->post())){

         $session = \Yii::$app->session;
         if($model->save()){
           $cadastro->user_id = $model->id;
           if($cadastro->save())
           {
             $session->addFlash('notify',[[
                 'icon'=>'glyphicon glyphicons-check',
                 'title'=>'<strong>Edição de usuário prestador</strong>',
                 'message'=>'Usuairo '.$model->nome.' editado!'
                 ],[
                 'type'=>'success'
                 ]]);
             $this->redirect('index.php?r=_adm/usermanager/prestadores',302);
           }else{
             $model->delete();
           }
         }

     }

     return $this->render('_editarprestador',[
         'model'=>$model,
         'cadastro'=>$cadastro
         ]);
    }



    public function actionAjaxdeletarprestadores(){
      $model = new app\painel\models\User;
      $return = ['msn'=>[
              'message'=>'É necessário selecionar uma linha para poder deletar!'
              ],
              'type'=>[
              'type'=>'danger'
              ]];

        if(Yii::$app->request->post('del-list')){
          $post = Yii::$app->request->post('del-list');
          $total =count($post);
          $del = 0;
          if(is_array($registro)){
            //  $del = $model->deleteAll(['id'=>$registro]);
          }

          if($del){
              $msn = ($total>1)?"$total registros foram deletados.":"$total registro foi deletado.";

              $return = ['msn'=>[
                  'message'=>$msn
                  ],
                  'type'=>[
                      'type'=>'success'
                  ]];
          }else{
             $return = ['msn'=>[
              'message'=>'Erro ao tentar deletar o registro. '
              ],
              'type'=>[
              'type'=>'danger'
              ]];
          }



        }

      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      return $return;
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

    public function actionAjaxinsertsenhaadm(){
      $model = new AdmUser;
     return  $this->renderAjax('partialviews/_ajaxsenhas',['model'=>$model]);
    }

    public function actionAjaxinsertsenhapres(){
      $model = new \app\painel\models\User;
     return  $this->renderAjax('partialviews/_ajaxsenhas',['model'=>$model]);
    }

    public function actionAjaxcriarusuarioadm(){
      $model = new AdmUser;
      $model->scenario = AdmUser::SCENARIO_CRIAR;
      if ($model->load(Yii::$app->request->post())){
          \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

          if($model->save()){
          $return = ['msn'=>[
              'message'=>'Usuário '.$model->nome.' adicionado com sucesso!'
              ],
              'type'=>[
              'type'=>'success'
              ]];
          }else{
              $return = ['msn'=>[
              'message'=>'Usuário possui algum item com erro!<br /><br />'.$model->HtmlErros()
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
    $model->scenario = AdmUser::SCENARIO_EDITAR;

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
