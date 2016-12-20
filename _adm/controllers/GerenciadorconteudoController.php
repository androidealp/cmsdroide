<?php
namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use app\models\CategoriasConteudo;
use app\models\CategoriasConteudoSearch;
use app\models\ConteudoSearch;
use app\models\Conteudo;
use app\models\Comentarios;
use app\models\Respostas;
use Yii;
// use yii\data\ActiveDataProvider;

class GerenciadorconteudoController extends ControllerHelper
{


    public function actionCategorias()
    {
        /*INIT: Define atributos da pagina*/
       \Yii::$app->view->title = "Gerenciador de Categorias";
        \Yii::$app->view->params['title-page'] = 'Gerenciador de Categorias';
        /*END: Define atributos da pagina*/

        $model = new CategoriasConteudoSearch;
        $dataProvider = $model->search(Yii::$app->request->queryParams);


        return $this->render('categorias',[
            'dataProvider'=>$dataProvider,
            'model'=>$model,
            ]);
    }

    public function actionAjaxStatusResposta($id)
    {
      $model = Respostas::find()->select(['id','status_resposta'])->where(['id'=>$id])->one();

      if(!\Yii::$app->request->isAjax)
      {
        throw new \yii\web\HttpException(403, 'Acesso Negado, este item só pode ser aberto via ajax');
      }

      if(!$model)
      {
        throw new \yii\web\HttpException(404, 'Página não encontrada');
      }

      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $update_status = 0;

      if(!$model->status_resposta)
      {
        $update_status = 1;
      }

      $updateStatus = \Yii::$app->db->createCommand()->update('{{%respostas}}', [
          'status_resposta' => $update_status,
        ],
        ['id'=>$model->id]
      );

      if ($updateStatus->execute()){
        $return = [
          'msg'=>'A resposta foi publicado com sucesso!',
          'type'=>'success',
          'bttruefalse'=>$update_status,
          ];
      }else{
        $return = [
          'msg'=>'Por algum motivo não foi possível atualizar o status da resposta.',
          'type'=>'error',
          'bttruefalse'=>$model->status_resposta,
          ];
      }

      return $return;


    }

    public function actionAjaxStatusComentario($id)
    {

      $model = Comentarios::find()->select(['id','status_comentario'])->where(['id'=>$id])->one();

      if(!\Yii::$app->request->isAjax)
      {
        throw new \yii\web\HttpException(403, 'Acesso Negado, este item só pode ser aberto via ajax');
      }

      if(!$model)
      {
        throw new \yii\web\HttpException(404, 'Página não encontrada');
      }

      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;



      $update_status = 0;

      if(!$model->status_comentario)
      {
        $update_status = 1;
      }

      $updateStatus = \Yii::$app->db->createCommand()->update('{{%comentarios}}', [
          'status_comentario' => $update_status,
        ],
        ['id'=>$model->id]
      );

      if ($updateStatus->execute()){
        $return = [
          'msg'=>'Comentário publicado com sucesso!',
          'type'=>'success',
          'bttruefalse'=>$update_status,
          ];
      }else{
        $return = [
          'msg'=>'Por algum motivo não foi possível atualizar o status do comentário.',
          'type'=>'error',
          'bttruefalse'=>$model->status_comentario,
          ];
      }

      return $return;




    }

    public function actionComentarios()
    {

      \Yii::$app->view->title = "Gerenciador de comentários";
       \Yii::$app->view->params['title-page'] = 'Gerenciador de comentários';

       $model = new Comentarios;
       $dataProvider = $model->searchAdm(Yii::$app->request->queryParams);

      return $this->render('comentarios',[
        'model'=>$model,
        'dataProvider'=>$dataProvider
      ]);
    }


    public function actionRespostas()
    {

      \Yii::$app->view->title = "Gerenciador de respostas";
       \Yii::$app->view->params['title-page'] = 'Gerenciador de respostas';

       $model = new Respostas;
       $dataProvider = $model->searchAdm(\Yii::$app->request->queryParams);

      return $this->render('respostas',[
        'model'=>$model,
        'dataProvider'=>$dataProvider
      ]);
    }


