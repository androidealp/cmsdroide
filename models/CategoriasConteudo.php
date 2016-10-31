<?php

namespace app\models;

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
class CategoriasConteudo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return '{{%categorias_conteudo}}';
    }


    public function beforeValidate(){

        $this->dt_criacao = date('Y-m-d H:i:s');
        $this->parametros_extra = '';
        if(empty($this->alias)){
            $this->alias = \yii\helpers\BaseInflector::slug($this->nome);
        }

        return parent::beforeValidate();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['linguagem_id', 'nome', 'dt_criacao'], 'required'],
            [['linguagem_id', 'status'], 'integer'],
            [['dt_criacao'], 'safe'],
            [['nome', 'alias', 'parametros_extra'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'linguagem_id' => 'Linguagem',
            'nome' => 'Nome da Categoria',
            'alias' => 'Alias',
            'dt_criacao' => 'Data Criacão',
            'status' => 'Publicar',
            'parametros_extra' => 'Parametros Extra',
        ];
    }

    public function admDeletar($registro){
        $del = 0;
        if(is_array($registro)){
            $del = $this->deleteAll(['id'=>$registro]);
        }

        return $del;

    }

    public function ListLanguage(){
        $langs = Linguagem::find()->asArray()->all();

        return yii\helpers\ArrayHelper::map($langs, 'id', 'nome');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinguagem()
    {
        return $this->hasOne(Linguagem::className(), ['id' => 'linguagem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsdmConteudos()
    {
        return $this->hasMany(Conteudo::className(), ['categorias_conteudo_id' => 'id']);
    }

    public function search($params){
        $query = CategoriasConteudo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'nome'=>$this->nome
            ]);

        return $dataProvider;
    }

}
