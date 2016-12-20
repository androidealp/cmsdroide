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
class AdmUsuarios extends ModelHelper
{
  const SCENARIO_CRIAR = 'criar';
  const SCENARIO_EDITAR = 'editar';
  const SCENARIO_SENHA = 'senha';

  public $AuthKey;
  public $list_group = [];
  public $redefinir_senha = '';
  public $real_data_criacao = '';
  public $real_data_acesso = '';

  public $width_avatar = 200;
  public $height_avatar = 200;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adm_user}}';
    }

    /**
     * Controlo todos so scenarios
     * @author André Luiz Pereira <andre@next4.com.br>
     * @return array - retorna os scenarios formatados
     */
    public function getCustomScenarios()
    {

      return [
          self::SCENARIO_CRIAR      =>  ['grupos_id','cargo','nome', 'email', 'senha','redefinir_senha','status_acesso','dt_cadastro','avatar'],
          self::SCENARIO_EDITAR     =>  ['grupos_id','cargo','nome', 'email','status_acesso','avatar','descricao'],
          self::SCENARIO_SENHA      =>  ['senha','redefinir_senha'],
      ];

    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
      $scenarios = $this->getCustomScenarios();
      return $scenarios;
    }

    /**
     * Trata campos que não serão validados com requiridos
     * @author André Luiz Pereira <andre@next4.com.br>
     * @return array - retorna os scenarios formatados
     */
    public function TratarRequired()
    {

      $allscenarios = $this->getCustomScenarios();
      $allscenarios[self::SCENARIO_CRIAR] = array_diff($allscenarios[self::SCENARIO_CRIAR], ['avatar']);
      $allscenarios[self::SCENARIO_EDITAR] = array_diff($allscenarios[self::SCENARIO_EDITAR], ['avatar']);
      return $allscenarios;

    }

    public function EditarSenha($id)
    {

      $admin = $this->findOne($id);

      $admin->scenario = 'senha';

      $return = [
        'type'=>'error',
        'msg'=>'Usuário não existe'
      ];


      if($admin)
      {
        $admin->senha = \Yii::$app->request->post('senha');
        $admin->redefinir_senha = \Yii::$app->request->post('repete_senha');

        $TodosScenarios = $admin->getCustomScenarios();

        if($admin->save(true, $TodosScenarios['senha']))
        //if($admin->validate())
        {

          $return = [
            'type'=>'success',
            'msg'=>'Senha alterada com sucesso'
          ];

        }else{
          $return = [
            'type'=>'error',
            'msg'=>'Erros encontrados:'.$admin->TextErros()
          ];
        }

      }

      return $return;

    }

    public function GruposList(){

      $grupos = AdmGrupos::find()->asArray()->all();

      return yii\helpers\ArrayHelper::map($grupos, 'id', 'nome');
  }

  /**
   * @inheritdoc
   */
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

    /**
     * @inheritdoc
     */
    public function afterValidate(){
      if($this->scenario == 'criar' || $this->scenario == 'senha')
      {
        $hash = Yii::$app->getSecurity()->generatePasswordHash($this->senha);
        $this->senha = $hash;
      }

      if($this->avatar)
      {
        $this->resizeCheckImage($this->avatar,$this->width_avatar,$this->height_avatar);
      }

      return parent::afterValidate();
    }


    /**
     * @inheritdoc
     */
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
      $allscenarios = $this->TratarRequired();
        return [
            [$allscenarios[self::SCENARIO_CRIAR], 'required', 'on' => self::SCENARIO_CRIAR],
            [$allscenarios[self::SCENARIO_EDITAR], 'required', 'on' => self::SCENARIO_EDITAR],
            [$allscenarios[self::SCENARIO_SENHA], 'required', 'on' => self::SCENARIO_SENHA],
            [['grupos_id', 'status_acesso'], 'integer'],
            [['email'],'unique'],
            [['email'],'email'],
            [['parametros_extra'], 'string'],
            [['dt_cadastro', 'dt_ult_acesso'], 'safe'],
            [['nome', 'senha','cargo'], 'string', 'max' => 100],
            ['senha','string','min'=>8,'message'=>"A senha deve ter no mínimo 8 caracteres"],
            [['email', 'avatar'], 'string', 'max' => 150],
            [['descricao'],'string','max'=>250,'min'=>10],
            [['avatar'], 'ValidateDimensoes','params'=>['width'=>$this->width_avatar, 'height'=>$this->height_avatar]],
            ['redefinir_senha', 'compare', 'compareAttribute'=>'senha', 'message'=>"Redefinir a senha precisa ser identico ao campo de senha" ],
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
    public function getAdmHashAcesses()
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

}
