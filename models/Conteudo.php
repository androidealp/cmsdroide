<?php

namespace app\models;
use app\_adm\components\helpers\ModelHelper;
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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%conteudo}}';
    }


    public function beforeValidate(){

        $this->dt_publicacao = date('Y-m-d H:i:s');
        $this->parametros_extra = '';
        $this->imagem_pre = '';
        $this->imagem_pos = '';

        if(empty($this->alias)){
            $this->alias = \yii\helpers\BaseInflector::slug($this->titulo);
        }

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categorias_conteudo_id', 'linguagem_id', 'titulo', 'conteudo_total', 'autor','dt_publicacao'], 'required'],
            [['categorias_conteudo_id', 'linguagem_id', 'status'], 'integer'],
            [['conteudo_total', 'parametros_extra'], 'string'],
            [['dt_publicacao','dt_criacao'], 'safe'],
            [['titulo', 'alias'], 'string', 'max' => 70],
            [['texto_introdutorio'], 'string', 'max' => 250],
            [['imagem_pre', 'imagem_pos', 'autor'], 'string', 'max' => 100]
        ];
    }

      public function Categorias(){
        $cats = CategoriasConteudo::find()->asArray()->all();

        return yii\helpers\ArrayHelper::map($cats, 'id', 'nome');
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
            'conteudo_total' => 'Texto completo',
            'imagem_pre' => 'Imagem de introdução',
            'imagem_pos' => 'Imagem de conteúdo',
            'autor' => 'Autor',
            'parametros_extra' => 'Parametros Extra',
            'dt_publicacao' => 'Publicado em',
            'dt_criacao'=>'Data de criação'
        ];
    }

    public function ListLanguage(){
        $langs = Linguagem::find()->asArray()->all();

        return yii\helpers\ArrayHelper::map($langs, 'id', 'nome');
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
}
