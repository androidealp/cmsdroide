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

  public $list_category = [];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        $alias = \Yii::$app->params['alias_db'];
        return $alias.'conteudo';
    }


    public function Categorias(){
      $cats = CategoriasConteudo::find()->asArray()->all();

      return yii\helpers\ArrayHelper::map($cats, 'id', 'nome');
  }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categorias_conteudo_id', 'linguagem_id', 'status','destaque'], 'integer'],
            [['texto_completo', 'parametros_extra'], 'string'],
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
            'categorias_conteudo_id' => 'Categorias',
            'linguagem_id' => 'Linguagem',
            'status' => 'Status',
            'titulo' => 'Titulo',
            'alias' => 'Alias',
            'texto_introdutorio' => 'Texto Introdutorio',
            'texto_completo' => 'Texto Completo',
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
        return $this->hasOne(CategoriasConteudo::className(), ['id' => 'categorias_conteudo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinguagem()
    {
        return $this->hasOne(Linguagem::className(), ['id' => 'linguagem_id']);
    }

    public function searchByCat($id,$page=20)
    {
      $query = ConteudoSearch::find()->where(['categorias_conteudo_id'=>$id]);

      $dataProvider = new ActiveDataProvider([
          'query' => $query,
          'pagination' => [
              'pageSize' => $page,
          ],
      ]);

      return $dataProvider;

    }

    public function search($params){

        $query = ConteudoSearch::find();

        $this->list_category = $this->Categorias();

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
                ['categorias_conteudo_id'=>$this->categorias_conteudo_id] //22-12-2015

            ]
                        );

        return $dataProvider;
    }
}
