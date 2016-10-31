<<<<<<< HEAD
<?php

namespace app\_adm\models;

use Yii;
use app\_adm\components\helpers\ModelHelper;

/**
 * Este model acessa a tabela "csdm_adm_config".
 *
 * @property integer $id
 * @property integer $host
 * @property string $username
 * @property string $password
 * @property string $port
 * @property integer $encryption
 * @property integer $key_remote_acccess
 */
class AdmConfig extends ModelHelper
{

  public $register_pass = '';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        
        return '{{%adm_config}}';
    }


    public function beforeSave($insert)
    {

      if(!empty($this->password))
      {
        $key =  \Yii::$app->params['secretEmailKey'];
        $this->password = utf8_encode(\Yii::$app->getSecurity()->encryptByPassword($this->password, $key));

      }else{
        $this->password = $this->register_pass;
      }

      return parent::beforeSave($insert);
    }

    /**
     * descrobre a senha do e-mail com base no key
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $data - senha encriptada, se não for passada considera que é um find da base e recupera direto do pass
     * @return string senha descoberta
     */
    public function decry($data = '')
    {
      $key = \Yii::$app->params['secretEmailKey'];
      if(!$data){
        $data = $this->password;
      }
      $quebrado = \Yii::$app->getSecurity()->decryptByPassword(utf8_decode($data),$key);
      return $quebrado;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'host', 'username', 'port', 'encryption', 'key_remote_acccess'], 'required'],
            [['id','port'], 'integer'],
            [['host'], 'string', 'max' => 50],
            [['username'], 'string', 'max' => 70],
            [['password','key_remote_acccess'], 'string', 'max' => 500],
            [['encryption'], 'string', 'max' => 7],
        ];
    }

    /**
     * metodos para criar o labels no formulário
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'host' => 'E-mail Host',
            'username' => 'Username',
            'password' => 'Senha',
            'port' => 'Porta',
            'encryption' => 'Encryption',
            'key_remote_acccess' => 'Key para acesso remoto',
        ];
    }
}
=======
<?php

namespace app\_adm\models;

use Yii;
use app\_adm\components\helpers\ModelHelper;

/**
 * Este model acessa a tabela "csdm_adm_config".
 *
 * @property integer $id
 * @property integer $host
 * @property string $username
 * @property string $password
 * @property string $port
 * @property integer $encryption
 * @property integer $key_remote_acccess
 */
class AdmConfig extends ModelHelper
{

  public $register_pass = '';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
      return '{{%adm_config}}';
    }


    public function beforeSave($insert)
    {

      if(!empty($this->password))
      {
        $key =  \Yii::$app->params['secretEmailKey'];
        $this->password = utf8_encode(\Yii::$app->getSecurity()->encryptByPassword($this->password, $key));

      }else{
        $this->password = $this->register_pass;
      }

      return parent::beforeSave($insert);
    }

    /**
     * descrobre a senha do e-mail com base no key
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param string $data - senha encriptada, se não for passada considera que é um find da base e recupera direto do pass
     * @return string senha descoberta
     */
    public function decry($data = '')
    {
      $key = \Yii::$app->params['secretEmailKey'];
      if(!$data){
        $data = $this->password;
      }
      $quebrado = \Yii::$app->getSecurity()->decryptByPassword(utf8_decode($data),$key);
      return $quebrado;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'host', 'username', 'port', 'encryption', 'key_remote_acccess'], 'required'],
            [['id','port'], 'integer'],
            [['host'], 'string', 'max' => 50],
            [['username'], 'string', 'max' => 70],
            [['password','key_remote_acccess'], 'string', 'max' => 500],
            [['encryption'], 'string', 'max' => 7],
        ];
    }

    /**
     * metodos para criar o labels no formulário
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'host' => 'E-mail Host',
            'username' => 'Username',
            'password' => 'Senha',
            'port' => 'Porta',
            'encryption' => 'Encryption',
            'key_remote_acccess' => 'Key para acesso remoto',
        ];
    }
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
