<?php
namespace app\components\helpers;

use yii\base\Component;
use app\models\ConteudoSearch;
class ConteudoHelper extends Component
{

  public $tag_idioma = 'pt-BR';


  public function getByLang($langid = ['pt-BR'=>1,'en'=>2],$colunas = []){

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
