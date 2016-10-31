<?php
namespace app\components\helpers;

use yii\base\Component;

/**
 * Recupero a instancia do scenario logado
 * @example url - desc
 * @author André Luiz Pereira <andre@next4.com.br>
 */
class AnalisarLogado extends Component{

public $logado = false;
public $identificador = '';
public $user = false;
public function init()
{
  // $professor = \Yii::$app->getModule('professor')->getUser();
  // $aluno = \Yii::$app->getModule('aluno')->getUser();


// echo "<pre>";
// var_dump($aluno->isGuest);
//
//   exit;

if(!\Yii::$app->user->isGuest){
  $this->logado = true;
  $this->identificador = \Yii::$app->user->identity->identificador_login;
  $this->user = \Yii::$app->user;
}

  // if(!$professor->isGuest){
  //   $this->logado = true;
  //   $this->identificador = $professor->identity->identificador_login;
  //   $this->user = $professor;
  // }elseif(!$aluno->isGuest){
  //   $this->logado = true;
  //   $this->identificador = $aluno->identity->identificador_login;
  //   $this->user = $aluno;
  // }
}

/**
 * Verifica se é visitante
 * @author André Luiz Pereira <andre@next4.com.br>
 * @return bool - retorna verdadeiro ou falso
 */
public function Visitante()
{
  if(!$this->logado){
    return true;
  }else{
    return false;
  }
}

/**
 * retorna nome de quem está logado, do professor ou aluno
 * @author André Luiz Pereira <andre@next4.com.br>
 * @return string - nome
 */
public function Nome()
{
  return $this->user->identity->nome;
}

public function UrlPainel()
{
  $urls = [
    'professor'=>\yii\helpers\Url::to(['/professor/painel/']),
    'aluno'=>\yii\helpers\Url::to(['/aluno/painel/']),
    'logout'=>\yii\helpers\Url::to(['/institucional/sair/']),
  ];

  return (isset($urls[$this->identificador]))?$urls[$this->identificador]:$urls['logout'];
}

public function UrlSair()
{
  $urls = [
    'professor'=>\yii\helpers\Url::to(['/professor/painel/sair']),
    'aluno'=>\yii\helpers\Url::to(['/aluno/painel/sair']),
  ];

  return (isset($urls[$this->identificador]))?$urls[$this->identificador]:'#';
}


}


 ?>
