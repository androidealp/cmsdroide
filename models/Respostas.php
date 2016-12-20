<?php
namespace app\models;
use app\components\helpers\ModelHelper;
use yii\data\ActiveDataProvider;
use Yii;

/**
 *
 */
class  Respostas extends  ModelHelper
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%respostas}}';
    }

    public function beforeValidate()
    {

        $this->dt_resposta = date('Y-m-d H:i:s');

        return parent::beforeValidate();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
      return [
          [['comentarios_id', 'resposta','dt_resposta'], 'required'],
          [['comentarios_id','status_resposta'], 'integer'],
          [['comentarios_id'], 'exist', 'skipOnError' => false, 'targetClass' => Comentarios::className(), 'targetAttribute' => ['comentarios_id'=>'id']],
      ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',

            'comentarios_id' => 'Id do comentário',
            'resposta' => 'Resposta',
            'status_resposta' => 'Status',
            'dt_resposta' => 'Data de publicação',
        ];
    }


    public function SendInfoAdm()
    {

      $mail = \Yii::$app->SendMail;

      $administradores = $mail->getListMailTO('avaliar_comentarios');

      if($administradores)
			{
				// $mail->sendto       =$email['email'];
				$mail->from     = \Yii::$app->params['sys_mail'];
				$mail->layoutSend = '@app/mail/layouts/multiplos_mails';
				$mail->assunto  = 'Novo comentário';
				$mensagem   = '<p>Um usuário do site adicionou um nova resposta, e aguarda sua moderação</p>';
				$mensagem .= "<p><strong>Mensagem</strong></p>";
				$mensagem .= "<p>".\yii\helpers\Html::encode($this->resposta)."</p>";
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
		 * Limpa todas as ocorrencias vinculadas aos comentários, e por fim remove os comentários
		 * @param array $idDeletar - lista de ids de comentários para remocao
		 * @return mixed - retorna falso se não encontrar as ocorrencias, retorna uma lista descirminando a quantidade de removidos  delresp, delcomentarios
		 */
		public function clearVincules($idDeletar = [])
		{

			$respostas = Respostas::find()->joinWith(['hasuser'])->where(['in','{{%respostas}}.comentarios_id',$idDeletar])->all();

			$return = 0;
			foreach ($respostas as $k => $resposta) {

					$resposta->hasuser->delete();
					$resposta->delete();

				$return++;

			}

		    return $return;
		}



    public function admDeletar($idDeletar)
		{
			$del = 0;
			if(is_array($idDeletar)){
				$del = $this->clearVincules($idDeletar);
			}

			return $del;

		}

    /**
     * Salva e vincula respostas ao usuário do painel
     * @author André Luiz Pereira <andre@next4.com.br>
     * @return bool - retorna verdadeiro caso tenha registrado o comentário e atribuido ao usuário, ou valso e com log de registro caso contrário
     */
    public function SaveAndVicule()
    {
      $return = false;
      if($this->save())
      {

        $viculoUser = new RespostasHasUser;
        $viculoUser->respostas_id = $this->id;
        $viculoUser->user_id = \Yii::$app->user->identity->id;

        if($viculoUser->save())
        {
          $return = true;
        }else{
          \Yii::error('ocorreu um problema no salvar vinculo da resposta, não salvou o vinculo para usuário ['.(int)\Yii::$app->user->identity->id.']' ,'banco');
          $this->delete();
        }

      }else{ \Yii::error('erro ao tentar salvar o resposta no blog, postado por: ['.(int)\Yii::$app->user->identity->id.']' ,'banco');}

      return $return;
    }

    public function getConteudo()
    {
        return $this->hasOne(Conteudo::className(), ['id' => 'post_id'])->viaTable('{{%comentarios}}', ['id' => 'comentarios_id']);
    }

    public function getUser()
		{
				return $this->hasOne(\app\painel\models\User::className(), ['id' => 'user_id'])->viaTable('{{%respostas_has_user}}', ['respostas_id' => 'id']);
		}

    public function getHasusers()
		{
				return $this->hasMany(RespostasHasUser::className(), ['respostas_id' => 'id']);
		}

    public function getHasuser()
		{
				return $this->hasMany(RespostasHasUser::className(), ['respostas_id' => 'id']);
		}

    public function getComentario()
		{
				return $this->hasOne(Comentarios::className(), ['id' => 'comentarios_id']);
		}


    public function searchAdm($params)
    {

      $query = Respostas::find(); //->orderBy(['status_comentario'=>SORT_ASC,'dt_publicacao'=>SORT_ASC]);

			$dataProvider = new ActiveDataProvider([
            'query' => $query,
						'pagination' => [
				        'pageSize' => 30,
				    ],
						'sort' => [
				        'defaultOrder' => [
				            'status_resposta' => SORT_ASC,
										'dt_resposta' => SORT_DESC
				        ]
				    ]
        ]);

				return $dataProvider;

    }




}
