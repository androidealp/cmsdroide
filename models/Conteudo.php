<?php

namespace app\models;
use app\_adm\components\helpers\ModelHelper;
use yii\imagine\Image;
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
//class Conteudo extends \yii\db\ActiveRecord
class Conteudo extends ModelHelper
{

  public $image_intro_width =500;
  public $image_intro_height =360;
  public $image_content_width =860;
  public $image_content_height =500;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%conteudo}}';
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

    public function afterFind()
    {

      //verifico no nome do autor e id
      $this->checkAutorNome();

      if(isset($this->categoriaconteudo))
      {
        $categoria_params = $this->categoriaconteudo->parametros_extra;

        $image_intro = explode('|',$categoria_params['size_imagem_intro']);
        $image_content = explode('|',$categoria_params['size_imagem_content']);
        if(isset($image_intro[1]))
        {
          $this->image_intro_width =$image_intro[0];
          $this->image_intro_height =$image_intro[1];
        }

        if(isset($image_content[1]))
        {
          $this->image_content_width =$image_content[0];
          $this->image_content_height =$image_content[1];
        }


      }


      if(!$this->parametros_extra){
        //padrao pode ser extendido da categoria futuramente
        $this->parametros_extra = [
          'ativar_titulo'=>1,
          'ativar_comentario'=>1,
          'ativar_redes_sociais'=>1,
          'seo_keywords'=>'',
          'seo_description'=>''
        ];

      }else{
        $this->parametros_extra = json_decode($this->parametros_extra,true);
      }
      return parent::afterFind();
    }


    public function ListaAutores()
    {

      $users = \app\_adm\models\AdmUser::find()
          ->select(['id','nome'])
          ->asArray()
          ->all();

      return yii\helpers\ArrayHelper::map($users, 'id', 'nome');

    }

    /**
     * Contabiliza a quantidade de comentários ativos no sistema
     * @author André Luiz Pereira <andre@next4.com.br>
     * @return int - numero de comentários
     */
    public function countComentario()
    {
      $count = Comentarios::find()->where(['post_id'=>$this->id, 'status_comentario'=>1])->count();

      return $count;
    }






    public function afterValidate()
    {

      if($this->imagem_pre)
      {
        \app\components\helpers\Tools::ImagemProporcional($this->imagem_pre, $this->image_intro_width, $this->image_intro_height);

      }

      if($this->imagem_pos){
        \app\components\helpers\Tools::ImagemProporcional($this->imagem_pos, $this->image_content_width, $this->image_content_height);

      }

      return parent::afterValidate();
    }



    public function beforeValidate(){

        $this->dt_publicacao = date('Y-m-d H:i:s');
        if($this->parametros_extra)
        {
          $this->parametros_extra = json_encode($this->parametros_extra);
        }
        if(empty($this->alias)){
            $this->alias = \yii\helpers\BaseInflector::slug($this->titulo);
        }




        //verifico no nome do autor e id
        $this->checkAutorNome();



        if(Yii::$app->request->post('editor',0)){
            $postEditor = Yii::$app->request->post('editor',0);
            if(is_array($postEditor)){
                foreach ($postEditor as $k => $html) {
                   $this->conteudo_total .=  $html;
                }
            }else{
                $this->conteudo_total = trim($postEditor);
            }

        }

        return parent::beforeValidate();
    }


    public function checkAutorNome()
    {
      //Yii::$app->user->identity->id;

      $autor = \app\_adm\models\AdmUser::find()->select(['nome'])->where(['id'=>$this->id_autor])->one();

      if(!$autor)
      {
        $this->autor = Yii::$app->user->identity->nome;
        $this->id_autor = Yii::$app->user->identity->id;
      }else{
        $this->autor = $autor->nome;
      }

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

    public function ValidImagePre()
    {
      //instancio o ImageInterface para recuperar todos os recursos disponiveis
      $imagem = Image::getImagine();
      //abro a imagem desejada
      $imagem_pre = $imagem->open(\yii\helpers\Url::to('@webroot/'.$this->imagem_pre));
      //resgado as dimensoes
      $size = $imagem_pre->getSize();

      if($this->image_intro_width > $size->getWidth() || $this->image_intro_height > $size->getHeight())
      {
        return false;
      }

      return true;
    }

    public function ValidImagePos()
    {

      //instancio o ImageInterface para recuperar todos os recursos disponiveis
      $imagem = Image::getImagine();
      //abro a imagem desejada
      $imagem_pos = $imagem->open(\yii\helpers\Url::to('@webroot/'.$this->imagem_pos));
      //resgado as dimensoes
      $size = $imagem_pos->getSize();

      if($this->image_content_width > $size->getWidth() || $this->image_content_height > $size->getHeight())
      {
        return false;
      }

      return true;


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



    public function ListLanguage(){
        $langs = Linguagem::find()->asArray()->all();

        return yii\helpers\ArrayHelper::map($langs, 'id', 'nome');
    }

    public function getPublisher()
    {
        return $this->hasOne(\app\_adm\models\AdmUsuarios::className(), ['id' => 'id_autor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaconteudo()
    {
        return $this->hasOne(CategoriasConteudo::className(), ['id' => 'categorias_conteudo_id']);
    }

 /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinguagem()
    {
        return $this->hasOne(CsdmLinguagem::className(), ['id' => 'linguagem_id']);
    }


}
