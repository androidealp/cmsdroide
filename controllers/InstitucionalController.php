<?php

namespace app\controllers;
use Yii;
use yii\helpers\ArrayHelper;
use app\models\ContactForm;
use app\models\Compartilhe;
use app\models\Comentarios;
use app\models\Newsletter;
use app\models\Contato;
use app\models\Conteudo;
use yii\helpers\Html;
use app\components\helpers\ControllerHelper;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;



class InstitucionalController extends ControllerHelper {

    public function actions() {

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

       $session = \Yii::$app->session;
       if ($session->has('action_login'))
       {
         $session->remove('action_login');
       }


       \Yii::$app->view->registerMetaTag([
        'keywords' => 'teste',
        'description' => 'informacao'
        ]);

        return $this->render('index');
    }

    public function actionLogin()
    {

      \Yii::$app->view->registerMetaTag([
       'keywords' => 'Login teste',
       'description' => 'teste informacao'
       ]);

      $model = new \app\painel\models\LoginForm();

      if ($model->load(Yii::$app->request->post()) && $model->login()) {

        $session = \Yii::$app->session;

        if ($session->has('action_login'))
        {
          $url = $session->get('action_login');
          $session->remove('action_login');
          return $this->redirect($url);
        }else{
          return $this->redirect(['blog/index']);
        }




      }

      return $this->render('login', [
          'model' => $model,
      ]);

    }


