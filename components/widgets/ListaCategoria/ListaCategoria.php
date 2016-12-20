<?php

namespace app\components\widgets\ListaCategoria;
use yii\base\Widget;
use app\models\CategoriasConteudo;

class ListaCategoria extends Widget{

  public $layout = 'default';
  public $model = '';
  public $itens = '';
  public $link = '';
  public $titulo = '';



  public function init(){
    parent::init();
  }

  public function run()
  {
    

    $categorias = CategoriasConteudo::find()
            ->where(['status' => 1, 'parent'=> 2])
            ->orderBy('dt_criacao')
            ->all();
 

  return $this->render($this->layout,[
        'categorias' => $categorias
    ]);
  }
}
