<?php

namespace app\_adm\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $tentativas = 0;
    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],

            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }


    public function HtmlErros(){
    $mderros = $this->getErrors();
    $li = array();
    foreach ($mderros as $k => $mderro) {
    	foreach ($mderro as $c => $erro) {
    		$li[] = $erro;
    	}
    }

    $ul = \yii\helpers\BaseHtml::ul($li,[
    	'class'=>'list-unstyled',
    	'item'=>function($item, $index){
    		return "<li><span class='label text-danger margin-right'><i class='fa fa-exclamation-triangle'></i></span> ".$item."</li>";
    	}
    	]);

    return $ul;
    }

    public function HasErros()
    {
    	$mderros = $this->getErrors();
    	if(count($mderros))
    	{
    	 return true;
    	}

    	return false;
    }


    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {

                if($this->checkAcessoIp(3))
                {
                  $tentativas = 3 - $this->tentativas;
                    $this->addError($attribute, 'Senha ou usuário incorreto você possui '.$tentativas.' tentativas.');
                }else{
                  $this->addError($attribute, 'Você atingiu o limite de tentativas para acessar a conta');
                }


            }
        }
    }

    /**
     * Bloqueia o ip do visitante e envia um alerta para administrador
     * Atenção precisa testar o envio, ainda nao está funcional
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param array $sessao - itens captados na sessao ip, nome de usuário, quantidade de acessos padroa 3
     * @return tipo - desc
     */
    public function contactAdm($sessao)
    {
      $unicoregistro = strtotime(date('Y-m-d H:i:s'));
      $hash_validar = $unicoregistro.''.\Yii::$app->getSecurity()->generateRandomString();
      $dados = [
        'ip'=>\yii\helpers\Html::encode($sessao['ip']),
        'campo_login'=> \yii\helpers\Html::encode($sessao['username'])
      ];

    $insertblock = \Yii::$app->db->createCommand()->insert('{{%ip_bloqueado}}', [
        'ip' => $dados['ip'],
        'campo_login'=> $dados['campo_login'],
        'hash_desative'=>$hash_validar
      ]
      )->execute();

      if(!$insertblock)
      {

        \Yii::error('Não foi possível inserir o bloqueio no banco para ip: '.$dados['ip'].' com a tentativa de acesso de :'.$dados['campo_login'] ,'acesso');

      }

      $this->SendMailAcesso($hash_validar, $dados);
    }


    /**
     * Envia um email de alerta para todos os administradores
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $hash_validar - hash parra validar a ativacao
     * @param array $dados - dados do envio
     * @return bool - true false
     */
    private function SendMailAcesso($hash_validar, $dados)
    {
      $Ip = \yii\helpers\Html::encode($dados['ip']);
      $login_user = \yii\helpers\Html::encode($dados['campo_login']);

      $mounturl =  \yii\helpers\Url::toRoute('painel/validar-email-adm?k='.$hash_validar, true);
      $Administrators = [];

 	    $mail = \Yii::$app->SendMail;

      $emaisSend = $mail->getListMailTO('alertas_sistema');

      foreach ($emaisSend as $k => $g_email) {
        $Administrators[] = ['email'=>$g_email];
      }

      $mail->from     = \Yii::$app->params['sys_mail'];

      $mail->assunto  = 'Tentativa de acesso Administrativo';
      $mail->layoutSend = '@app/mail/layouts/multiplos_mails';

      $mensagem = "<p>Foi detectado muitas tentativas de acesso no endereco de ip {$Ip}</p>";
      $mensagem .= "<p>O usuário tentou usar as credenciais de acesso {$login_user}</p>";
      $mensagem .= "<p>Caso este usuário seja você, acesse o link abaixo para remoção do bloqueio.</p>";
      $mensagem .= \yii\helpers\Html::a('Desbloquear tentativa',$mounturl);
      $mensagem .= "<p>Atenção esta ação não modificará sua senha, contacte um administrador que possa mudar sua senha.</p>";
      //listaemails = ['email'=>$modelAluno->email,'aluno_email'=>$modelAluno->email,'hash'=>$modelUserHasAlunos->hash_prova]
      return $mail->SendMultiples($Administrators, $mensagem);

    }

    public function getAdministratorsMail()
    {
      $models = AdmUser::find()->select(['email'])->where(['status_acesso'=>1])->asArray()->all();
      return $models;
    }

    public function checkAcessoIp($tentativas)
    {

      $return = false;

       $getsessao = $this->sesssionIp();

       if($getsessao['tentativa'] < $tentativas)
       {
         $getsessao['tentativa']++;

         $this->tentativas = $getsessao['tentativa'];
         $getsessao['username'] = \yii\helpers\Html::encode($this->username);

         $this->setSessaoIp($getsessao);
         $return = true;
       }else{
         $this->contactAdm($getsessao);
       }

       return $return;
    }

    private function setSessaoIp($dados)
    {
      $session = \Yii::$app->session;
        $session->set('acessoip', $dados);
    }

    public function sesssionIp()
    {
      $session = \Yii::$app->session;
      $sessaodados = [
        'ip'=>\Yii::$app->request->getUserIP(),
        'tentativa'=>0,
        'username'=> \yii\helpers\Html::encode($this->username),
      ];
      if ($session->has('acessoip'))
      {
        $sessaodados = $session->get('acessoip');
      }

      return $sessaodados;

    }

    public function deleteSessaoIp()
    {
      $session = \Yii::$app->session;
      if ($session->has('acessoip'))
      {
        $session->remove('acessoip');
      }

    }




    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {

          $user = $this->getUser();

          $this->deleteSessaoIp();

          \Yii::$app->db->createCommand()->update('{{%user}}', ['dt_ult_acesso' => date('Y-m-d H:i:s')],
          ['id'=>$user->id]
          )->execute();

            return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = AdmUser::findByUsername($this->username);
        }

        return $this->_user;
    }
}
