<?php

namespace app\painel\models;

use Yii;

/**
 * This is the model class for table "csdm_user".
 *
 * @property string $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property integer $status_acesso
 * @property string $parametros
 * @property string $dt_cadastro
 * @property string $dt_ult_acesso
 *
 * @property CsdmHashAcess[] $csdmHashAcesses
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $AuthKey;
    public $repete_senha;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csdm_user';
    }
    
    public function beforeSave($insert) {
        
        $hash = Yii::$app->getSecurity()->generatePasswordHash($this->senha);

        $this->senha = $hash;
        
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'senha', 'status_acesso', 'parametros', 'dt_cadastro', 'dt_ult_acesso'], 'required'],
            [['status_acesso'], 'integer'],
            [['dt_cadastro', 'dt_ult_acesso'], 'safe'],
            [['nome', 'senha', 'parametros'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 150],
            ['repete_senha', 'compare', 'compareAttribute' => 'senha'],
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
    public function getCsdmHashAcesses()
    {
        return $this->hasMany(CsdmHashAcess::className(), ['user_id' => 'id']);
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