    public function actionAjaxLogin()
    {

      if(!\Yii::$app->request->isAjax)
      {

        throw new \yii\web\HttpException(403, 'Acesso negado, você não tem permissão para acessar esta página');

      }

        return $this->renderAjax('ajax-login',[
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

  public function actionAjaxCadNewsletter(){
    $model = new Newsletter;
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $return = [
          'type'=>'error',
          'msg'=>'Ops!!! detectamos erros neste processo de envio.',
          ];

   if ($model->load(Yii::$app->request->post())){

        if($model->save()){

              $model->AvisarAdm();
              $return = [
              'type'=>'success',
              'msg'=>'Obrigado <strong>'.$model->nome.'</strong>! Cadastro realizado com sucesso.'
                  ];
          }else{

            $return = [
                  'type'=>'error',
                  'msg'=>'Ajuste os erros encontrados: '.$model->TextErros(),
                  ];

          }

  }



      return $return;


  }


    public function actionAjaxCadastrarAmigo(){
      $model = new Compartilhe;
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $return = [
          'type'=>'danger',
          'msg'=>'Ops!!! detectamos erros neste processo de envio.',
          ];


      if ($model->load(Yii::$app->request->post())){



         if($model->save()){
           $model->EnviarEmail();
              $return = [
              'type'=>'success',
              'msg'=>'Seu amigo foi cadastro sucesso!',
                  ];
          }
            return $return;
       }

     return $this->renderAjax('compartilhe', [
            'model' => $model,

        ]);
    }



    public function actionNovasenha()
    {
        $model = new \app\painel\models\User;

        $session = \Yii::$app->session;
        if ($session->has('action_login'))
        {
          $session->remove('action_login');
        }

      return $this->render('novasenha', [
          'model' => $model,
      ]);
    }


    public function actionComoFunciona(){

      $session = \Yii::$app->session;
      if ($session->has('action_login'))
      {
        $session->remove('action_login');
      }

      return $this->render('comofunciona',[

        ]);
    }

    public function actionQuemSomos(){
         $model = Conteudo::find()
        ->where(['id' => 1])
        ->one();

        $session = \Yii::$app->session;
        if ($session->has('action_login'))
        {
          $session->remove('action_login');
        }

        //contar visualizacoes
        \app\components\helpers\Tools::GetClick($model->id,$model->hits);
        //adicionar metatags
         $model->SetSeo();


      return $this->render('quemsomos',[
        'model'=>$model

        ]);
    }


    public function actionAjaxFormContato() {

      \Yii::$app->view->registerMetaTag([
       'name' => 'Formulário de contato',
       'content' => 'Duvídas criticas e reclamações e suporte você conseguirá encontrar neste formulário'
   ]);

      return $this->renderAjax('ajaxformcomentario');
    }

    public function actionAjaxCriarComentario()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $post = \Yii::$app->request->post();

      $return = ['type'=>'success', 'msg'=>'Sucesso ao salvar o fomulario'];


      return $return;

    }

    public function actionComentarios(){

      $model = new Comentarios();

      if ($model->load(Yii::$app->request->post())){
            $model->post_id = 2;
            $model->tipo = 5;

            if($model->save(true))
              {
               Yii::$app->session->setFlash('success','Enviada com sucesso!');
                return $this->redirect('comentarios');

              }else{
                 echo $model->HtmlErros();
                 $session->setFlash('erro','Detectamos erros no seu cadastro, tente novamente mais tarde.');
               }
      }

      return $this->render('comentarios',[
        'model' => $model,

      ]);
    }




     public function actionCadastrar()
     {
       $session = \Yii::$app->session;
       if ($session->has('action_login'))
       {
         $session->remove('action_login');
       }

       $sucesso = false;
       $model = new \app\painel\models\User;
       $cadastro = new \app\painel\models\UserCadastro;
       $model->scenario = \app\painel\models\User::SCENARIO_CRIAR;
       $cadastro->scenario = \app\painel\models\UserCadastro::SCENARIO_CRIAR;
       $estados =  \app\models\Estados::find()->all();
       $listestados = ArrayHelper::map($estados,'id','nome');

       if ($model->load(\Yii::$app->request->post()) && $cadastro->load(\Yii::$app->request->post())){
         $session = new \yii\web\Session;
         $dataformat = date('Y-m-d',strtotime($_POST['UserCadastro']['data_nascimento']));
         $cadastro->data_nascimento = $dataformat;
         if($model->save()){
           $cadastro->user_id = $model->id;
           if ($cadastro->save()){

              if($model->EmailAtivar()){
                $session->setFlash('sucesso','Seu cadastro foi efetuado, um e-mail para confirmar seu cadastro foi enviado verifique sua caixa de e-mail');
              }else{
               $session->setFlash('sucesso','Seu cadastro foi efetuado, porem nao foi possivel enviar um e-mail para ativação do cadastro por favor contate o administrador.');
             }
             $sucesso = true;
           }else{
               $session->setFlash('erro','Detectamos erros no seu cadastro, tente novamente mais tarde.');
               $model->delete();
               $sucesso = false;
           }
           //fim cadastro
         }else{
           $session->setFlash('erro','Detectamos erros no seu cadastro, tente novamente mais tarde.');
           $sucesso = false;
         }
         //fim model
       }

       return $this->render('cadastro', [
           'model' => $model,
           'cadastro'=>$cadastro,
           'listestados'=>$listestados,
           'sucesso'=>$sucesso
       ]);
     }

     public function actionAtivarConta($k)
     {
       $model = \app\painel\models\User::find()->select(['id','status_conf_email','hash_mail'])->where(['hash_mail'=>$k])->one();
       $resposta = 'Detectamos algum erro no processo de validação, entre em contato com nossa área técnica.';
       if($model)
       {
         $model->scenario = \app\painel\models\User::SCENARIO_VALIDAR_MAIL;
         $allscenarios = $model->getCustomScenarios();
         $model->hash_mail = '';
         $model->status_conf_email = 1;
         $model->status_user_id = 1;
         if($model->update(true, $allscenarios[$model->scenario]))
         {
           $resposta = "Olá {$model->nome} seu cadastro foi ativado com sucesso, aguarde até o lançamento da rede social, não se preocupe você irá ser notificado pro e-mail.

           ";
         }else{
           \Yii::error("Olá {$model->nome} do email {$model->email} ,ocorreu um erro no ativação do processo de ativação. Contate o administrador mostrando o seguinte erro: ".print_r($model->getErrors(),true));
         }

       }else{
         throw new \yii\web\HttpException(404, 'Esta página não existe');
       }

       return $this->render('ativarconta',[
         'resposta'=>$resposta
       ]);

     }

    public function actionLogout()
    {
      $session = \Yii::$app->session;
      if ($session->has('action_login'))
      {
        $session->remove('action_login');
      }

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



    public function actionContato(){

      $session = \Yii::$app->session;
      if ($session->has('action_login'))
      {
        $session->remove('action_login');
      }
      
      $model = new Contato();

      if ($model->load(\Yii::$app->request->post())){
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      if($model->validate())
      {
        $model->SendMailContato();
        return ['type'=>'success', 'msg'=>'Seu comentário foi salvo e aguarda moderação, para ser registrado'];
      }else{
        return ['type'=>'error', 'msg'=>'corrija os seguintes erros'.$model->HtmlErros()];
      }



      }


      return $this->render('contato', [
          'model' => $model,
        ]);

    }


}
