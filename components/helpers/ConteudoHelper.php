<?php
namespace app\components\helpers;

use yii\base\Component;
use app\models\ConteudoSearch;
class ConteudoHelper extends Component
{

  public $tag_idioma = 'pt-br';


  public function init(){
      $this->tag_idioma = \Yii::$app->language;
    return parent::init();
  }

  public function getByLang($langid = ['pt-br'=>1,'en-US'=>2],$colunas = []){

    $id = isset($langid[$this->tag_idioma])?$langid[$this->tag_idioma]:0;
    $col = ($colunas)?$colunas:'*';

    $model = ConteudoSearch::find()->select($col)->where(['id'=>$id])->one();

    return $model;

  }

  public function getItem($id,$colunas = [])
  {
    $col = ($colunas)?$colunas:'*';
    $model = ConteudoSearch::find()->select($col)->where(['id'=>$id])->one();

    return $model;
  }


  public function getByLangItems($langid = ['pt-br'=>1,'en-US'=>2],$colunas = []){

    $id = isset($langid[$this->tag_idioma])?$langid[$this->tag_idioma]:0;
    $col = ($colunas)?$colunas:'*';

    $model = ConteudoSearch::find()->select($col)->where(['id'=>$id])->all();

    return $model;

  }

  public function getItems($ids = [],$colunas = [])
  {
    $col = ($colunas)?$colunas:'*';
    $model = ConteudoSearch::find()->select($col)->where(['in','id',$ids])->all();
    return true;
  }

  public function getBlogCategory($cat_id,$page)
  {
    return ConteudoSearch::searchByCat($cat_id,$page);
  }

}


 ?>
