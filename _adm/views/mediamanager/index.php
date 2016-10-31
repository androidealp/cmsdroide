<?php

use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;

echo ElFinder::widget([
    //'language'         => 'ru',
    'controller'       => '_adm/elfinder', // вставляем название контроллера, по умолчанию равен elfinder
    'path' => 'media/',
    'filter'           => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
    //'callbackFunction' => new JsExpression('function(file, id){}') // id - id виджета
    'frameOptions'=>['style'=>'width:100%; height:500px']
]);
?>
