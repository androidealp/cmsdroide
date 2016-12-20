<?php

namespace app\models;

use Yii;
use app\components\helpers\ModelHelper;

/**
 * ContactForm is the model behind the contact form.
 */
class Contato extends ModelHelper
{
    public $nome;
    public $email;
    public $assunto;
    public $mensagem;
    

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // nome, email, assunto and body are required
            [['nome', 'email', 'assunto', 'mensagem'], 'required'],
            // email has to be a valid email address
            ['email', 'email']
            
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        
    }



            public function SendMailContato()
        {
            $mail = \Yii::$app->SendMail;

            $administradores = $mail->getListMailTO('receber_contatos');

            if($administradores)
            {
                // $mail->sendto       =$email['email'];
                $mail->from     = \Yii::$app->params['sys_mail'];
                $mail->layoutSend = '@app/mail/layouts/multiplos_mails';
                $mail->assunto  = '[Formulário de contato do site]. '.\yii\helpers\Html::encode($this->assunto);
                $mensagem   = '<p>Um usuário do site acabou de preencher o formulário de contato do site</p>';
                $mensagem .= "<strong>nome</strong>".\yii\helpers\Html::encode($this->nome)."<br />";
                $mensagem .= "<strong>E-mail</strong>".\yii\helpers\Html::encode($this->email)."<br />";
                $mensagem .= "<strong>Mensagem</strong>".\yii\helpers\Html::encode($this->mensagem)."<br />";

                $mensagem .= "<p>".\yii\helpers\Html::encode($this->mensagem)."</p>";
                $url = \yii\helpers\Url::toRoute('_adm/painel/login',true);
                $mensagem  .= '<br /><p>Acesse a administração para avaliar seu comentário <a href="'.$url.'" alt="meu acesso administrativo" target="_blank">Área administrativa</a></p>';

                $listadeemail = [];
                foreach ($administradores as $k => $email) {
                    $listadeemail[] = ['email'=>$email];
                }


             $send = $mail->SendMultiples($listadeemail,$mensagem);

             if(!$send)
             {
                 \Yii::error('na parte de comentários o envio não foi bem sucedido para usuário id '.\Yii::$app->user->identity->id ,'mail');
             }

         }else{
             \Yii::error('Nenhum usuário administrativo tem permissão de receber e-mails de novos comentários' ,'mail');
         }

        }


    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contato($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->nome])
                ->setAssunto($this->assunto)
                ->setMensagems($this->mensagem)
                ->send();

            return true;
        }
        return false;
    }
}
