<?php

namespace app\_adm\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "csdm_categorias_conteudo".
 *
 * @property integer $id
 * @property integer $linguagem_id
 * @property string $nome
 * @property string $alias
 * @property string $dt_criacao
 * @property integer $status
 * @property string $parametros_extra
 *
 * @property CsdmLinguagem $linguagem
 * @property CsdmConteudo[] $csdmConteudos
 */
class AdmUserSearch extends \yii\db\ActiveRecord
{

  public $list_group = [];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csdm_adm_user';
    }


    public function beforeValidate(){

        //    $this->dt_cadastro = \Yii::$app->formatter->asDate($this->dt_cadastro, 'php:Y-m-d');
        //    $this->dt_ult_acesso = \Yii::$app->formatter->asDate($this->dt_ult_acesso, 'php:Y-m-d');
        return parent::beforeValidate();
    }

    public function GruposList(){
      $grupos = AdmGrupos::find()->asArray()->all();

      return yii\helpers\ArrayHelper::map($grupos, 'id', 'nome');
  }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grupos_id', 'status_acesso'], 'integer'],
            [['dt_cadastro','dt_ult_acesso'], 'safe'],
            [['nome', 'senha'], 'string', 'max' => 100],
            [['email', 'avatar'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
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
        ];
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



    public function ListGrupos(){
        $grupos = AdmGrupos::find()->asArray()->all();

        return yii\helpers\ArrayHelper::map($grupos, 'id', 'nome');
    }



    public function search($params){
        $query = AdmUserSearch::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->list_group = $this->GruposList();

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }



        $query->andFilterWhere(
            [
              'and',
                ['like','nome',$this->nome],
                ['email'=>$this->email],
                ['status_acesso'=>$this->status_acesso],
                ['grupos_id'=>$this->grupos_id],
                ['date(dt_cadastro)'=>$this->dt_cadastro], //22-12-2015
                ['date(dt_ult_acesso)'=>$this->dt_ult_acesso] //22-12-2015

            ]
                        );

        return $dataProvider;
    }

}
