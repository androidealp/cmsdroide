<?php use yii\helpers\Url; ?>
<span class="text"><?=$model->logradouro?> - <?=$model->numero?>, <?=$model->bairro?>, <?=$model->cidade?> - <?=$model->estado?> </span>
<a href="#" class="pull-right btn btn-warning btn-xs" data-latlong='{"lat":"<?=$model->lat?>","long":"<?=$model->long?>"}'><i class="fa fa-eye"></i></a> 
