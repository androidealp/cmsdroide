
<div class="box-header with-border">
          <h3 class="box-title"><i class="<?=$icon;?>"></i> <?=$titulo;?> widget</h3>
          <div class="box-tools pull-right">
            
                <?php if(isset($buttons)): ?>

                    <?php foreach ($buttons as $k => $button): ?>
                      <?=$button; ?>
                    <?php endforeach;?>

              <?php endif;?>
                
          </div>
        </div>


        <!-- <button type="button" class="btn btn-primary btn-sm" onClick="eModal.alert('TEste modal');" >
                  <i class="fa fa-plus"></i> Criar
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" onClick="eModal.alert('TEste modal');" >
                  <i class="fa fa-minus"></i> Deletar
                  </button> -->