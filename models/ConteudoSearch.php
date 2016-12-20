<?php

namespace app\models;
use yii\data\ActiveDataProvider;
use Yii;
use app\_adm\components\helpers\ModelHelper;

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
class ConteudoSearch extends ModelHelper
{

  public $list_category = [];
  public $list_autor = [];
  public $list_destaque = [0=>'<i class="fa fa-star-o text-center block"></i>',1=>'<i class="fa fa-star text-warning text-center block"></i>'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%conteudo}}';
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


    /**
     * @inheritdoc
     */
     public function rules()
     {
         return [
             [['categorias_conteudo_id', 'linguagem_id', 'titulo', 'conteudo_total', 'autor','dt_publicacao'], 'required'],
             [['categorias_conteudo_id', 'linguagem_id', 'status','destaque', 'id_autor','hits'], 'integer'],
             [['conteudo_total', 'parametros_extra'], 'string'],
             [['video_url'],'string','max'=>200],
             [['video_url'],'url', 'defaultScheme' => 'http','validSchemes'=>['http','https']],
             [['dt_publicacao','dt_criacao'], 'safe'],
             [['titulo', 'alias'], 'string', 'max' => 70],
             [['alias'],'unique'],
             [['texto_introdutorio'], 'string', 'max' => 250],
             [['imagem_pre', 'imagem_pos', 'autor'], 'string', 'max' => 100],
             [['imagem_pre', 'imagem_pos'], 'checkDimensions'],
         ];
     }


     public function checkDimensions($attribute, $params)
     {
       if($attribute == 'imagem_pre')
       {
         if(!$this->ValidImagePre()){
           $this->addError($attribute, 'As dimensões da imagem de introdução são inferiores ao do limite exigido');
         }

       }

       if($attribute == 'imagem_pos')
       {

         if(!$this->ValidImagePos()){
           $this->addError($attribute, 'As dimensões da imagem do conteúdo são inferiores ao do limite exigido');
         }

       }

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
             'destaque'=>'Destaque',
             'texto_introdutorio' => 'Texto Introdutorio',
             'conteudo_total' => 'Texto completo',
             'imagem_pre' => 'Imagem de introdução',
             'imagem_pos' => 'Imagem de conteúdo',
             'autor' => 'Autor',
             'parametros_extra' => 'Parametros Extra',
             'dt_publicacao' => 'Publicado em',
             'dt_criacao'=>'Data de criação',
             'video_url'=>'Url do vídeo',
             'hits'=>'Visualizações'
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

    public function ListaAutores()
    {

      $users = \app\_adm\models\AdmUser::find()
          ->select(['id','nome'])
          ->asArray()
          ->all();

      return yii\helpers\ArrayHelper::map($users, 'id', 'nome');

    }

    public function search($params){

        $query = ConteudoSearch::find();

        $this->list_category = $this->ListaCategorias();

        $this->list_autor = $this->ListaAutores();

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
                ['alias'=>$this->alias],
                ['destaque'=>$this->destaque],
                ['id_autor'=>$this->autor],
                ['categorias_conteudo_id'=>$this->categorias_conteudo_id] //22-12-2015

            ]
                        );

        return $dataProvider;
    }
}
