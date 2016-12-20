<?php
  use yii\helpers\Html;
 $mark = 'menu-item';

$controller = \Yii::$app->controller->id;
$action = \Yii::$app->controller->action->id;
  ?>
<ul class="sidebar-menu sm-bordered sm-active-item-bg sm-icons-block">

  <?php foreach ($datamenu as $k => $item): ?>
    <?php
    $class = '';

    if( $item['controller'] == $controller)
    {
      $class = 'active';
    }

     ?>
    <?php if(isset($item['items'])): ?>
      <li class="hasSubmenu dropdown <?=($class)?'open':''?>">
        <?=Html::a($item['label'],'#'.$mark.'-'.$k);  ?>
        <ul id="<?=$mark.'-'.$k?>" class="<?=($class)?'collapse in':''?>">
          <?php foreach ($item['items'] as $ks => $item_s): ?>
            <?php $class_s = '';

            if( $item_s['controller'] == $controller && $item_s['action'] == $action )
            {
              $class_s = 'active';

            }
             ?>
              <li class="<?=$class_s?>">
                <?=Html::a($item_s['label'],$item_s['url']);  ?>
              </li>
          <?php endforeach; ?>
        </ul>
      </li>
    <?php else: ?>
      <li class="<?=$class?>">
        <?=Html::a($item['label'],$item['url']);  ?>
      </li>
    <?php endif; ?>

  <?php endforeach; ?>
