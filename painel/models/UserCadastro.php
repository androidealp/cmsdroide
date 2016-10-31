<?php

namespace app\painel\models;

use Yii;

/**
 * This is the model class for table "csdm_user_cadastro".
 *
 * @property string $id
 * @property string $user_id
 * @property string $empresa
 * @property string $telefones
 * @property string $cpf
 * @property string $documentos
 * @property string $cep
 * @property string $logradouro
 * @property integer $numero
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property string $lat
 * @property string $long
 * @property string $descricao
 *
 * @property CsdmUser $user
 */
class UserCadastro extends \app\components\helpers\ModelHelper
{

  const SCENARIO_CRIAR = 'criar';
  const SCENARIO_EDITAR = 'editar';


  const SCENARIO_ADMCRIAR = 'admcriar';
  const SCENARIO_ADMEDITAR = 'admeditar';

  public $telefone_1 = '';
  public $telefone_2 = '';
  public $arq_uploads = '';

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

        $scenarios[self::SCENARIO_CRIAR] = ['id','user_id','descricao','empresa','telefones', 'servicos', 'telefone_1','telefone_2',  'inscricao_estadual', 'documentos' ,'arq_uploads','pessoa_contato','dt_cadastro','cep', 'logradouro', 'numero', 'bairro', 'cidade', 'estado'];
        $scenarios[self::SCENARIO_EDITAR] = ['id','user_id','empresa','descricao','telefones', 'servicos','telefone_1','telefone_2', 'inscricao_estadual', 'documentos', 'pessoa_contato','dt_cadastro','cep', 'logradouro', 'numero', 'bairro', 'cidade', 'estado'];

        $scenarios[self::SCENARIO_ADMCRIAR] = ['id','user_id','empresa','descricao','telefones', 'servicos','telefone_1','telefone_2', 'inscricao_estadual', 'pessoa_contato','dt_cadastro','cep', 'logradouro', 'numero', 'bairro', 'cidade', 'estado'];
        $scenarios[self::SCENARIO_ADMEDITAR] = ['id','user_id','empresa','telefones', 'descricao', 'servicos','telefone_1','telefone_2', 'inscricao_estadual', 'documentos', 'pessoa_contato','dt_cadastro','cep', 'logradouro', 'numero', 'bairro', 'cidade', 'estado'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'empresa', 'telefones','servicos','inscricao_estadual','arq_uploads','pessoa_contato','inscricao_estadual','logradouro', 'numero', 'bairro', 'cidade', 'estado'], 'required', 'on' => self::SCENARIO_CRIAR],
            [[ 'user_id', 'empresa', 'telefones','servicos','inscricao_estadual','pessoa_contato','cep','inscricao_estadual', 'logradouro', 'numero', 'bairro', 'cidade', 'estado'], 'required', 'on' => self::SCENARIO_EDITAR],
            [[ 'user_id', 'empresa', 'telefones','servicos','inscricao_estadual','pessoa_contato','cep','inscricao_estadual','logradouro', 'numero', 'bairro', 'cidade', 'estado'], 'required', 'on' => self::SCENARIO_ADMCRIAR],
              [[ 'user_id', 'empresa', 'telefones','servicos','inscricao_estadual','pessoa_contato','cep','inscricao_estadual', 'logradouro', 'numero', 'bairro', 'cidade', 'estado'], 'required', 'on' => self::SCENARIO_ADMEDITAR],
            [[ 'user_id', 'numero'], 'integer'],
            [['documentos', 'descricao'], 'string'],
            //[['documentos'],'file','skipOnEmpty'=>true,'extensions' =>'png,jpg,pdf','maxFiles'=>50],
            [['arq_uploads'],'file','skipOnEmpty'=>true,'extensions' =>'png,jpg,pdf','maxFiles'=>50],
            [['empresa', 'telefones','telefone_2','telefone_1', 'logradouro', 'lat', 'long'], 'string', 'max' => 100],
            [['cep'], 'string', 'max' => 45],
            [['bairro', 'cidade', 'estado'], 'string', 'max' => 60]
        ];
    }

    public function beforeSave($insert){
      if (parent::beforeSave($insert)) {

        if($this->servicos &&  ($this->scenario == self::SCENARIO_EDITAR || $this->scenario == self::SCENARIO_ADMEDITAR)){
          $this->servicos = json_encode($this->servicos);
        }
        return true;
        } else {
        return false;
        }
    }

    public function uploadFiles(){
      $documentos = array();
      $path_root = '@app/sys_tesb_media/user_docs/';
      if ($this->validate()) {
            foreach ($this->arq_uploads as $file) {
              // formado aceitavel para web.
              $nome = \yii\helpers\BaseInflector::slug($file->baseName);

              //verifico a quantidade de caracteres e removo o  excedente
              if(strlen($file->baseName) > 60){
                $nome = substr($file->baseName,0,60);
              }
              $nome_arq = rand(0,1000).'-'.$nome.'.'.$file->extension;
              //$path = Yii::getAlias('@app/sys_tesb_media/user_docs/'.$this->user_id.'_prestador/uploads/'.rand(0,1000).'-'.$nome.'.'.$file->extension);
              //$path = Yii::getAlias('@app/sys_tesb_media/user_docs/'.$this->user_id.'_prestador/uploads/'.rand(0,1000).'-'.$nome.'.'.$file->extension);
                $path = Yii::getAlias($path_root.'_prestador'.$this->user_id.'/');
                if (!is_dir($path)) {
                      mkdir($path);
                  }
                if($file->saveAs($path.$nome_arq)){
                    $documentos[] = $path_root.'_prestador'.$this->user_id.'/'.$nome_arq;
                }
            }
            if($documentos){
                $this->documentos = implode(',',$documentos);
                $this->arq_uploads = 'arquivos inseridos';
                return true;
            }else{
              return false;
            }


        } else {
            return false;
        }
    }

    public function beforeValidate(){

      $telefones =[];

      if($this->telefone_1){
        $telefones[] = $this->telefone_1;
      }

      if($this->telefone_2){
        $telefones[] = $this->telefone_2;
      }

      if($telefones){
        $this->telefones = implode(',',$telefones);
      }

      return parent::beforeValidate();
    }

    public function afterFind(){
      $telefones =explode(',',$this->telefones);
      $this->telefone_1 = (isset($telefones[0]))?$telefones[0]:'';
      $this->telefone_2 = (isset($telefones[1]))?$telefones[1]:'';

      if($this->servicos){
         $this->servicos = json_decode($this->servicos,true);
      }else{
        $this->servicos = [];
      }

      return parent::afterFind();
    }

    public function EstadoList(){
      $estados =  \app\models\Estados::find()->asArray()->all();
      return yii\helpers\ArrayHelper::map($estados, 'nome', 'nome');
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'empresa' => 'Empresa',
            'telefones' => 'Telefones',
            'inscricao_estadual' => 'Inscrição estadual',
            'documentos' => 'Documentos',
            'arq_uploads'=>'Documentos para download',
            'cep' => 'Cep',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'lat' => 'Latitude',
            'long' => 'Longitude',
            'descricao' => 'Descricao',
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
