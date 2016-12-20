<?php
	use yii\helpers\Html;
?>

<!-- Departamentos -->
<div class="panel panel-default">
	<div class="panel-heading">
	  <h3 class="panel-title">Departamentos</h3>
	</div>

	<div class="panel-body-sidebar">
		 <ul>
			 <?php foreach ($categorias as $item) : ?>
			   <li>
			   		<?= Html::a($item->nome, ['blog/categorias', 'alias' => $item->alias], ['class' => 'category-link']) ?>
			   	</li>
			 <?php endforeach;  ?>
		 </ul>
	</div>
</div>
