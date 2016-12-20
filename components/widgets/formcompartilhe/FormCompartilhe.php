<?php

namespace app\components\widgets\FormCompartilhe;
use Yii;
use yii\base\Widget;
use \app\models\Compartilhe;

class FormCompartilhe extends Widget{

  public $layout = 'formcompartilhe';
  private $data = [];



  public function init(){
    parent::init();
  }
  

  public function run(){
    $model =  new Compartilhe();
    
    echo  $this->render($this->layout,[
      'model'=>$model,
    ]);
  }


   

/*    if($model->save()){
         

          if ($cadastro->save()){
              $session->setFlash('sucesso','Seu cadastro foi efetuado, acesse seu e-mail e verifique na caixa de entrada ou no span se existe um e-mail para validação de conta.');
          }else{
              $session->setFlash('erro','Detectamos erros no seu cadastro, tente novamente mais tarde.');
              $model->delete();
          }
        }*/
 
}
