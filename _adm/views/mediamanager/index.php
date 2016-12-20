<?php
use \app\_adm\components\widgets\actionsbox\ActionsBox;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;
?>



<div class="page-section">
  <div class="row">
    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <?=ActionsBox::widget(['icon'=>'fa fa-camera-retro']); ?>
        </div>
      </div>

      <!-- <h4 class="page-section-heading">Responsive Table</h4> -->
      <div class="panel panel-default">
<?php
echo ElFinder::widget([
    //'language'         => 'ru',
    'controller'       => '_adm/elfinder', // вставляем название контроллера, по умолчанию равен elfinder
    'path' => 'media/',
    'filter'           => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
    //'callbackFunction' => new JsExpression('function(file, id){}') // id - id виджета
    'frameOptions'=>['style'=>'width:100%; height:500px']
]);
?>

</div>
<!-- table fim -->
</div>
<!-- alinhamento content -->
</div>
<!-- /row -->
</div>
<!-- /page-section -->
