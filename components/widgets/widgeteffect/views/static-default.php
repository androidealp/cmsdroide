<?php
use yii\helpers\Html;
use yii\helpers\Url;

$item = $data['items'][0];
$params = $data['params'];


?>

<!-- Banner  -->
<div class="cover overlay cover-image-full" style="height: <?=$params['height_default']?>px;">
    <?=Html::img('@web/'.$item['image']) ?>
   <div class="overlay overlay-bg-black" style="top: 0;bottom: 0;height: 100%;">
      <div style="margin-top: <?=$params['height_default']/3?>px;">
        <div class="page-section text-center">
          <h1 class="margin-none text-overlay"><?=$item['titulo']?></h1>
          <p class="text-overlay"><?=$item['desc']?></p>
          <?php if ($item['texto_bt'] && $item['urlbt']): ?>
            <?php
              $url = $item['texto_bt'];
              $target = 1;
              if (stripos($item['urlbt'],'http') === false){
                $url = Url::to([$url]);
                $target = 0;
              }
            ?>
            <a href="<?=$item['urlbt']?>" <?=($target)?'target="_blank"':''?> class="btn btn-lg btn-blue-grey-500"><?=$item['texto_bt']?>
            </a>
          <?php endif; ?>
        </div>
      </div>
  </div>
</div>
<!-- Fim do banner  -->
