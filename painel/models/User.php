<?php

namespace app\painel\models;

use Yii;

/**
 * model "csdm_user" Altentica e cria usuários prestadores.
 *
 * @property string $id
 * @property string $nome
 * @property string $perfil_id
 * @property string $email
 * @property string $senha
 * @property integer $status_user_id
 * @property string $status_conf_email
 * @property string $hash_mail
 * @property string $dt_cadastro
 * @property string $dt_ult_acesso
 * @property string $parametros_extra
 *
 */
class User extends \app\components\helpers\ModelHelper implements \yii\web\IdentityInterface
{
    public $AuthKey;
    public $redefinir_senha;
    public $real_data_criacao = '';
    public $real_data_acesso = '';

    const SCENARIO_RESET_EMAIL = 'reset_email';
    const SCENARIO_RESET_PASS = 'reset_pass';
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_CRIAR = 'criar';
    const SCENARIO_EDITAR = 'editar';
    CONST SCENARIO_VALIDAR_MAIL = 'validar_email';


    const SCENARIO_ADMCRIAR = 'admcriar';
    const SCENARIO_ADMEDITAR = 'admeditar';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return '{{%user}}';
    }

    public function getCustomScenarios()
    {
      return [
          self::SCENARIO_RESET_EMAIL =>     ['email','hash_mail'],
          self::SCENARIO_VALIDAR_MAIL =>    ['hash_mail','status_conf_email'],
          self::SCENARIO_LOGIN =>           ['email', 'senha','dt_ult_acesso'],
          self::SCENARIO_CRIAR =>           ['nome','redefinir_senha', 'status_user_id', 'email', 'senha','dt_cadastro','hash_mail'],
          self::SCENARIO_EDITAR =>          ['nome','senha','redefinir_senha'],
          self::SCENARIO_RESET_PASS =>      ['senha','redefinir_senha','hash_mail'],
          self::SCENARIO_ADMCRIAR =>        ['nome','redefinir_senha', 'status_user_id', 'email', 'senha','dt_cadastro'],
          self::SCENARIO_ADMEDITAR =>       ['email','senha', 'redefinir_senha', 'status_user_id'],
      ];
    }

    public function scenarios()
    {
        $scenarios = $this->getCustomScenarios();
        return $scenarios;
    }

    public function getListStatusUser()
    {
       $status = \app\models\StatusUser::find()->asArray()->all();

       return yii\helpers\ArrayHelper::map($status, 'id', 'nome');
    }

    public function beforeValidate(){
      if($this->scenario == self::SCENARIO_CRIAR || $this->scenario == self::SCENARIO_ADMCRIAR )
      {
          $this->dt_cadastro = date('Y-m-d H:i:s');
          $this->status_user_id = 2;
          $this->perfil_id = 1;
          $this->dt_ult_acesso = '0000-00-00 00:00:00';
          $unicoregistro = strtotime(date('Y-m-d H:i:s'));
          $this->hash_mail = $unicoregistro.''.\Yii::$app->getSecurity()->generateRandomString();
      }
      return parent::beforeValidate();
    }

    public function afterValidate(){
      if(!empty($this->redefinir_senha)){
        $hash = Yii::$app->getSecurity()->generatePasswordHash($this->senha);
        $this->senha = $hash;
      }else{
        $this->redefinir_senha = $this->senha;
      }
      return parent::afterValidate();
    }

    public function afterFind(){

      $this->real_data_criacao = $this->dt_cadastro;
      $this->real_data_acesso = $this->dt_ult_acesso;
      //$this->senha = '';
      //$this->redefinir_senha = '';

       $this->dt_cadastro = \Yii::$app->formatter->asDate($this->dt_cadastro, 'php:d/m/Y H:i:s');

       if($this->dt_ult_acesso != '' && $this->dt_ult_acesso != '0000-00-00 00:00:00'){
          $this->dt_ult_acesso = \Yii::$app->formatter->asDate($this->dt_ult_acesso, 'php:d/m/Y H:i:s');
       }else{
         $this->dt_ult_acesso = 'Nunca acessou';
       }
      return parent::afterFind();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $allscenarios = $this->getCustomScenarios();
        return [
                [$allscenarios[self::SCENARIO_CRIAR], 'required', 'on' => self::SCENARIO_CRIAR],
                [$allscenarios[self::SCENARIO_ADMCRIAR], 'required', 'on' => self::SCENARIO_ADMCRIAR],
                [$allscenarios[self::SCENARIO_ADMEDITAR], 'required', 'on' => self::SCENARIO_ADMEDITAR],
                [$allscenarios[self::SCENARIO_LOGIN], 'required', 'on' => self::SCENARIO_LOGIN],
                [$allscenarios[self::SCENARIO_RESET_EMAIL], 'required', 'on' => self::SCENARIO_RESET_EMAIL],
                [['email'],'unique','message'=>'O e-mail informado existe no sistema, caso possua esta conta clique em esqueci minha senha para cadastrar uma nova senha.'],
                [['status_acesso'], 'integer'],
                [['email'],'email'],
                [['dt_cadastro', 'dt_ult_acesso'], 'safe'],
                [['senha'],'string','min'=>8,'message'=>'O campo mensagem precisa de no mínimo 8 caracteres'],
                [['nome','senha','redefinir_senha'], 'string', 'max' => 100],
                [['email'], 'string', 'max' => 150],
                ['redefinir_senha', 'compare', 'compareAttribute' => 'senha'],
        ];
    }

    /**
     * "labels para os atributos"
     * @author André Luiz Pereira <andre@next4.com.br>
     * @return Array - Relorna os labels
     */

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_user_id' => 'Status do Usuario',
            'nome' => 'Nome',
            'email' => 'E-mail',
            'senha' => 'Senha',
            'dt_ult_acesso'=>'Último acesso',
            'dt_cadastro' => 'Data Criacão',
            'redefinir_senha' => 'Confirmar Senha',

        ];
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
     * @return \yii\db\ActiveQuery
     */
    public function getuserCadastro()
    {
        return $this->hasMany(\app\painel\models\UserCadastro::className(), ['user_id' => 'id']);
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
    public static function findByUsername($username)
    {
        return static::find()
                ->where(['email' => $username,'status_user_id'=>1])->one();
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
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
       return $this->getAuthKey() === $authKey;
    }

    public function search($params)
    {
      $query = User::find();

      $dataProvider = new \yii\data\ActiveDataProvider([
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
              ['status_user_id'=>$this->status_user_id],
              ['date(dt_cadastro)'=>$this->dt_cadastro], //22-12-2015

          ]
                      );

      return $dataProvider;
    }

    public function EmailAtivar()
    {

     $mounturl =  \yii\helpers\Url::toRoute('institucional/ativar-conta?k='.$this->hash_mail, true);
     $mail = \Yii::$app->SendMail;
      $to = $this->email;
      $from = \Yii::$app->params['sys_mail'];
      $mail = \Yii::$app->SendMail;
      $mail->sendto       =$to;
      $mail->from     = $from;
      $mail->assunto  = 'Ativação de cadastro';
      $mail->titulo   = "Clique no link abaixo para fazer a ativação do seu cadastro.";

      $mail->data['Ativar minha conta'] = \yii\helpers\Html::a('Clique neste link para ativar sua conta. ',$mounturl);

      $envio = $mail->send();
      if($envio){
        return true;
      }else{
        return false;
      }
    }

}
