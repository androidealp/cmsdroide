<?php
use yii\helpers\Html;
use yii\helpers\Url;

$items = $data['items'];
$params = $data['params'];

$jsonPrepare =[
  //autoPlay : 3000,
  'lazyLoad' => true,
  'navigation' => true,
  'slideSpeed' => 300,
  'paginationSpeed' => 400,
  'singleItem' => true,
  'transitionStyle' => 'fade',
];

if($params['slide-auto'] == 1)
{
  $jsonPrepare['autoPlay'] = 5000;
}

if($params['navegacao'] == 0)
{
  $jsonPrepare['navigation'] = false;
}


$json = json_encode($jsonPrepare);

?>



<div data-owlcarousel='<?=$json;?>' class="owl-carousel owl-amormeu margin-for-topfixed">
  <?php foreach ($items as $k => $item): ?>
    <div class="item">
      <?php echo Html::img('',['class'=>'lazyOwl','data-src'=>Url::to('@web/'.$item['image'])]); ?>

      <?php if ($params['panel-text']): ?>
        <div class="content-owl-panel">
          <h2><?=$item['titulo']?></h2>
          <p class="text-large"><?=$item['desc']?></p>

          <?php if ($item['texto_bt'] && $item['urlbt']): ?>

            <?php
              $url = $item['texto_bt'];
              $target = 1;
              if (stripos($item['urlbt'],'http') === false){
                $url = Url::to([$url]);
                $target = 0;
              }
            ?>

            <a href="<?=$item['urlbt']?>" <?=($target)?'target="_blank"':''?> class="btn upper btn-lg btn-blue-grey-700 pull-right"><?=$item['texto_bt']?></a>
          <?php endif; ?>
        </div>
      <?php endif; ?>

    </div>
    <?php endforeach; ?>
</div>
