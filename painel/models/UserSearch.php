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
        return 'csdm_user';
    }


    public function beforeValidate(){

            $this->dt_cadastro = \Yii::$app->formatter->asDate($this->dt_cadastro, 'php:Y-m-d'); 
            $this->dt_ult_acesso = \Yii::$app->formatter->asDate($this->dt_ult_acesso, 'php:Y-m-d'); 
        return parent::beforeValidate();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_acesso'], 'integer'],
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
            'status_acesso' => 'Acesso',
        ];
    }

  

    public function search($params){
        $query = User::find();

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
                ['date(dt_criacao)'=>$this->dt_cadastro], //22-12-2015
                ['date(dt_ult_acesso)'=>$this->dt_ult_acesso] //22-12-2015

            ]
                        );

        return $dataProvider;
    }

}
