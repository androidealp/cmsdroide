<?php
namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use app\models\CategoriasConteudo;
use app\models\CategoriasConteudoSearch;
use app\models\ConteudoSearch;
use app\models\Conteudo;
use Yii;
// use yii\data\ActiveDataProvider;

class GerenciadorconteudoController extends ControllerHelper
{


    public function actionCategorias()
    {
        /*INIT: Define atributos da pagina*/
       \Yii::$app->view->title = "Gerenciador de Categorias";
        \Yii::$app->view->params['title-page'] = 'Gerenciador de Categorias';
        \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Gerenciador de Categorias',]]; 
        /*END: Define atributos da pagina*/

        $model = new CategoriasConteudoSearch;
        $dataProvider = $model->search(Yii::$app->request->queryParams);


        return $this->render('categorias',[
            'dataProvider'=>$dataProvider,
            'model'=>$model,
            ]);
    }

    public function actionAjaxdeletar(){
        $model = new CategoriasConteudo;
        $return = ['msn'=>[
                'message'=>'É necessário selecionar uma linha para poder deletar!'
                ],
                'type'=>[
                'type'=>'danger' 
                ]];

          if(Yii::$app->request->post('del-list')){
            $post = Yii::$app->request->post('del-list');
            $total =count($post); 
            if($model->admDeletar($post)){
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


    public function actionAjaxcriar(){

        $model = new CategoriasConteudo;
        $languages = $model->ListLanguage();



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
            return $this->renderAjax('_ajaxCriar',[
            'model'=>$model,
            'languages'=>$languages
            ]);    
        }

        
    }

    public function actionAjaxcriarconteudo(){
        $model = new Conteudo;
       $languages = $model->ListLanguage();
       $categorias = $model->Categorias();


        if ($model->load(Yii::$app->request->post())){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;



            if($model->save()){
            $return = ['msn'=>[
                'message'=>'Conteúdo '.$model->titulo.' adicionado com sucesso!'
                ],
                'type'=>[
                'type'=>'success' 
                ]];    
            }else{
                $return = ['msn'=>[
                'message'=>'Conteúdo '.$model->titulo.' possui algum item com erros!<br /><br />'.$model->HtmlErros().'<br/><br/>'.$model->texto_completo                ],
                'type'=>[
                'type'=>'danger' 
                ]];
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
            
            $session->addFlash('notify',[[
                'icon'=>'glyphicon glyphicons-check',
                'title'=>'<strong>Nova Categoria</strong>',
                'message'=>'Categoria '.$model->nome.' adicionada com sucesso!'
                ],[
                'type'=>'success' 
                ]]);
            $this->redirect('index.php?r=_adm/gerenciadorconteudo/categorias',302);
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

         $model = Conteudo::findOne($id);
        $languages = $model->ListLanguage();
        $categorias = $model->Categorias();

         if ($model->load(Yii::$app->request->post()) && $model->save()){
            
            $session = Yii::$app->session;
            
            $session->addFlash('notify',[[
                'icon'=>'glyphicon glyphicons-check',
                'title'=>'<strong>Edição de artigo</strong>',
                'message'=>'Conteúdo '.$model->titulo.' editado com sucesso!'
                ],[
                'type'=>'success' 
                ]]);
            $this->redirect('index.php?r=_adm/gerenciadorconteudo/conteudo',302);
        }

        return $this->render('_editarcont',[
            'model'=>$model,
            'languages'=>$languages,
            'categorias'=> $categorias 
            ]);


    }
}

