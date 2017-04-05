<?php
  use yii\helpers\Html;
 $mark = 'menu-item';

$controller = \Yii::$app->controller->id;
$action = \Yii::$app->controller->action->id;
  ?>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <?php foreach ($datamenu as $k => $item): ?>

        <?php $class = '';

            if( $item['controller'] == $controller)
            {
              $class = 'active';
            }

        ?>
        <li class="<?=($class)?$class:''?>">
          <?php if(isset($item['items'])): ?>
              
                <?=Html::a($item['label'],'#'.$mark.'-'.$k);  ?>
                <ul class="nav child_menu">
                  <?php foreach ($item['items'] as $ks => $item_s): ?>
                    <?php $class_s = '';

                    if( $item_s['controller'] == $controller && $item_s['action'] == $action )
                    {
                      $class_s = 'current-page';

                    }
                     ?>
                      <li class="<?=$class_s?>">
                        <?=Html::a($item_s['label'],$item_s['url']);  ?>
                      </li>
                  <?php endforeach; ?>
                </ul>
              
          <?php else: ?>
              
               <?=Html::a($item['label'],$item['url']);  ?>
              
          <?php endif; ?>
        </li>

      <?php endforeach; ?>              
    </ul>
  </div>
</div>
