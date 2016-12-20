<?php

namespace app\painel\models;

use Yii;

/**
 * This is the model class for table "csdm_user_cadastro".
 *
 * @property string $id
 * @property string $user_id
 * @property string $genero
 * @property string $data_nascimento
 * @property string $telefones
 * @property string $cep
 * @property string $logradouro
 * @property string $cidade
 * @property string $estados_id
 *
 * @property xsdmlUser $user
 */
class UserCadastro extends \app\components\helpers\ModelHelper
{

  const SCENARIO_CRIAR = 'criar';
  const SCENARIO_EDITAR = 'editar';


  const SCENARIO_ADMCRIAR = 'admcriar';
  const SCENARIO_ADMEDITAR = 'admeditar';

  public $telefone_1 = '';
  public $telefone_2 = '';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_cadastro}}';
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_CRIAR]  = ['id','user_id','genero','data_nascimento', 'cep', 'logradouro','cidade', 'estados_id'];
        $scenarios[self::SCENARIO_EDITAR] = ['id','user_id','genero','data_nascimento','telefones', 'cep', 'logradouro','cidade', 'estados_id'];

        $scenarios[self::SCENARIO_ADMCRIAR]  = ['id','user_id','genero','data_nascimento', 'cep', 'logradouro','cidade', 'estados_id'];
        $scenarios[self::SCENARIO_ADMEDITAR] = ['id','user_id','genero','data_nascimento','telefones', 'cep', 'logradouro','cidade', 'estados_id'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','genero','data_nascimento','telefones', 'cep', 'logradouro','cidade', 'estados_id'], 'required', 'on' => self::SCENARIO_CRIAR],
            [[ 'user_id','genero','data_nascimento','telefones', 'cep', 'logradouro','cidade', 'estados_id'], 'required', 'on' => self::SCENARIO_EDITAR],
            [[ 'user_id','genero','data_nascimento','telefones', 'cep', 'logradouro','cidade', 'estados_id'], 'required', 'on' => self::SCENARIO_ADMCRIAR],
            [[ 'user_id','genero','data_nascimento','telefones', 'cep', 'logradouro','cidade', 'estados_id'], 'required', 'on' => self::SCENARIO_ADMEDITAR],
            [[ 'user_id'], 'integer'],
            [['telefones','telefone_2','telefone_1', 'logradouro'], 'string', 'max' => 100],
            [['cep'], 'string', 'max' => 45],
            [['cidade'], 'string', 'max' => 60]
        ];
    }

    // public function beforeSave($insert){
    //   if (parent::beforeSave($insert)) {
    //
    //     if($this->servicos &&  ($this->scenario == self::SCENARIO_EDITAR || $this->scenario == self::SCENARIO_ADMEDITAR)){
    //       $this->servicos = json_encode($this->servicos);
    //     }
    //     return true;
    //     } else {
    //     return false;
    //     }
    // }

    // public function beforeValidate(){
    //
    //   $telefones =[];
    //
    //   if($this->telefone_1){
    //     $telefones[] = $this->telefone_1;
    //   }
    //
    //   if($this->telefone_2){
    //     $telefones[] = $this->telefone_2;
    //   }
    //
    //   if($telefones){
    //     $this->telefones = implode(',',$telefones);
    //   }
    //
    //   return parent::beforeValidate();
    // }

    // public function afterFind(){
    //   $telefones =explode(',',$this->telefones);
    //   $this->telefone_1 = (isset($telefones[0]))?$telefones[0]:'';
    //   $this->telefone_2 = (isset($telefones[1]))?$telefones[1]:'';
    //
    //   if($this->servicos){
    //      $this->servicos = json_decode($this->servicos,true);
    //   }else{
    //     $this->servicos = [];
    //   }
    //
    //   return parent::afterFind();
    // }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'genero' => 'Genero',
            'data_nascimento' => 'Data de Nascimento',
            'telefones' => 'Telefone',
            'cep' => 'Cep',
            'logradouro' => 'Logradouro',
            'cidade' => 'Cidade',
            'estado_id' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
