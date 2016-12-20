<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\components\helpers\ControllerHelper;
use app\models\Conteudo;
use app\models\Busca;
use app\models\CategoriasConteudo;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;



 class BlogController extends ControllerHelper
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

  public function actionIndex(){

    \Yii::$app->view->registerMetaTag([
     'name' =>'Blog AmorMeu',
     'content' => 'Noticias, entreterimento, eu concelhos para um bom relacionamento'
     ]);

    \Yii::$app->view->registerMetaTag([
     'og_title' =>'Titulo blog AmorMeu',
     'content' => 'Titulo blog AmorMeugfdg'
     ]);

     $Busca = new Busca;

    $dataProvider = $Busca->search(\Yii::$app->request->get());
    return $this->render('index', [
       'dataProvider' => $dataProvider
    ]);
}







  public function actionDisplayCategoria(){
    \Yii::$app->view->registerMetaTag([
     'name' =>'Blog AmorMeu sad afs',
     'content' => 'Noticias, entreterimento, eu concelhos para um bom relacionamento'
     ]);

    $model = CategoriasConteudo::find()
        ->where(['status' => 1, 'parent'=> 2])
        ->orderBy('dt_criacao')
        ->all();

        return $model;
    }

    public function actionCategorias($alias){



      $categoria = CategoriasConteudo::find()->where(['alias'=>$alias, 'status'=>1])->one();

      if(!$categoria)
      {
        throw new \yii\web\HttpException(404, 'Página não encontrada');
      }

       \Yii::$app->view->registerMetaTag([
     'name' =>'Blog AmorMeu',
     'content' => 'Noticias, entreterimento, eu concelhos para um bom relacionamento'
     ]);

      \Yii::$app->view->registerMetaTag([
     'property' =>"og:title",
     'content' => "Titulo do artigo",
     ]);

     \Yii::$app->view->registerMetaTag([
     'property' =>"og:image",
     'content' => 'Imagems item'

     ]);\Yii::$app->view->registerMetaTag([
     'property' =>"og:link",
     'content' => 'Imagems item'
     ]);

     \Yii::$app->view->registerMetaTag([
     'property' =>"og:description",
     'content' => 'Descriçao item'
     ]);


    $categoria->SetSeo();

    $dataProvider = new ActiveDataProvider([
      'query' => Conteudo::find()->with('categoriaconteudo')->where(['status' => 1, 'categorias_conteudo_id'=> $categoria->id])->orderBy(
      'dt_publicacao'),
      'pagination' => [
      'pageSize' => 30,
        ],
    ]);

      return $this->render('categorialist', [
      'dataProvider' => $dataProvider
      ]);
    }

    public function actionAjaxFormResponder($comentario)
    {



      $id_comentario = \app\components\helpers\Tools::Decript($comentario);

      $md_comentario = \app\models\Comentarios::findOne($id_comentario);

      if(!$md_comentario)
      {
        return "<div class='alert alert-info'>Acesso negado</div>";
      }

      $resposta = new \app\models\Respostas();
      if($resposta->load(\Yii::$app->request->post()))
      {
        $resposta->comentarios_id = $md_comentario->id;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;



        if($resposta->SaveAndVicule())
        {

          $resposta->SendInfoAdm();
          return ['type'=>'success', 'msg'=>'Sua reposta foi salva e aguarda moderação, para ser publicada, por favor aguarde.'];
        }else{
          // trato o formato de respota
          if($resposta->HasErros())
          {
            return ['type'=>'error', 'msg'=>'Erros encontrados: <br />'.$resposta->TextErros()];
          }else{
            return ['type'=>'error', 'msg'=>'Foi detectado algum erro ao tentar salvar sua reposta, contacte o administrador'];
          }

        }

      }

      return $this->renderAjax('_form_resposta',[
        'resposta'=>$resposta,
        'cript_comentario'=>$comentario
      ]);

    }

    public function actionAjaxFormComentario($alias = '')
    {

      $conteudo = Conteudo::find()
        ->select(['id','autor','id_autor'])
        ->where(['alias' => $alias])
        ->one();

      if (!$conteudo) {
        throw new \yii\web\HttpException(404, 'Página não encontrada');
      }

      $comentarios = new \app\models\Comentarios();
      if($comentarios->load(\Yii::$app->request->post()))
      {
        $comentarios->post_id = $conteudo->id;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $comentario_salvo = $comentarios->save();
        $vinculo_salvo = $comentarios->SaveHasUser();

        if($comentario_salvo && $comentario_salvo)
        {
            $comentarios->SendInfoAdm();

          return ['type'=>'success', 'msg'=>'Seu comentário foi salvo e aguarda moderação, para ser registrado'];
        }else{
          if($comentario_salvo)
          {
            $comentarios->addError('mensagem', 'Erro encontrado no vinculo da mensagem');
            $comentarios->delete();
          }

          \Yii::error('Erros encontrados para salvar o comentário para usuário id: '. \Yii::$app->user->identity->id.' Erros: '.$comentarios->TextErros() , 'banco');

          return ['type'=>'error', 'msg'=>'Detectamos os seguintes erros no seu envio, entre em contato com a administração, ou tente novamente mais tarde'];
        }
      }

      return $this->renderAjax('_form_comentario',[
        'comentarios'=>$comentarios,
        'alias'=>$alias
      ]);
    }

    public function actionBlogItem($alias){
        $model = Conteudo::find()
          ->joinWith('categoriaconteudo')
          ->joinWith('publisher')
          ->where(['xsdml_conteudo.alias' => $alias])
          ->one();

        if(!$model)
        {
          throw new \yii\web\HttpException(404, 'Página não encontrada');
        }

        $session = \Yii::$app->session;
        $session->set('action_login', ['blog/blog-item','alias'=>\yii\helpers\Html::encode($alias)]);

        $comentarios = new \app\models\Comentarios();

        $dataProvider = $comentarios->search($model->id);

        $model->SetSeo();

        \app\components\helpers\Tools::GetClick($model->id,$model->hits);

        return $this->render('blogitem', [
          'model' => $model,
          'comentarios'=>$comentarios,
          'dataProvider'=>$dataProvider
      ]);
    }
}
