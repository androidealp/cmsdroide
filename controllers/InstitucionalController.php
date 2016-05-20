<?php

namespace app\controllers;

use Yii;
use app\painel\models\LoginForm;
use app\models\ContactForm;
use app\components\helpers\ControllerHelper;

class InstitucionalController extends ControllerHelper
{


    public function actions()
    {

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
       if($this->instalador){

         return $this->redirect(['/instalador']);

       }

       if (!\Yii::$app->user->isGuest) {
           return $this->redirect(['/painel/']);
       }

        return $this->render('index');
    }

    public function actionLogin()
    {

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/painel/']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionAjaxcorreios()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      if(\Yii::$app->request->post('cep',0)){
          $cep = \Yii::$app->request->post('cep',0);
          return Yii::$app->BuscaCep->Consultar($cep);
      }else{
        return '';
      }
    }

    public function actionNovasenha()
    {
        $model = new \app\painel\models\User;

      return $this->render('novasenha', [
          'model' => $model,
      ]);
    }

    public function actionCadastrar()
    {

      $model = new \app\painel\models\User;
      $cadastro = new \app\painel\models\UserCadastro;
      $model->scenario = \app\painel\models\User::SCENARIO_CRIAR;
      $cadastro->scenario = \app\painel\models\UserCadastro::SCENARIO_CRIAR;

      if ($model->load(\Yii::$app->request->post()) && $cadastro->load(\Yii::$app->request->post()) ){
        $session = new yii\web\Session;

        if($model->save()){
          $cadastro->user_id = $model->id;
          $cadastro->arq_uploads = \yii\web\UploadedFile::getInstances($cadastro, 'arq_uploads');
           $upload_arquivos = $cadastro->uploadFiles();

          if ($upload_arquivos && $cadastro->save()){
              $session->setFlash('sucesso','Seu cadastro foi efetuado, acesse seu e-mail e verifique na caixa de entrada ou no span se existe um e-mail para validação de conta.');
          }else{

            $session->setFlash('erro','Detectamos erros no seu cadastro, tente novamente mais tarde.');
            $model->delete();
          }
        }

      }

      return $this->render('cadastro', [
          'model' => $model,
          'cadastro'=>$cadastro
      ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


}
