<?php
$widgets= $effects::$Filedata;
use \app\_adm\components\widgets\actionsbox\ActionsBox;

 ?>

 <div class="row">
   <div class="col-md-12">

     <?php if($effects::$editavel): ?>
       <div class="panel panel-success">
         <div class="panel-heading">
           <h3 class="panel-title">Widgeteffects.json</h3>
         </div>
         <div class="panel-body">
           <p class="text-success">O arquivo json é totalmente editável</p>
           <?=ActionsBox::widget(['buttons'=>[
              'custom'=>[
                  'text'=>'<span class="fa fa-edit"></span> Criar Efeito',
                  'params'=>[
                    'data-btedturl'=>'index.php?r=_adm/widgeteffects/criarelemento',
                    'data-formid'=>'form-themejson',
                    'data-pajaxid'=>'list-themes',
                    'class'=>'btn btn-block btn-info',
                    'title'=>'Criar elemento',
                  ]
              ]
           ]]); ?>
         </div>
       </div>
     <?php else:?>
       <div class="panel panel-danger">
         <div class="panel-heading">
           <h3 class="panel-title">Widgeteffects.json</h3>
         </div>
         <div class="panel-body">
           <p class="text-danger">
             O arquivo json não tem permissão de escrita
           </p>
         </div>
       </div>
     <?php endif; ?>
     <?php //$this->render('_tema_form',['modeljson'=>$modeljson]);?>
   </div>
 </div>


 <div class="row">


   <?php foreach ($widgets as $effect => $parans): ?>
     <?php $check = $effects::CheckEffect($effect); ?>
     <div class="col-lg-3 col-xs-6">
       <div class="small-box <?=($check)?'bg-red':'bg-aqua'?>">
         <div class="inner">
           <h4><?=$parans['title'] ?></h4>
            <?php if(!$check): ?>
           <p><?=$parans['desc'] ?></p>
         <?php else: ?>
           <p><?=implode('<br />',$check) ?></p>
         <?php endif; ?>
         </div>
         <div class="icon">
           <i class="<?=$parans['icon'] ?>"></i>
         </div>
         <?php if(!$check): ?>
         <a href="index.php?r=_adm/widgeteffects/effect&type=<?=$effect?>" class="small-box-footer">
           Acessar <i class="fa fa-arrow-circle-right"></i>
         </a>
       <?php endif; ?>
       <a href="index.php?r=_adm/widgeteffects/effectdelete&type=<?=$effect?>" class="small-box-footer bg-danger">
         Deletar <i class="fa fa-times-circle-o"></i>
       </a>
       </div>
     </div>
   <?php endforeach; ?>

       </div>
