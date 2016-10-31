<div class="box-header with-border">
          <h3 class="box-title"><i class="<?=$icon;?>"></i> <?=$titulo;?></h3>
          <div class="box-tools pull-right">
            
                <?php if(isset($buttons)): ?>

                    <?php foreach ($buttons as $k => $button): ?>
                      <?=$button; ?>
                    <?php endforeach;?>

              <?php endif;?>
                
          </div>
        </div>