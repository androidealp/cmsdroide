
  <h3 class="box-title pull-left"><i class="<?=$icon;?>"></i> <?=$titulo;?></h3>
<?php if(isset($buttons)): ?>
  <div class="box-tools pull-right">
    <?php foreach ($buttons as $k => $button): ?>
      <?=$button; ?>
    <?php endforeach;?>
  </div>
<?php endif;?>