    public function actionAjaxDeletarRespostas()
    {
      $model = new Respostas;
      $return = [
        'msg'=>'É necessário selecionar uma linha para poder deletar!',
              'type'=>'error'
            ];

      if(\Yii::$app->request->post('del-list')){
        $post = \Yii::$app->request->post('del-list');
        $total =count($post);
        $deletar = $model->admDeletar($post);

        if($deletar){

            $msn = ($deletar>1)?"$total repostas foram deletados":"$total resposta foi deletada.";

            $return = [
              'msg'=>$msn,
              'type'=>'success'
              ];
        }else{
          $return = [
              'msg'=>'Não foi possivel deletar, erros detectados: '.$model->TextErros(),
              'type'=>'error'
          ];
        }

      } //if post

    }


    public function actionAjaxDeletarComentario()
    {

      $model = new Comentarios;
      $return = [
        'msg'=>'É necessário selecionar uma linha para poder deletar!',
              'type'=>'error'
            ];

        if(\Yii::$app->request->post('del-list')){
          $post = \Yii::$app->request->post('del-list');
          $total =count($post);
          $deletar = $model->admDeletar($post);
          if($deletar){

              $msn = ($total>1)?"$total registros foram deletados. Registros:".implode(', ', $deletar):"$total registro foi deletado. Registro:".implode(', ', $deletar);

              $return = [
                'msg'=>$msn,
                'type'=>'success'
                ];
          }else{
            $return = [
                'msg'=>'Não foi possivel deletar, erros detectados: '.$model->TextErros(),
                'type'=>'error'
            ];
          }

        }

      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      return $return;

    }

    public function actionAjaxResetHits($id)
    {

      $model = Conteudo::findOne($id);
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $updateHits = \Yii::$app->db->createCommand()->update('{{%conteudo}}', ['hits' => 0],['id'=>(int)$id]);

      if($updateHits->execute())
      {
        return [
          'msg'=>'Visualização zerada com sucesso!',
          'type'=>'success'
        ];
      }else{
        return [
          'msg'=>'Aparentemente este campo estava zerado ou ocorreu um erro.',
          'type'=>'error'
        ];
      }


    }

    public function actionAjaxdeletar(){
        $model = new CategoriasConteudo;
        $return = [
          'msg'=>'É necessário selecionar uma linha para poder deletar!',
                'type'=>'error'
              ];

          if(Yii::$app->request->post('del-list')){
            $post = Yii::$app->request->post('del-list');
            $total =count($post);
            if($model->admDeletar($post)){

                $msn = ($total>1)?"$total registros foram deletados.":"$total registro foi deletado.";

                $return = [
                  'msg'=>$msn,
                  'type'=>'success'
                  ];
            }else{
              $return = [
                  'msg'=>'Não foi possivel deletar, erros detectados: '.$model->TextErros(),
                  'type'=>'error'
              ];
            }

          }

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return $return;

    }



    public function actionAjaxCriarCategoria(){

        $model = new CategoriasConteudo;
        $languages = $model->ListLanguage();



        if ($model->load(Yii::$app->request->post())){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if($model->save()){
                $return = [
                  'msg'=>'Categoria '.$model->nome.' adicionada com sucesso!',
                  'type'=>'success'
                  ];
            }else{
                $return = [
                    'msg'=>'Erros detectados: '.$model->TextErros(),
                    'type'=>'error'
                ];
            }

            return $return;

        }else{
            return $this->renderAjax('_ajaxCriarCategoria',[
            'model'=>$model,
            'languages'=>$languages
            ]);
        }


    }

    public function actionAjaxStatusConteudo($id = 0)
    {
      $model = Conteudo::findOne($id);
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $update_status = 0;

      if(!$model->status)
      {
        $update_status = 1;
      }

      $updateStatus = \Yii::$app->db->createCommand()->update('{{%conteudo}}', [
          'status' => $update_status,
        ],
        ['id'=>$model->id]
      );

      if ($updateStatus->execute()){
        $return = [
          'msg'=>$model->titulo.' Modificou o status com sucesso',
          'type'=>'success',
          'bttruefalse'=>$update_status,
          ];
      }else{
        $return = [
          'msg'=>'Por algum motivo não foi possível atualizar o status.',
          'type'=>'error',
          'bttruefalse'=>$model->status,

          ];
      }

      return $return;

    }

