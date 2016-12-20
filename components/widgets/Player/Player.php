<?php
namespace app\components\widgets\Player;
use yii\base\Widget;

 class Player extends Widget
 {

 public  $type = 'video'; // video mp3
public $media = '';
public $style = [
  'height'=>'500px',
  'width'=>'100%',
  'class'=>"embed-responsive-item"
];

private $urlPlayers = [
  'youtube'=>'//www.youtube.com/embed/',
  'vimeo'=>'//player.vimeo.com/video/',
];

 public function init(){

  $this->tratarVideo($this->media);


    return parent::init();
  }

 public function run()
  {
    $this->style['src'] = $this->media;
    return  $this->render($this->type,[
    	//'media' => $this->media,
      'style'=>$this->style
        ]);
  }


  private function tratarVideo($media)
  {
    $sanitize = trim($media);


    if(strpos($sanitize, 'youtube') !== false)
    {
      $this->Youtube($sanitize);
    }

    if(strpos($sanitize, 'vimeo') !== false)
    {
      $this->Vimeo($sanitize);
    }

  }

  private function Youtube($url)
  {
    parse_str( parse_url( $url, PHP_URL_QUERY ), $params );

    if(isset($params['v']))
    {
      $this->media = $this->urlPlayers['youtube'].$params['v'];
      $this->style['allowfullscreen'] = true;
      $this->style['frameborder']="0";
    }

  }

  private function Vimeo($url)
  {

    if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $url, $output_array)) {
      $this->media = $this->urlPlayers['vimeo'].$output_array[5].'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff';

      $this->style['webkitallowfullscreen'] = true;
      $this->style['mozallowfullscreen'] = true;
      $this->style['allowfullscreen'] = true;
    }


  }

}
