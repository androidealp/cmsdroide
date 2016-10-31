<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\base\Model;
class LoginMulti extends \app\components\helpers\ModelHelper implements \yii\web\IdentityInterface
{
    public $AuthKey;
    public static $indetificador = 'teste';
    public static $tables = [
      'model1'=>'ptyp_model',
      'model2'=>'ptyp_model'
    ];
    public static function tableName()
    {

      return self::getTable();

    }

    public static function  getTable()
    {
        $session = \Yii::$app->session;
        $table = '';
        if ($session->has('us_1511121') && isset(self::$tables[$session->get('us_1511121')])){
          $table =  self::$tables[$session->get('us_1511121')];
        }elseif(self::$indetificador != '' && isset(self::$tables[self::$indetificador])){
          $table = self::$tables[self::$indetificador];
        }

        if($table == ''){
          throw new \yii\web\HttpException(500, 'Um erro detectado e registrado para analise.');
          \Yii::error('Usuário ['.\Yii::$app->request->getUserIP().'] tentou modificar sessao de usuário em model LoginMulti' ,'banco');
        }

        return $table;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //password = senha do usuário
        // $this->senha = senha no banco que está criptografada
        return \Yii::$app->getSecurity()->validatePassword($password, $this->senha);
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username , $identificador)
    {
        self::$indetificador = $identificador;
        if($identificador == 'aluno'){
          return static::find()
                  ->where(['email' => $username,'confirmado'=>1,'autoriza_acesso'=>1])->one();
        }else{
          return static::find()
                  ->where(['email' => $username,'status_acesso'=>1,'status_ative_email'=>1])->one();
        }

    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->AuthKey;
    }

    /**
     * Enviar emails para os futuros usuários
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param array $mailAlunos -   $return = ['aluno_email'=>$modelAluno->email,'hash'=>$modelUserHasAlunos->hash_prova];
     * @return bool caso envio tenha ocorrido ou não
     */
    public function EmailProvaFree($mailAlunos)
    {

      $prova = \app\models\ProvaForm::getProvaSessao();

      $mounturl =  \yii\helpers\Url::toRoute('institucional/ativar-conta-prova?k='.$this->hash_ativacao, true);
	   $mail = \Yii::$app->SendMail;
      //$to = \Yii::$app->params['cadastro_adm_email'];
      $to = $this->email; // lista de usuários administradores que podem recever este email
      $from = \Yii::$app->params['sys_mail'];

      $mail = \Yii::$app->SendMail;
      $mail->sendto       =$to;
      $mail->from     = $from;
      $mail->assunto  = \Yii::t('site', 'Ativação de cadastro');
      $mail->titulo   = \Yii::t('site', 'Clique no link abaixo para fazer a ativação do seu cadastro.');

      if(isset($prova['form'])){
      $mail->data['Nome da prova'] = \yii\helpers\Html::encode($prova['form']['etapa_um']['nome_prova']);
      $mail->data['Descrição'] = \yii\helpers\Html::encode($prova['form']['etapa_um']['desc_prova']);
      }
      $link_ = \Yii::t('site', 'Clique neste link para ativar sua conta. ');
      $mail->data['Ativar minha conta'] = \yii\helpers\Html::a($link_,$mounturl);

      $envio = $mail->send();
      $enviosMultiplos = 0;
      if($envio && count($mailAlunos)>0)
      {
        $enviosMultiplos =  $this->sendAlunosProva($mail, $mailAlunos,$prova);
      }

      return ['envio_cadastro'=>$envio, 'multiplos'=>$enviosMultiplos];
    }

    // $ListSend $return = ['aluno_email'=>$modelAluno->email,'hash'=>$modelUserHasAlunos->hash_prova];
    public function sendAlunosProva($mail, $mailAlunos,$prova)
    {

      $mail->assunto  = \Yii::t('site', 'Confirmação Prova online') ;
      $mail->layoutSend = '@app/mail/layouts/multiplos_mail';
      $text = \Yii::t('site', 'O professor {professor} deseja que você participe da prova {prova}',[
        'professor'=>$this->nome,
        'prova'=>Html::encode($prova['form']['etapa_um']['nome_prova'])
      ]);
      $text_two =  \Yii::t('site', 'Mensagem do professor:');
      $mensagem = "<p>{$text}</p>";
      $mensagem .= "<b>{$text_two}</b>";
      $mensagem .= "<p>".Html::encode($prova['form']['etapa_cinco']['texto_email'])."</p>";
      $text_three = \Yii::t('site', 'Acesse no link abaixo para aceitar o professor {professor}',[
        'professor'=>Html::encode($this->nome)
      ]);
      $mensagem .= "<p>{$text_three}</p>";
      $mounturlAluno =  \yii\helpers\Url::toRoute('institucional/validar-aluno-prova?k={hash}', true);
      $link_ = \Yii::t('site', 'Aceitar esta prova');
      $urlAlunoAtivador = Html::a($link_,$mounturlAluno);
      $mensagem .= $urlAlunoAtivador;

      return $mail->SendMultiples($mailAlunos, $mensagem);
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
       return $this->getAuthKey() === $authKey;
    }

    public function adminSearch($params){
        $query =User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }




        $query->andFilterWhere(
            [
              'and',
                ['like','nome',$this->nome],
                ['email'=>$this->email],
                ['status_acesso'=>$this->status_acesso],
                ['date(dt_cadastro)'=>$this->dt_cadastro], //22-12-2015
                ['date(dt_ult_acesso)'=>$this->dt_ult_acesso], //22-12-2015

            ]
                        );

        return $dataProvider;
    }

}
