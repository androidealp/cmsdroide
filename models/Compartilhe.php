<?php
	namespace app\models;
	use app\components\helpers\ModelHelper;
	use Yii;


class Compartilhe extends ModelHelper
{
    public $status_email;

	public static function tableName()
    {
        return '{{%compartilhe}}';
    }


    public function beforeValidate()
    {

      $usuario = \app\painel\models\User::find()->select(['id'])->where(['email'=>$this->email_do_amigo])->one();

       $this->data_de_envio = date('Y-m-d H:i:s');
       $this->hash_email = Yii::$app->getSecurity()->generateRandomString();

       if($usuario){
            $this->id_do_remetente = $usuario->id;
        }

        return parent::beforeValidate();
    }


		public function EnviarEmail()
    {
      $mail = \Yii::$app->SendMail;

				// $mail->sendto       =$email['email'];
				$mail->from     = \Yii::$app->params['sys_mail'];
				$mail->to = $this->email_do_amigo;
				$mail->layoutSend = '@app/mail/layouts/multiplos_mails';
				$mail->assunto  = 'Site AmorMeu';
				$nome = \yii\helpers\Html::encode($this->nome);
				$mensagem   = "<p>Oi, tudo bem? é o {$nome} encontrei este site <a target='_blank' href='http://www.amormeu.com.br'>http://www.amormeu.com.br</a> e acho que será muito bom para você!</p>";


			 $send = $mail->sendSimple($mensagem);

			 if(!$send)
			 {
				 \Yii::error('na parte de Compartilhe o envio não foi bem sucedido para o visitante','mail');
			 }



    }



	public function rules()
    {
        return [
            [['nome_remetente'], 'required'],
            [['id_do_remetente','status_confirme_email'], 'integer'],
            [['email_do_amigo', 'email_remetente'], 'email'],
        ];

    }




    public function attributeLabels()
    {
        return [
        'id' => 'ID',
        'id_do_remetente' => 'Id do Rementente',
		'nome_remetente' => 'Nome do remetente',
		'email_remetente' => 'E-mail do remetente',
		'email_do_amigo' => 'E-mail do amigo',
		'data_de_envio' => 'Data de envio',
		'hash_email' => 'HASH Code',
		'status_confirme_email' => 'Status de confirmação'
        ];
    }


}
