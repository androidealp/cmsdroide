<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use app\_adm\components\helpers\ModelHelper;
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
class CategoriasConteudo extends ModelHelper
{

  public $conteudo_categoria = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return '{{%categorias_conteudo}}';
    }


    /**
     * Os meta descriptions são importantes para renderizar as páginas, este metodo cria o recurso com baso dos dados vindos do banco ou variavel setada
     * @param string $keywords - palavras chaves setadas manualmente caso não tenha no banco
     * @param tipo $description - descricao setadas manualmente caso não tenha no banco
     * @return void
     */
    public function SetSeo($keywords = 0, $description = 0)
    {

      if($keywords && $desc)
      {
        \Yii::$app->view->registerMetaTag([
         'keywords' =>$keywords,
         'description' => $description
         ]);
      }else{

        if(isset($this->parametros_extra['seo_keywords']) && isset($this->parametros_extra['seo_description']))
        {
          \Yii::$app->view->registerMetaTag([
           'keywords' =>$this->parametros_extra['seo_keywords'],
           'description' => $this->parametros_extra['seo_description']
           ]);

        }

      }

    }

    public function afterFind()
    {
      if(!$this->parametros_extra){
        //padrao pode ser extendido da categoria futuramente
        $this->parametros_extra = [
          'size_imagem_intro'=>'500|360',
          'size_imagem_content'=>'860|500',
          'seo_keywords'=>'',
          'seo_description'=>''
        ];

      }else{
       $this->parametros_extra = json_decode($this->parametros_extra,true);
      }
      //return parent::afterFind();
    }


    public function beforeValidate(){

        $this->dt_criacao = date('Y-m-d H:i:s');
        if($this->parametros_extra)
        {
          $this->parametros_extra = json_encode($this->parametros_extra);
        }
        if(empty($this->alias)){
            $this->alias = \yii\helpers\BaseInflector::slug($this->nome);
        }

        if(!$this->parent)
        {
          $this->parent = null;
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
            [['linguagem_id', 'status','parent', 'conteudo_categoria'], 'integer'],
            [['dt_criacao'], 'safe'],
            [['conteudo_categoria'], 'compare','compareValue'=>0],
            [['alias'],'unique'],
            [['nome', 'alias'], 'string', 'max' => 45],
            [['parametros_extra'],'string']
        ];
    }

    public function ListaCategoriasPais()
    {

      $cats = CategoriasConteudo::find()
          ->select(['id','nome'])
          ->where(['parent'=>null,'status'=>1])
          ->asArray()
          ->all();
          return yii\helpers\ArrayHelper::map($cats, 'id', 'nome');
    }

    public function ListaCategorias(){
      $cats = CategoriasConteudo::find()
          ->select(['id','nome', 'parent'])
          ->orderBy(['COALESCE(parent, id),parent is not null, id'=>SORT_ASC])
          ->asArray()
          ->all();
      foreach ($cats as $k => $cat) {
        if($cat['parent'])
        {
          $cats[$k]['nome'] = '>>>'.$cat['nome'];
        }
      }


      return yii\helpers\ArrayHelper::map($cats, 'id', 'nome');
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
            'parent'=>'Vinculado à',
            'conteudo_categoria'=>'Conteúdo da categoria'
        ];
    }

    /**
     * Verifica se existe conteúdo na categoria com base no id selecionado
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param array $registro - lista de ids de categorias para remocao ex: [1,2,3,4....]
     * @return bool - retorna falso se o conteudo existir
     */
    private function checkConteudos($registro)
    {
      //count_conteudo
      foreach ($registro as $k => $id) {
        $find = Conteudo::find()->select(['id'])->where(['categorias_conteudo_id'=>$id])->one();

        if($find)
        {
          $this->conteudo_categoria = $find->id;
          $this->addError('conteudo_categoria', 'Existe conteúdo de artigo vinculado em alguma categoria selecionada');
          return false;
        }
      }

      return true;
    }

    /**
     * Deleta todos as categorias listadas na variavem $registro, execeto as que tiverem conteúdo
     * @author André Luiz Pereira <andre@next4.com.br>
     * @param array $registro - lista de ids de categorias para remocao ex: [1,2,3,4....]
     * @return bool - retorna verdadeiro se teletado
     */
    public function admDeletar($registro){
        $del = 0;

        $ckeck = $this->checkConteudos($registro);

        if(is_array($registro) && $ckeck){
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

    public function CountArtigos()
    {
      $findCount = Conteudo::find()->where(['categorias_conteudo_id'=>$this->id])->count();
      return $findCount;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConteudos()
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
