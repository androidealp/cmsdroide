<?php

namespace app\painel\models;

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
class UserSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }


    public function beforeValidate(){

            $this->dt_cadastro = \Yii::$app->formatter->asDate($this->dt_cadastro, 'php:Y-m-d');
            $this->dt_ult_acesso = \Yii::$app->formatter->asDate($this->dt_ult_acesso, 'php:Y-m-d');
        return parent::beforeValidate();
    }

    public function getListStatusPrest()
    {
       $status = \app\models\StatusPrestador::find()->asArray()->all();

       return yii\helpers\ArrayHelper::map($status, 'id', 'nome');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_prestador_id'], 'integer'],
            [['dt_cadastro','dt_ult_acesso'], 'safe'],
            [['nome', 'senha'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome do usuário',
            'email' => 'E-mail',
            'dt_cadastro' => 'Data Criacão',
            'dt_ult_acesso'=>'último acesso',
            'status_prestador_id' => 'Status Prestador',
        ];
    }


    public function getstatusPrestador()
    {
        return $this->hasOne(\app\models\StatusPrestador::className(), ['id' => 'status_prestador_id']);
    }



    public function search($params){
        $query =$this->find()->with('statusPrestador');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $search_dt_cad = '';
        $search_dt_ult = '';
        if($params['UserSearch']['dt_cadastro'])
        {
          $search_dt_cad = $params['UserSearch']['dt_cadastro'];
        }else{
          $this->dt_cadastro = '';
        }

        if($params['UserSearch']['dt_ult_acesso'])
        {
          $search_dt_ult = $params['UserSearch']['dt_ult_acesso'];
        }else{
          $this->dt_ult_acesso = '';
        }



        $query->andFilterWhere(
            [
              'and',
                ['like','nome',$this->nome],
                ['email'=>$this->email],
                ['status_prestador_id'=>$this->status_prestador_id],
                ['date(dt_cadastro)'=>$search_dt_cad], //22-12-2015
                ['date(dt_ult_acesso)'=>$search_dt_ult] //22-12-2015

            ]
                        );

        return $dataProvider;
    }

}
