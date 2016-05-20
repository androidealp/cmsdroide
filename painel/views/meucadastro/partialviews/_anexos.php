<?php
use yii\helpers\Url;
 ?>
<div class="row">
  <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Arquivos Adicionados</h3>

          <div class="box-tools">
            <span class="label label-info pull-left"><?=count($docs_anexo)?></span>
          </div>
        </div>
        <div class="box-body" style="display: block;">
          <?php if(isset($return) && $return): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close btn btn-default btn-xs" data-dismiss="alert" aria-hidden="true">×</button>
                <?=$return; ?>
              </div>
          <?php endif; ?>
          <ul class="mailbox-attachments clearfix">
          <?php if($docs_anexo): ?>
            <?php foreach ($docs_anexo as $k => $doc): $id_file = md5($k); ?>
              <li>
                <div id="file-<?=$id_file;?>" class="mailbox-attachment-info">
                  <a  href="<?=$doc;?>" target="_blank" class="mailbox-attachment-name"><i class="fa fa-file-text-o text-info"></i> <?=basename($doc).PHP_EOL; ?></a>
                      <span class="mailbox-attachment-size">
                        Remover Arquivo <a href="#file-<?=$id_file;?>" data-removefile="<?=$k;?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-times-circle"></i></a>
                      </span>
                </div>
              </li>
            <?php endforeach; ?>
          <?php else: ?>
            <li><a href="#"><i class="fa fa-hand-o-down text-danger"></i> Não existe arquivos anexados nesta LPU</a></li>
          <?php endif; ?>
          </ul>
        </div>

        <!-- load -->
        <div id="load-file" class="overlay" style="display:none;">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
        <!-- fim load -->

        <!-- /.box-body -->
      </div>

    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('[data-removefile]').on('click',function(e){
      e.preventDefault();
      btdel = $(this);

      boxfile = btdel.attr('href');
      idfile = btdel.data('removefile');


        $.ajax({
          url:'<?=Url::to(['lpus/ajaxdeletaranexo']);?>',
          data:{lpu:"<?=$model_id?>", arquivo:idfile},
          method:'POST',
          beforeSend:function(){
            $(boxfile).remove();
            $('#load-file').show();
          },
          success:function(data){
            $('#anexo-aplicados').html(data);
            $('#load-file').hide();

          }

        }); // fim do ajax

    });

  });
</script>