    public function actionAjaxDestaqueConteudo($id = 0)
    {
      $model = Conteudo::findOne($id);
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $update_destaque = 0;

      if(!$model->destaque)
      {
        $update_destaque = 1;
      }

      $updateDestaque = \Yii::$app->db->createCommand()->update('{{%conteudo}}', [
          'destaque' => $update_destaque,
        ],
        ['id'=>$model->id]
      );

      if ($updateDestaque->execute()){
        $return = [
          'msg'=>$model->titulo.' Modificou o destaque com sucesso',
          'type'=>'success',
          'bttruefalse'=>$update_destaque,
          ];
      }else{
        $return = [
          'msg'=>'Por algum motivo não foi possível atualizar o destaque.',
          'type'=>'error',
          'bttruefalse'=>$model->destaque,

          ];
      }

      return $return;

    }

    public function actionAjaxCriarConteudo(){
       $model = new Conteudo;
       $languages = $model->ListLanguage();
       $categorias = $model->ListaCategorias();


        if ($model->load(Yii::$app->request->post())){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model->dt_criacao = date('Y-m-d H:i:s');

            if($model->save()){

              $return = [
                'msg'=>'Conteúdo '.$model->titulo.' adicionado com sucesso!',
                'type'=>'success'
                ];
            }else{

              $return = [
                'msg'=>'Conteúdo '.$model->titulo.' possui algum item com erros:<br />'.$model->HtmlErros(),
                'type'=>'error'
                ];
            }

            return $return;

        }else{

            return $this->renderAjax('_ajaxCriarConteudo',[
            'model'=>$model,
            'languages'=>$languages,
            'categorias'=>$categorias
            ]);
        }
    }

    public function actionEditarcategoria($id){
         \Yii::$app->view->title = "Editar categoria";
        \Yii::$app->view->params['title-page'] = 'Editar categoria';
        \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Editar categoria',]];
       $model = CategoriasConteudo::findOne($id);
        $languages = $model->ListLanguage();

        if ($model->load(Yii::$app->request->post()) && $model->save()){

            $session = Yii::$app->session;

            $session->addFlash('alert',[
              'type'=>'success',
              'msn'=>'Categoria '.$model->nome.' adicionada com sucesso!'
            ]);

            return $this->redirect(['gerenciadorconteudo/categorias'],302);
        }

        return $this->render('_editarcat',[
            'model'=>$model,
            'languages'=>$languages
            ]);

    }

    public function actionConteudo()
    {
        /*INIT: Define atributos da pagina*/
         \Yii::$app->view->title = 'Gerenciador de Conteúdo';
        \Yii::$app->view->params['title-page'] = 'Gerenciador de conteúdo';
        \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Gerenciador de conteúdo',]];
        /*END: Define atributos da pagina*/

        $model = new ConteudoSearch;

        $dataProvider = $model->search(Yii::$app->request->queryParams);


        return $this->render('conteudo',[
            'dataProvider'=>$dataProvider,
            'model'=>$model,
            ]);
    }

    public function actionEditarconteudo($id)
    {
           \Yii::$app->view->title = 'Editar conteúdo';
        \Yii::$app->view->params['title-page'] = 'Editar conteúdo';
        \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Editar conteúdo',]];

        $model = Conteudo::find()->with(['categoriaconteudo'])->where(['id'=>$id])->one();
        $languages = $model->ListLanguage();
        $categorias = $model->ListaCategorias();

         if ($model->load(Yii::$app->request->post())){

            $session = Yii::$app->session;
            if($model->save())
            {
              $session->addFlash('alert',[
                'type'=>'success',
                'msn'=>'Conteúdo '.$model->titulo.' salvo com sucesso.'
              ]);

              return  $this->redirect(['gerenciadorconteudo/conteudo'],302);

            }else{
              $session->addFlash('alert',[
                'type'=>'error',
                'msn'=>'Ocorreu algum erro ao tentar salvar o conteúdo: '.$model->TextErros()
              ]);
              return  $this->redirect(['gerenciadorconteudo/editarconteudo','id'=>$id],302);
            }


        }

        return $this->render('_editarcont',[
            'model'=>$model,
            'languages'=>$languages,
            'categorias'=> $categorias
            ]);


    }
}
