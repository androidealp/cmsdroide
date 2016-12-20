<?php
namespace app\components\widgets\NoticiasBlog;
use yii\base\Widget;

 class NoticiasBlog extends Widget
 {

 public  $layout = 'default';
 public  $id_categoria = 0;
 public  $limit = 3;
 public  $order = 'dt_criacao desc';
 private $noticias = null;
 public  $item_class = null;

 public function init(){
 	$id_cat = $this->id_categoria;
 	$this->noticias = \app\models\Conteudo::find()
 	->joinWith(['categoriaconteudo'=>function($q)use($id_cat){
 		return $q->where([
      'and',
      'xsdml_categorias_conteudo.status'=>1,
        [
        'or',
          ['xsdml_categorias_conteudo.parent'=>$id_cat],
          ['xsdml_categorias_conteudo.id'=>$id_cat]
        ],
 			]);
 	}])
 	->where([
    'xsdml_conteudo.status'=>1,
    ])->limit($this->limit)->orderBy($this->order)->all();


    return parent::init();
  }

 public function run()
  {

    return  $this->render($this->layout,[
    	'noticias' => $this->noticias,
    	'item_class' => $this->item_class,

        ]);
    }
  }
