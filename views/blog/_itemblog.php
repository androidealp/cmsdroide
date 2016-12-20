<?php
  use yii\helpers\Html;
  use yii\helpers\Url;
    $url_item = Url::toRoute(['blog/blog-item', 'alias'=> $model->alias], true);

    $count_coment = $model->countComentario();
 ?>


	<div class="panel panel-default blog-am defaul-size-item">
		<div class="post-thumbnail">

		    <?php if (isset($model->imagem_pre )&& $model->imagem_pre != "") : ?>
		   		<?=Html::a(Html::img('@web/'.$model->imagem_pre, ['alt'=>$model->titulo], ['class' => 'thumbnail img-responsive']) , ['blog/blog-item', 'alias' => $model->alias]) ?>
		    <?php else : ?>
				<?=Html::a(Html::img('@web/media/sistema/no-image.jpg',['alt'=>$model->titulo] , ['class' => 'thumbnail img-responsive']) , ['blog/blog-item', 'alias' => $model->alias]); ?>
			<?php endif; ?>
		</div>

		  <div class="panel-body">
		    <h1 class="title-item-blog"><?=$model->titulo;?></h1>

	    <div class="blog-post-met-cat">
	      <span><i class="fa fa-fw fa-user"></i> <?=$model->autor; ?></span>
	      <span>
	       <?=Html::a('<i class="fa fa-fw fa-folder"></i>'.$model->categoriaconteudo->nome , ['blog/blog-item', 'id' => $model->id]) ?>
	        </span>

	      <span><i class="fa fa-fw fa-comment-o"></i> (<?=$count_coment?>)</span>
	    </div>
	    <?php if (isset($model->texto_introdutorio )&& $model->texto_introdutorio != "") : ?>
	    	<div class="content-item">
   				<?=$model->texto_introdutorio; ?>
	    	</div>

				<div class="social-share">
				 		<a href="http://www.linkedin.com/shareArticle?url=<?=$url_item?>/&title=<?=$model->titulo;?>&summary=<?=$model->texto_introdutorio?>&source=<?=$url_item?>" target="_blank" onclick="javascript:window.open(this.href,
						'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<i class="fa fa-linkedin"></i>
						</a>


						<a href="http://www.facebook.com/sharer/sharer.php?u=<?=$url_item?>" target="_blank" class="long-share-btn facebook" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<i class="fa fa-facebook"></i>
						</a>

						<a href="https://plus.google.com/share?url=<?=$url_item?>" onclick="javascript:window.open(this.href,
						'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<i class="fa fa-google-plus"></i>
						</a>

						<a href="http://twitter.com/share?url=<?=$url_item?>/&text=<?=$model->titulo;?>&via=Amor Meu" target="_blank" class="share-btn twitter" onclick="javascript:window.open(this.href,'','menubar=no, toolbar=no,resizable=yes,scrollbars=yes,height=600,width600'); return false;">
						<i class="fa fa-twitter"></i>
						</a>
				</div>

				<?= Html::a('Leia mais...', ['blog/blog-item', 'alias' => $model->alias], ['class' => 'btn btn-primary pull-right']) ?>
		 <?php endif; ?>

		</div>
  </div>
