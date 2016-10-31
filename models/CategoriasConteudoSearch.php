<<<<<<< HEAD
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
class CategoriasConteudoSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
      return '{{%categorias_conteudo}}';
    }


    public function beforeValidate(){

            $this->dt_criacao = \Yii::$app->formatter->asDate($this->dt_criacao, 'php:Y-m-d');
        return parent::beforeValidate();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['linguagem_id', 'status'], 'integer'],
            [['dt_criacao'], 'safe'],
            [['nome', 'alias'], 'string', 'max' => 45]
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
        ];
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



        $query->andFilterWhere(
            [
              'and',
                ['like','nome',$this->nome],
                ['linguagem_id'=>$this->linguagem_id],
                ['status'=>$this->status],
                ['date(dt_criacao)'=>$this->dt_criacao] //22-12-2015

            ]
                        );

        return $dataProvider;
    }

}
=======
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
class CategoriasConteudoSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categorias_conteudo}}';
    }


    public function beforeValidate(){

            $this->dt_criacao = \Yii::$app->formatter->asDate($this->dt_criacao, 'php:Y-m-d');
        return parent::beforeValidate();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['linguagem_id', 'status'], 'integer'],
            [['dt_criacao'], 'safe'],
            [['nome', 'alias'], 'string', 'max' => 45]
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
        ];
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



        $query->andFilterWhere(
            [
              'and',
                ['like','nome',$this->nome],
                ['linguagem_id'=>$this->linguagem_id],
                ['status'=>$this->status],
                ['date(dt_criacao)'=>$this->dt_criacao] //22-12-2015

            ]
                        );

        return $dataProvider;
    }

}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
