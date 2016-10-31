<?php
namespace app\components\widgets\SelectLanguage;
use yii\base\Widget;
use yii\helpers\Html;
use Yii;

class SelectLanguage extends Widget{

public $languages = [
  'pt-br'=>'Portugues',
  'en-US'=>'English'
];

public $options =[
  'data-lang'=>''
];

public $lis = '';

public $selected = '';
public $url = '';
public function init(){
  if(!$this->url){
      $this->url = \yii\helpers\Url::to(['institucional/aplicar-linguagem']);
  }

  $this->selected = Html::img('@web/temas/next4-provaonline/img/icons/'.Yii::$app->language.'.png');
  foreach ($this->languages as $k => $language) {
      $img = Html::img('@web/temas/next4-provaonline/img/icons/'.$k.'.png');
      $title = \Yii::t('site', $language);
      $this->lis.="<li><a href='#' data-lang='{$k}' data-geturl='{$this->url}' >{$img} {$title}</a></li>";
  }
}

public function run(){

  return $this->htmlSet();


}


public function htmlSet()
{
  $html = <<<HTML
  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      {$this->selected}
     </a>
     <ul class="dropdown-menu">
       {$this->lis}
     </ul>
  </li>
HTML;

     return $html;


}



}
