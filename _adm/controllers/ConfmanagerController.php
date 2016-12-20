<?php

namespace app\_adm\controllers;
use app\_adm\components\helpers\ControllerHelper;
use Yii;

class ConfmanagerController extends ControllerHelper{

public function actionIndex(){

    \Yii::$app->view->title = "Configurações";
    \Yii::$app->view->params['title-page'] = 'Configurações';

	return $this->render('index');
}

public function actionTemas(){

     \Yii::$app->view->title = "Gerenciar Temas";
    \Yii::$app->view->params['title-page'] = 'Temas';

    //pego o arquio de layout
    $jsonfileLayout = \app\components\helpers\LayoutHelper::loadThemesJson();

    $modeljson = New \app\_adm\models\ThemeJson();


    return $this->render('temas',[
        'jsonfileLayout'=>$jsonfileLayout,
        'modeljson'=>$modeljson
    ]);

}

public function actionAjaxTesteEmail(){

  \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


  $email = \Yii::$app->request->post('teste_mail');

  if(!filter_var($email['email'], FILTER_VALIDATE_EMAIL)) {
        return [
          'type'=>'error',
          'msg'=>'O campo e-mail deve ser válido'.$email['email'],
          'bttruefalse'=>0
        ];
  }


   $mail = \Yii::$app->SendMail;
   $mail->sendto       =$email['email'];
   $mail->from     = \Yii::$app->params['sys_mail'];
   $mail->assunto  = 'Teste de envio de e-mail';
   $mail->titulo   = 'Resultado do teste de e-mail.';
   $mail->mensagem     = 'Teste de envio, não responda.';

  $envio = $mail->send();

  if($envio){
    return [
      'type'=>'success',
      'msg'=>'Email de teste enviado com sucesso!',
      'bttruefalse'=>1
    ];
  }else{
    return [
      'type'=>'error',
      'msg'=>'Ocorreu um erro no envio acesse o log',
      'bttruefalse'=>0
    ];
  }



}




/**
 * Abre o ssiema
 * @author André Luiz Pereira <andre@next4.com.br>
 * @return string - retorna a pagina do sistema
 */
public function actionSistema(){

    \Yii::$app->view->title = "Gerenciar Sistema";
    \Yii::$app->view->params['title-page'] = 'Sistema';

    $model = \app\_adm\models\AdmConfig::findOne(1);

    $model->password = '';

    if($model->load(\Yii::$app->request->post()))
    {
        $session = \Yii::$app->session;

        if($model->save(true,['host','password','username','port', 'encryption'])){
          $session = \Yii::$app->session;

          $session->addFlash('alert',[
            'type'=>'success',
            'msn'=>'Configurações salvas com sucesso.'
          ]);

              $model->password = '';
        }else{
          $session = \Yii::$app->session;

          $session->addFlash('alert',[
            'type'=>'error',
            'msn'=>'Foram detectados erros no processo de salvar. '.$model->HtmlErros()
          ]);

        }

        return $this->redirect(['confmanager/sistema']);

    }

    return $this->render('sistema',[
     'model'=>$model
   ]);
}


public function actionServicos()
{
    /*INIT: Define atributos da pagina*/
     \Yii::$app->view->title = 'Gerenciador de Serviços';
    \Yii::$app->view->params['title-page'] = 'Gerenciador de Serviços';
    \Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Gerenciador de Serviços',]];
    /*END: Define atributos da pagina*/

    $model = new \app\models\ServicosSearch;
    $dataProvider = $model->search(Yii::$app->request->queryParams);

    return $this->render('servicos',[
        'dataProvider'=>$dataProvider,
        'model'=>$model,
        ]);
}

public function actionAjaxdeletarservico(){
  $model = new \app\models\Servicos;
  $return = ['msn'=>[
          'message'=>'É necessário selecionar no mínimo uma linha para poder deletar!'
          ],
          'type'=>[
          'type'=>'danger'
          ]];

    if(\Yii::$app->request->post('del-list')){
      $post = \Yii::$app->request->post('del-list');
      $total =count($post);
      if($model->DelServico($post)){
          $msn = ($total>1)?"$total serviços deletados com sucesso.":"$total serviço removido com sucesso.";

          $return = ['msn'=>[
              'message'=>$msn
              ],
              'type'=>[
                  'type'=>'success'
              ]];
      }else{
         $return = ['msn'=>[
          'message'=>'Erro ao tentar deletar o registro. <br /> '.$model->HtmlErros()
          ],
          'type'=>[
          'type'=>'danger'
          ]];
      }



    }

  \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

  return $return;
}

public function actionAjaxcriarservico()
{
  $model = new \app\models\Servicos;

  if ($model->load(Yii::$app->request->post())){
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      if($model->save()){
      $return = ['msn'=>[
          'message'=>'Serviço '.$model->nome.' foi adicionado com sucesso!'
          ],
          'type'=>[
          'type'=>'success'
          ]];
      }else{
          $return = ['msn'=>[
          'message'=>'Serviço '.$model->nome.' possui algum item com erros!<br /><br />'.$model->HtmlErros().'<br/><br/>'],
          'type'=>[
          'type'=>'danger'
          ]];
      }

      return $return;

  }else{

      return $this->renderAjax('_ajaxCriarservico',[
      'model'=>$model,
      ]);
  }
}

public function actionEditarservico($id)
{
  $model = \app\models\Servicos::findOne($id);

\Yii::$app->view->title = 'Edição de serviço';
\Yii::$app->view->params['title-page'] = 'Edição de serviço';
\Yii::$app->view->params['breadcrumbs-links'] =[['label'=>'Edição de serviço']];


  if ($model->load(\Yii::$app->request->post()) && $model->save()){

     $session = \Yii::$app->session;

     $session->addFlash('notify',[
       [
         'icon'=>'glyphicon glyphicons-check',
         'title'=>'<strong>Edição de Serviço</strong>',
         'message'=>'O servico '.$model->nome.' foi editado com sucesso!'
         ],
         [
         'type'=>'success'
         ]
       ]);
     return $this->redirect('index.php?r=_adm/confmanager/servicos',302);
 }

 return $this->render('_editarservico',[
     'model'=>$model,
     ]);
}

public function actionEditartema($area, $theme){
  $modeljson = new \app\_adm\models\ThemeJson();
  $layoutfile = \app\components\helpers\LayoutHelper::loadThemesJson()->getFile();
  if ($modeljson->load(Yii::$app->request->post())){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $edit = $modeljson->edit($area, $theme, $layoutfile);

     if($edit){
       $return = ['msn'=>[
           'message'=>'Arquivo Tema editado, arquivos escritos '.$edit.' bytes'
           ],
           'type'=>[
               'type'=>'success'
           ]];
     }else{
         $return = ['msn'=>[
          'message'=>'Não foi possivel salvar por algum erro inesperado.'
          ],
          'type'=>[
          'type'=>'danger'
          ]];
     }

     return $return;

  }else{

    $modeljson->open($area, $theme, $layoutfile);
    return $this->renderAjax('_tema_form',['modeljson'=>$modeljson]);
  }

}

}
