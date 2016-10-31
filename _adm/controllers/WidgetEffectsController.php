<?php
namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use Yii;
use app\_adm\models\WidgetEffectsMap;
/**
 *
 */
class WidgetEffectsController extends ControllerHelper
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($widget='slideshow')
    {
      \Yii::$app->view->title = "Gerenciar Efeitos";
      \Yii::$app->view->params['title-page'] = 'Gerenciar Efeitos';
      \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>$widget,]];

        $layoutHelper = new \app\components\helpers\LayoutHelper();
        $widgets = new WidgetEffectsMap;
        $effectSelect = $widgets->find()->where(['effect_key'=>$widget])->one();

        if(!$effectSelect){
          throw new \yii\web\HttpException(404, 'Caminho não foi encontrado');
        }

        $dataprovider = $widgets->searchListJson($effectSelect->effect_key.'.json');

        return $this->render('index',[
          'dataprovider'=>$dataprovider,
          'layoutHelper'=>$layoutHelper,
          'widgets'=>$widgets,
          'effectSelect'=>$effectSelect,
          'editavel'=>$layoutHelper->CheckWritable($widgets->path.$effectSelect->effect_key.'.json')
        ]);
    }


    public function actionCriarEfeito($widget)
    {

      \Yii::$app->view->title = "Criar novo Efeito";
      \Yii::$app->view->params['title-page'] = 'Criar novo Efeito';
      \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Criar efeito em '.$widget,]];
      $layout = $widget.'/adicionar';

      $widgets = new WidgetEffectsMap;
      $widgets->scenario = $widget;

      $model = $widgets->loadEffect($widget);

      if(!$model){
        throw new \yii\web\HttpException(400, 'json não foi encontrado.');
      }

      $model->key = 'slide-'.\Yii::$app->getSecurity()->generateRandomString();

      if($model->load(\Yii::$app->request->post()) && $model->validate()){
        $add = $model->adicionarEfeito($widget);
        $session = \Yii::$app->session;

        if($add){

          $session->addFlash('notify',[[
              'icon'=>'glyphicon glyphicons-check',
              'title'=>'<strong>Adicionar efeito</strong>',
              'message'=>'Efeito ['.$model->nome.'] foi adicionado com sucesso, o sistema sobrescreveu '.$add.' bytes!'
              ],[
              'type'=>'success'
              ]]);

              return $this->redirect(['widget-effects/editar','widget'=>$widget,'key'=>$model->key]);
        }else{

          $session->addFlash('notify',[[
              'icon'=>'glyphicon glyphicons-check',
              'title'=>'<strong>Adicionar efeito</strong>',
              'message'=>'Ocorreu um erro no processo de adição, verique se o json está editavel, ou com algum erro!'
              ],[
              'type'=>'danger'
              ]]);

        }


      }

      return $this->render($layout,[
        'model'=>$model
      ]);

    }


    public function actionEditar($widget, $key)
    {

      \Yii::$app->view->title = "Editar Efeito";
      \Yii::$app->view->params['title-page'] = 'Editar Efeito';
      \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>$widget.' '.$key,]];

      $layout = $widget.'/editar';

       $widgets = new WidgetEffectsMap;
       $widgets->scenario = $widget;
       $model = $widgets->getItem($key);

      if(!$model->nome){
        throw new \yii\web\HttpException(400, 'Item solicitado não foi encontrado.');
      }

      if($model->load(\Yii::$app->request->post())){
        $edit = $model->editarEfeito($widget);
        $session = \Yii::$app->session;

        if($edit){

          $session->addFlash('notify',[[
              'icon'=>'glyphicon glyphicons-check',
              'title'=>'<strong>Editar Item</strong>',
              'message'=>'Item '.$model->nome.' foi adicionado com sucesso, o sistema sobrescreveu '.$edit.' bytes!'
              ],[
              'type'=>'success'
              ]]);

        }else{

          $session->addFlash('notify',[[
              'icon'=>'glyphicon glyphicons-check',
              'title'=>'<strong>Editar Item</strong>',
              'message'=>'Ocorreu um erro no processo de edição, verique se o json está editavel, ou com algum erro!'
              ],[
              'type'=>'danger'
              ]]);

        }

       return $this->redirect(['widget-effects/editar','widget'=>$widget,'key'=>$key]);

      }

        return $this->render($layout,[
          'model'=>$model
        ]);
    }


    public function actionAjaxNovoitem($widget,$key)
    {
      $widgets = new WidgetEffectsMap;
      $widgets->scenario = $widget;
      $model = $widgets->getItem($key);
      if(!$model->nome){
        throw new \yii\web\HttpException(404, 'Item solicitado não foi encontrado.');
      }

      if($model->load(\Yii::$app->request->post())){
        $session = \Yii::$app->session;
        $save = $model->saveItem($widget);
        if($save){
          $session->addFlash('notify',[[
              'icon'=>'glyphicon glyphicons-check',
              'title'=>'<strong>Adicionar Item</strong>',
              'message'=>'Item adicionado, o sistema sobrescreveu '.$save.' bytes!'
              ],[
              'type'=>'success'
              ]]);
        }else{
          $session->addFlash('notify',[[
              'icon'=>'glyphicon glyphicons-check',
              'title'=>'<strong>Adicionar Item</strong>',
              'message'=>'Falha ao adicionar novo item verifique se o arquivo de tema '.$widget.'.json ou sua pasta está com permissão de escrita'
              ],[
              'type'=>'danger'
              ]]);
        }

          return $this->redirect(['widget-effects/editar','widget'=>$widget,'key'=>$key]);
      }

      return $this->renderAjax($widget.'/_novoitem',[
        'model'=>$model
      ]);

    }

    public function actionAjaxDeleteItem($widget,$key,$item){

      $widgets = new WidgetEffectsMap;
      $session = \Yii::$app->session;

      $remove = $widgets->removeItem($widget,$key,$item);

      if(!$remove){
        $session->addFlash('notify',[[
            'icon'=>'glyphicon glyphicons-check',
            'title'=>'<strong>Remover Item</strong>',
            'message'=>'Falha ao tentar Remover este item'
            ],[
            'type'=>'danger'
            ]]);
      }else{
        $session->addFlash('notify',[[
            'icon'=>'glyphicon glyphicons-check',
            'title'=>'<strong>Remover Item</strong>',
            'message'=>'Item removido com sucesso, o sistema sobrescreveu '.$remove.' bytes!'
            ],[
            'type'=>'success'
            ]]);
      }

      return $this->redirect(['widget-effects/editar','widget'=>$widget,'key'=>$key]);

    }


}
