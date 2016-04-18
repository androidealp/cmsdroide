<?php
$editable = $effects::$editavel;

$ef_files = $effects::$Filedata;

 ?>
 <!-- {formulário} -->
 <div class="row">
   <div class="col-md-12">

     <?php if($editable): ?>
       <div class="panel panel-success">
         <div class="panel-heading">
           <h3 class="panel-title">frontend/WidgetEffects.json</h3>
         </div>
         <div class="panel-body">
           <p class="text-success">O arquivo json é totalmente editável</p>
         </div>
       </div>
     <?php else:?>
       <div class="panel panel-danger">
         <div class="panel-heading">
           <h3 class="panel-title">frontend/WidgetEffects.json</h3>
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
 <!-- {/formulário} -->


 <div class="row">
         <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-aqua">
             <div class="inner">
               <h3>150</h3>

               <p>New Orders</p>
             </div>
             <div class="icon">
               <i class="fa fa-shopping-cart"></i>
             </div>
             <a href="#" class="small-box-footer">
               More info <i class="fa fa-arrow-circle-right"></i>
             </a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-green">
             <div class="inner">
               <h3>53<sup style="font-size: 20px">%</sup></h3>

               <p>Bounce Rate</p>
             </div>
             <div class="icon">
               <i class="ion ion-stats-bars"></i>
             </div>
             <a href="#" class="small-box-footer">
               More info <i class="fa fa-arrow-circle-right"></i>
             </a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-yellow">
             <div class="inner">
               <h3>44</h3>

               <p>User Registrations</p>
             </div>
             <div class="icon">
               <i class="ion ion-person-add"></i>
             </div>
             <a href="#" class="small-box-footer">
               More info <i class="fa fa-arrow-circle-right"></i>
             </a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-red">
             <div class="inner">
               <h3>65</h3>

               <p>Unique Visitors</p>
             </div>
             <div class="icon">
               <i class="ion ion-pie-graph"></i>
             </div>
             <a href="#" class="small-box-footer">
               More info <i class="fa fa-arrow-circle-right"></i>
             </a>
           </div>
         </div>
         <!-- ./col -->
       </div>
