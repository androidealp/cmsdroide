<?php
	namespace app\models;
	use app\components\helpers\ModelHelper;
	use yii\data\ActiveDataProvider;
	use Yii;


class Comentarios extends ModelHelper
{



	public static function tableName()
    {
        return '{{%comentarios}}';
    }

    public function beforeValidate()
    {

			if(\Yii::$app->user->isGuest)
			{
				$this->addError('mensagem', 'Para você colocar algum comentário é necessário efetuar um login.');
			}

    $this->dt_publicacao = date('Y-m-d H:i:s');

        return parent::beforeValidate();
    }



	public function rules()
    {
        return [
            [['assunto', 'mensagem'], 'required'],
						[['assunto'],'string','max'=>45,'min'=>5],
						[['mensagem'],'string','max'=>1000,'min'=>10],
            [['post_id', 'status_comentario'], 'integer'],
						[['post_id'], 'exist', 'skipOnError' => false, 'targetClass' => Conteudo::className(), 'targetAttribute' => ['post_id'=>'id']],
        ];

    }

		/**
		 * Limpa todas as ocorrencias vinculadas aos comentários, e por fim remove os comentários
		 * @param array $idDeletar - lista de ids de comentários para remocao
		 * @return mixed - retorna falso se não encontrar as ocorrencias, retorna uma lista descirminando a quantidade de removidos  delresp, delcomentarios
		 */
		public function clearVincules($idDeletar = [])
		{
			$return = [];
			$comentarios = Comentarios::find()->joinWith(['hasuser'])->where(['in','{{%comentarios}}.id',$idDeletar])->all();
			$respostas = Respostas::find()->joinWith(['hasuser'])->where(['in','{{%respostas}}.comentarios_id',$idDeletar])->all();

			$delResp = 0;
			foreach ($respostas as $k => $resposta) {

					$resposta->hasuser->delete();
					$resposta->delete();

				$delResp++;

			}

			$delComentarios = 0;

			foreach ($comentarios as $k => $comentario) {
				$comentario->hasuser->delete();
				$comentario->delete();
				$delComentarios++;

			}


		 if($delResp){ $return['delresp'] = $delResp;   }

		 if($delComentarios){ $return['delcomentarios'] = $delComentarios;   }

		 return $return;
		}


		public function admDeletar($idDeletar)
		{
			$del = 0;
			if(is_array($idDeletar)){
				$del = $this->clearVincules($idDeletar);
					//$del = $this->deleteAll(['id'=>$idDeletar]);
			}

			return $del;

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
				$mensagem   = '<p>Um usuário do site adicionou um novo comentário, e aguarda sua moderação</p>';
				$mensagem .= "<p><strong>Mensagem</strong></p>";
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


		public function SaveHasUser()
		{
			$com_hasuser = new ComentariosHasUser;
			$com_hasuser->comentarios_id = $this->id;
			$com_hasuser->user_id = \Yii::$app->user->identity->id;

			return $com_hasuser->save();
		}


		public function getUser()
		{
				return $this->hasOne(\app\painel\models\User::className(), ['id' => 'user_id'])->viaTable('{{%comentarios_has_user}}', ['comentarios_id' => 'id']);
		}

		public function getRespostas()
		{
			return $this->hasMany(Respostas::className(), ['comentarios_id' => 'id']);
		}

		public function getHasusers()
		{
				return $this->hasMany(ComentariosHasUser::className(), ['comentarios_id' => 'id']);
		}

		public function getHasuser()
		{
				return $this->hasOne(ComentariosHasUser::className(), ['comentarios_id' => 'id']);
		}


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'assunto' => 'Assunto',
            'mensagem' => 'Deixe aqui seu comentário',
            'dt_publicacao' => 'Data de publicação',
            'post_id' => 'Post - ID',
            'status_comentario' => 'Status do comentário',
        ];
    }

		public function searchAdm($params)
		{

			$query = Comentarios::find()->joinWith(['user','respostas']); //->orderBy(['status_comentario'=>SORT_ASC,'dt_publicacao'=>SORT_ASC]);

			$dataProvider = new ActiveDataProvider([
            'query' => $query,
						'pagination' => [
				        'pageSize' => 30,
				    ],
						'sort' => [
				        'defaultOrder' => [
				            'status_comentario' => SORT_ASC,
										'dt_publicacao' => SORT_DESC
				        ]
				    ]
        ]);

				return $dataProvider;

		}


		public function search($post_id)
		{

			$query = Comentarios::find()
			->joinWith(['user'])
			->with(['respostas'=>function($q){
				return $q->where(['status_resposta'=>1]);
			}])
			->where(['post_id'=>$post_id,'status_comentario'=>1]);

			$dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

				return $dataProvider;

		}


}
