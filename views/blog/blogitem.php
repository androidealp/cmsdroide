<?php
  use yii\helpers\Html;
  use yii\helpers\Url;
  use yii\widgets\ActiveForm;
  use yii\widgets\ListView;
  use app\components\widgets\widgeteffect\getEffect;

  $url_item = Url::toRoute(['blog/blog-item', 'alias'=> $model->alias], true);
  $count_coment = $model->countComentario();

 ?>

 <?=getEffect::widget([
  'tipo'=>'static',
  'chave'=>'slide-zCSait-EMquSjaf-AEfofu7sMZJPaquZ',
  'layout'=>'static-default'
  ]);  ?>


  <div class="container">
     <div class="row">
        <div class="col-md-9 col-sm-8">
          <div class="row row-eq-height">
              <div class="col-xs-12">
                <div class="panel panel-default blog-am">
                  <div class="post-thumbnail">
                     <?php if (isset($model->imagem_pos )&& $model->imagem_pos != "") : ?>
                        <?=Html::a(Html::img('@web/'.$model->imagem_pos, ['alt'=>$model->titulo], ['class' => 'img-responsive']) , ['blog/blog-item']) ?>
                      <?php else : ?>
                      <?=Html::a(Html::img('@web/media/sistema/no-image.jpg', ['alt'=>$model->titulo], ['class' => 'img-responsive']) , ['blog/blog-item', 'alias' => $model->alias]); ?>
                    <?php endif; ?>

                    </div>
                  <div class="panel-body">
                    <h1 class="title-item-blog"><?=$model->titulo;?></h1>
                    <div class="blog-post-met-cat">
                      <span><i class="fa fa-fw fa-user"></i> <?=$model->autor; ?></span>
                      <?=Html::a('<i class="fa fa-fw fa-folder"></i>'.$model->categoriaconteudo->nome , ['blog/blog-item', 'id' => $model->id]) ?>
                      <span> <i class="fa fa-fw fa-calendar"></i> <?=Yii::$app->getFormatter()->asDate($model->dt_publicacao) ?></span>
                      <span> <i class="fa fa-fw fa-comment-o"></i> (<?=$count_coment?>)</span>
                    </div>
                      <?php if (isset($model->conteudo_total )&& $model->conteudo_total != "") : ?>
                      <?=$model->conteudo_total ?>

                        <div class="social-share shere-detalhe-item">
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
                    <?php endif; ?>
                </div>
                </div>

                <?php if ($model->video_url): ?>
                    <div class="panel panel-default">
                          <?=\app\components\widgets\Player\Player::widget(['media'=>$model->video_url]);?>
                    </div>
                <?php endif; ?>

                <!-- AUTOR -->
                <div class="panel panel-default">

                    <div class="panel-body">
                      <?php if ($model->publisher): ?>
                      <div class="media">
                        <?php $icon = yii\helpers\Html::img('@web/temas/adm-common/img/icons/user.svg', ['class'=>'pull-left', 'style'=>'height:60px;']);
                            if($model->publisher->avatar)
                            {
                              $icon =  yii\helpers\Html::img('@web/'.$model->publisher->avatar, ['class'=>'pull-left','style'=>'height:60px;']);
                            }

                            echo $icon;
                        ?>

                        <div class="media-body">
                            <h3 class="panel-title"><?=$model->autor; ?></h3>
                            <p><?=$model->publisher->descricao?></p>
                        </div>

                      </div>
                      <?php endif; ?>

              			</div>

            		</div>
                <!-- AUTOR -->

               <!-- COMENTARIO -->

                 <div id="comentario" class="" style="display:none">

                 </div>

                   <!-- 1 panel-default -->

                 <div class="panel panel-default">
                   <div class="panel-heading">
    	               <h3 class="text-center text-success"><i class="fa fa-fw fa-envelope-o"></i> COMENTÁRIOS PUBLICADO
                       <span class="pull-right btn btn-sm btn-success"
                        data-ajaxrender="<?=yii\helpers\Url::to(['blog/ajax-form-comentario','alias'=>$model->alias]);?>"
                        data-ajaxid="#comentario"
                        > Adicionar comentário <i class="fa fa-fw fa-plus"></i></span></h3>
    	              </div>
                    <div class="panel-body" data-list="list-comentarios">

                      <?php
                           echo ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_itemcomentarios',
                            //'itemOptions' => ['tag'=>'article', 'class'=>'col-md-6 col-sm-6 col-xs-12'],
                            'layout' => "{pager}\n{items}",
                      ]);
                      ?>
                    </div>
                 </div>
                 <!-- /.col-md-8 col-md-offset-2 -->


               <!--./COMENTARIO -->

              </div>
          </div>
        </div>
        <!-- Coluna esquerda do blog -->
        <div class="col-md-3 col-sm-4">
          <div class="sidebar-item-blog">

            <!-- Campo de busca -->
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Busca</h3>
                </div>
                <div class="panel-body">
                  <?=\app\components\widgets\BuscaBlog\BuscaBlog::widget([]);  ?>
                </div>
            </div>

            <!-- Departamentos -->
           <?php echo \app\components\widgets\ListaCategoria\ListaCategoria::widget([]);?>
            <!-- Fim dos itens Departamentos -->


             <!-- Formulario de newsletter -->
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Assine Nossa News</h3>
                </div>
                <div class="panel-body">
                  <?php echo \app\components\widgets\FomrNewsletter\FomrNewsletter::widget(['layout'=>'news_sidebar']);?>
                </div>
            </div>

          </div>
        </div>
        <!-- Fim da Coluna esquerda do blog -->
     </div>
</div>
