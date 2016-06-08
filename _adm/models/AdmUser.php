<?php

namespace app\_adm\models;

use Yii;
use app\_adm\components\helpers\ModelHelper;

/**
 * This is the model class for table "csdm_adm_user".
 *
 * @property integer $id
 * @property integer $grupos_id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property string $avatar
 * @property integer $status_acesso
 * @property string $parametros_extra
 * @property string $dt_cadastro
 * @property string $dt_ult_acesso
 *
 * @property CsdmAdmHashAcess[] $csdmAdmHashAcesses
 * @property CsdmAdmGrupos $grupos
 */
class AdmUser extends ModelHelper implements \yii\web\IdentityInterface
{

  const SCENARIO_LOGIN = 'login';
  const SCENARIO_CRIAR = 'criar';
  const SCENARIO_EDITAR = 'editar';

  public $AuthKey;
  public $list_group = [];
  public $redefinir_senha = '';
  public $real_data_criacao = '';
  public $real_data_acesso = '';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        $alias = \Yii::$app->params['alias_db'];
return $alias.'adm_user';
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_LOGIN] = ['email', 'senha','dt_ult_acesso','avatar'];
        $scenarios[self::SCENARIO_CRIAR] = ['id','grupos_id','cargo','nome', 'email', 'senha','redefinir_senha','status_acesso','parametros_extra','dt_cadastro','dt_ult_acesso','avatar'];
        $scenarios[self::SCENARIO_EDITAR] = ['id','grupos_id','cargo','nome', 'email', 'senha','redefinir_senha','status_acesso','parametros_extra','avatar'];
        return $scenarios;
    }

    public function GruposList(){
      $grupos = AdmGrupos::find()->asArray()->all();

      return yii\helpers\ArrayHelper::map($grupos, 'id', 'nome');
  }

    public function beforeValidate(){
      if($this->scenario == 'criar')
      {
          $this->dt_cadastro = date('Y-m-d H:i:s');
      }else{
        $this->dt_cadastro = $this->real_data_criacao;
        $this->dt_ult_acesso = $this->real_data_acesso;
      }


      return parent::beforeValidate();
    }

    public function afterValidate(){
      $hash = Yii::$app->getSecurity()->generatePasswordHash($this->senha);
      $this->senha = $hash;
      return parent::afterValidate();
    }



    public function afterFind(){

      $this->real_data_criacao = $this->dt_cadastro;
      $this->real_data_acesso = $this->dt_ult_acesso;

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
        return [
            [['grupos_id', 'nome', 'email', 'senha', 'status_acesso', 'dt_cadastro'], 'required', 'on' => self::SCENARIO_CRIAR],
            [['grupos_id', 'nome', 'email', 'senha', 'status_acesso'], 'required', 'on' => self::SCENARIO_EDITAR],
            [['email', 'senha'], 'required', 'on' => self::SCENARIO_LOGIN],
            [['grupos_id', 'status_acesso'], 'integer'],
            [['parametros_extra'], 'string'],
            [['dt_cadastro', 'dt_ult_acesso'], 'safe'],
            [['nome', 'senha','cargo'], 'string', 'max' => 100],
            ['senha','string','min'=>8,'message'=>"A senha deve ter no mínimo 8 caracteres"],
            [['email', 'avatar'], 'string', 'max' => 150],
            ['redefinir_senha', 'compare', 'compareAttribute'=>'senha', 'message'=>"Este campo precisa ser identico ao campo de senha" ],
        ];
    }


     public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'grupos_id'=>'Grupo',
            'nome' => 'Nome do usuário',
            'email' => 'E-mail',
            'dt_cadastro' => 'Data Criacão',
            'dt_ult_acesso'=>'último acesso',
            'status_acesso' => 'Acesso',
            'avatar' => 'Avatar',
            'redefinir_senha'=>'Redefinir senha',
            'cargo'=>'Cargo ocupacional'
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
        return Yii::$app->getSecurity()->validatePassword($password, $this->senha);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsdmAdmHashAcesses()
    {
        return $this->hasMany(AdmHashAcess::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasOne(AdmGrupos::className(), ['id' => 'grupos_id']);
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
                ->where(['email' => $username,'status_acesso'=>1])->one();
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
}
