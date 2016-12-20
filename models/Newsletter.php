<?php
namespace app\models;
  use app\components\helpers\ModelHelper;
  use Yii;


class Newsletter extends ModelHelper
{

	public static function tableName()
    {
        return '{{%newsletter}}';
    }

  public function beforeValidate() {

      $this->dt_criacao = date('Y-m-d H:i:s');
      $this->black_list = 0;

        return parent::beforeValidate();
    }


	public function rules()
    {
        return [
            [['nome','email'], 'required', 'message'=>'Campo obrigatório!'],
            ['email','unique'],
            [['black_list'], 'integer'],
            [['dt_criacao'],'safe'],
            [['email'], 'email', 'message'=>'E-mail inválido'],

        ];

    }

    public function AvisarAdm()
    {
      $mail = \Yii::$app->SendMail;

      $administradores = $mail->getListMailTO('receber_news');

      if($administradores)
			{
				// $mail->sendto       =$email['email'];
				$mail->from     = \Yii::$app->params['sys_mail'];
				$mail->layoutSend = '@app/mail/layouts/multiplos_mails';
				$mail->assunto  = 'Newsletter [amormeu]';
				$mensagem   = '<p>Um usuário deseja catastrar-se na newslleter </p>';
        $nome = \yii\helpers\Html::encode($this->nome);
        $email = \yii\helpers\Html::encode($this->email);
        $mensagem .= "<p><strong>Nome:</strong>{$nome}</p>";
				$mensagem .= "<p><strong>E-mail:</strong>{$email}</p>";

				$url = \yii\helpers\Url::toRoute('_adm/painel/login',true);
				$mensagem  .= '<br /><p>Acesse a administração para verificar sua news <a href="'.$url.'" alt="meu acesso administrativo" target="_blank">Área administrativa</a></p>';

				$listadeemail = [];
				foreach ($administradores as $k => $email) {
					$listadeemail[] = ['email'=>$email];
				}


			 $send = $mail->SendMultiples($listadeemail,$mensagem);

			 if(!$send)
			 {
				 \Yii::error('na parte de Newsletter o envio não foi bem sucedido para usuário id '.\Yii::$app->user->identity->id ,'mail');
			 }

		 }else{
			 \Yii::error('Nenhum usuário administrativo tem permissão de receber e-mails de novas Newsletter' ,'mail');
		 }

    }

    public function attributeLabels()
    {
        return [
        'nome' => 'nome',
        'email' => 'email',
        'black_list' => 'black_list',
        'dt_criacao' => 'dt_criacao'
        ];
    }


}
