<?php

namespace app\models;
use yii\data\ActiveDataProvider;
use Yii;

/**
 * This is the model class for table "csdm_conteudo".
 *
 * @property integer $id
 * @property integer $categorias_conteudo_id
 * @property integer $linguagem_id
 * @property integer $status
 * @property string $titulo
 * @property string $alias
 * @property string $texto_introdutorio
 * @property string $conteudo_total
 * @property string $imagem_pre
 * @property string $imagem_pos
 * @property string $autor
 * @property string $parametros_extra
 * @property string $dt_publicacao
 *
 * @property CsdmCategoriasConteudo $categoriasConteudo
 * @property CsdmLinguagem $linguagem
 */
class ConteudoSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csdm_conteudo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categorias_conteudo_id', 'linguagem_id', 'status','destaque'], 'integer'],
            [['conteudo_total', 'parametros_extra'], 'string'],
            [['dt_publicacao'], 'safe'],
            [['titulo', 'alias'], 'string', 'max' => 70],
            [['texto_introdutorio'], 'string', 'max' => 250],
            [['imagem_pre', 'imagem_pos', 'autor'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categorias_conteudo_id' => 'Categorias Conteudo ID',
            'linguagem_id' => 'Linguagem ID',
            'status' => 'Status',
            'titulo' => 'Titulo',
            'alias' => 'Alias',
            'texto_introdutorio' => 'Texto Introdutorio',
            'conteudo_total' => 'Conteudo Total',
            'imagem_pre' => 'Imagem Pre',
            'imagem_pos' => 'Imagem Pos',
            'autor' => 'Autor',
            'parametros_extra' => 'Parametros Extra',
            'dt_publicacao' => 'Dt Publicacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriasConteudo()
    {
        return $this->hasOne(CsdmCategoriasConteudo::className(), ['id' => 'categorias_conteudo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinguagem()
    {
        return $this->hasOne(CsdmLinguagem::className(), ['id' => 'linguagem_id']);
    }

    public function search($params){
        $query = ConteudoSearch::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }



        $query->andFilterWhere(
            [
              'and',
                ['like','titulo',$this->titulo],
                ['status'=>$this->status],
                ['destaque'=>$this->destaque],
                ['date(dt_publicacao)'=>$this->dt_publicacao] //22-12-2015

            ]
                        );

        return $dataProvider;
    }
}
