<?php
	use yii\helpers\Html;
	use app\components\helpers\Tools;

 ?>
<?php foreach ($noticias as $itens => $item) : ?>
	<article class="col-md-4">
		<div class="panel panel-default <?=$item_class ?>">
			  <div class="imagems">
					<?php if ($item->imagem_pre && $item->imagem_pre != "") : ?>
					  	<?=Html::a(Html::img('@web/'.$item->imagem_pre, ['class' => 'img-responsive']) , ['blog/blog-item', 'alias' => $item->alias]); ?>
					<?php else: ?>
						<?=Html::a(Html::img('@web/media/sistema/no-image.jpg', ['class' => 'img-responsive']) , ['blog/blog-item', 'alias' => $item->alias]); ?>
					<?php endif; ?>
			  </div>
			<div class="panel-body">
			  <h1 class="text-large"><?=$item->titulo; ?></h1>
					<p><small><strong>Categoria:</strong> <?=$item->categoriaconteudo->nome?></small></p>
				  <div class="content-artigo">
				    <p class="tagline">
						<?=$item->texto_introdutorio ?>
				  </div>
					<?= Html::a('Leia mais...', ['blog/blog-item', 'alias' =>$item->alias ], ['class' => 'pull-right']) ?>
				</div>
		</div>
	</article>
<?php endforeach; ?>
