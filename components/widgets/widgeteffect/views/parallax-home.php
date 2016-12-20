<?php
use yii\helpers\Html;
use yii\helpers\Url;

$item = $data['items'][0];
$params = $data['params'];

$jsonPRepare =[
  'speed'=>$params['speed'],
  'textoposicao'=>$params['textoposicao'],
  'img'=>Url::to('@web/'.$item['image'])
];

$json = json_encode($jsonPRepare);


?>


<div  class="parallax-home bg-blue-grey-800 force-text-white" data-parallaxam='<?=$json?>'>
<div class="overlay-containerparalax">
  <div class="text-center text-midlle-center">
    <h1><?=$item['titulo']?><br />
      <?=$item['desc']?>
    </h1>
    <?php if ($item['texto_bt'] && $item['urlbt']): ?>
      <?php
        $url = $item['texto_bt'];
        $target = 1;
        if (stripos($item['urlbt'],'http') === false){
          $url = Url::to([$url]);
          $target = 0;
        }
      ?>
    <?php endif; ?>
    <a href="<?=$item['urlbt']?>" <?=($target)?'target="_blank"':''?> class="btn btn-lg btn-blue-grey-500"><?=$item['texto_bt']?>
    </a>
      
  </div>
</div>
</div>

