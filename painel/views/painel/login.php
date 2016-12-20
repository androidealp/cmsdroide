<style type="text/css">
  .bg_login{
    background: rgba(255,255,255,1);
background: -moz-linear-gradient(-45deg, rgba(255,255,255,1) 0%, rgba(247,247,247,1) 41%, rgba(238,235,235,1) 97%, rgba(237,234,234,1) 100%);
background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(41%, rgba(247,247,247,1)), color-stop(97%, rgba(238,235,235,1)), color-stop(100%, rgba(237,234,234,1)));
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,1) 0%, rgba(247,247,247,1) 41%, rgba(238,235,235,1) 97%, rgba(237,234,234,1) 100%);
background: -o-linear-gradient(-45deg, rgba(255,255,255,1) 0%, rgba(247,247,247,1) 41%, rgba(238,235,235,1) 97%, rgba(237,234,234,1) 100%);
background: -ms-linear-gradient(-45deg, rgba(255,255,255,1) 0%, rgba(247,247,247,1) 41%, rgba(238,235,235,1) 97%, rgba(237,234,234,1) 100%);
background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(247,247,247,1) 41%, rgba(238,235,235,1) 97%, rgba(237,234,234,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#edeaea', GradientType=1 );

position: relative;
height: 100%;
  }

</style>

<div class="bg_login">
<div class="container">  
      <div class="col-md-6 col-md-offset-3">
         <div class="panel panel-default" style="position: relative; margin-top: 10%">
            <div class="panel-heading">
               <h3 class="text-center">Efetuar login</h3>
            </div>
            <div class="panel-body">
               <?=\app\components\widgets\Login\Login::widget(['layout'=>'loginpainel','enable'=>1]);?>
            </div>
         </div>
      </div>
   </div>
</div>