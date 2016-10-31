<?php use yii\helpers\Url; ?>
<span class="text"><?=$model->logradouro?> - <?=$model->numero?>, <?=$model->bairro?>, <?=$model->cidade?> - <?=$model->estado?> </span>
   <a href="#"  class="label label-primary" data-latlong='{"lat":"<?=$model->lat?>","long":"<?=$model->long?>"}'><i class="fa fa-eye"></i> Ver </a>
<div class="tools">
   <a href="#" title="Editar endereço" data-btedturl="<?=Url::to(['/_adm/lpus/ajaxcriarendereco','lpu'=>$model->lpus_id,'id'=>$model->id]);?>" data-formid="form-enderecolpu" data-pajaxid="list-enderecos"><i class="fa fa-edit"></i></a>
    <a href="<?=Url::to(['/_adm/lpus/ajaxdelendereco','id'=>$model->id]);?>" data-pajaxid="0" data-viewdel="Deseja realmente deletar o endereço <?=$model->logradouro?>?"><i class="fa fa-trash-o text-danger"></i></a>
 </div>
