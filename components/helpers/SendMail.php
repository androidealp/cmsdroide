<?php
namespace app\components\helpers;

use Yii;
use yii\base\Component;
use yii\base\ErrorException;

/**
 * Este componente trabalha com o swiftmailer, pré-configura informações importantes antes do envio
 * @example http://www.yiiframework.com/doc-2.0/ext-swiftmailer-index.html - doc de acesso as informações
 * @author André Luiz Pereira <andre@next4.com.br>
 * @property object $mail - instância do objeto mailer
 * @property string $titulo - Titulo que estará no corpo do envio, se não for aplciado padrão Mensagem de contado da Tesb
 * @property string $assunto - Assunto do email se não aplicado default Contato Tesb
 * @property array $data - Dados que serão enviados no corpo do email
 * @property string $layout - layout aplicado no path da raiz mail/layout/ se não for aplicado usa como padrão tesb_mail
 * @property string $to - E-amil do destinatário
 * @property integer $from - e-mail do remetente
 */
class SendMail extends Component{

 public $mail = false;
 public $titulo = 'Mensagem de contado da Tesb';
 public $assunto = 'Contato Tesb';
 public $data = [];
 public $layoutSend = '@app/mail/layouts/tesb_mail';
 public $sendto = '';
 public $from = '';

 /**
  * Inicio o metodo de envio setando as informações que vem direto do banco
  * @author André Luiz Pereira <andre@next4.com.br>
  */
  public function init()
  {
     $model = \app\_adm\models\AdmConfig::findOne(1);
     //Verifico a existencia no banco
     if($model){
       $this->mail = Yii::$app->mailer;
       // aplico as informacoes do banco para parametros de envio smpt
       $this->mail->transport = [
              'class' => 'Swift_SmtpTransport',
              'host' => $model->host,
              'username' => $model->username,
              'password' => $model->decry(), // descubro a senha antes de logar
              'port' =>  "{$model->port}",
              'encryption' => $model->encryption,
       ];

     }else{
       \Yii::error("Tentativa de iniciar o setTrasport do mailer, porém o banco não foi localizado em sendMail.php" ,'mail');
       throw new \yii\web\HttpException(500, 'Erro no processo de envio, contacte o administrador');
     }

  }

  /**
   * Metodo de envio, verifica se os dados foram configurados corretamente, e aplica o envio
   * @author André Luiz Pereira <andre@next4.com.br>
   * @return bool - retorna verdadeiro ou falso se os dados foram enviados
   */
  public function send()
  {
    $send = false;
    $envio = false;
    $geterros = '';
    if($this->mail->hasProperty('transport') || $this->checkDados()){

      // formato aceito pelo layout de e-mail
      $forsend = [
        'dados'=>$this->data,
        'titulo'=>$this->titulo,
      ];
      // verifico as tentativas de envio se os dados estão respondendo corretamente para o envio
      try {
        $envio =  \Yii::$app->mailer->compose($this->layoutSend,$forsend)
                     ->setFrom($this->from)
                     ->setTo($this->sendto)
                     ->setSubject($this->assunto)
                     ->send();
      } catch (ErrorException $e) {
        $geterros = 'Erro de envio: '.$e;
      }

       if($envio){
         $send = true;
       }else{
          \Yii::error("O envio não foi realizado, erro no processo de send, ".$geterros,'mail');
       }



    }else{
      \Yii::error("As propriendades não foram definidas corretamente no transport no metodo send." ,'mail');
       //throw new \yii\web\HttpException(500, 'Erro no processo de envio, contacte o administrador');
    }

    return $send;
  }

  /**
   * Verifico se os dados fornecidos na class, foram devidamente aplicados no preocesso de stancia da classe antes do envio
   * @author André Luiz Pereira <andre@next4.com.br>
   * @return bool - retorna verdadeiro ou falso se os dados foram aplicados ou nao
   */
  private function checkDados()
  {
    $return = true;
    if(empty($this->to) || empty($this->from) || !$this->data){
      $return = false;
    }

    return $return;
  }

}
