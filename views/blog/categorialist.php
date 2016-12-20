<?php
   use yii\helpers\Html;
   use yii\helpers\Url;
   use yii\widgets\BaseListView;
   use yii\widgets\ListView;
   use yii\data\ActiveDataProvider;



   ?>
<div class="cover overlay cover-image-full home" style="height: 300px;">
   <img src="img/food1-wide.jpg" alt="">
   <?php echo Html::img('@web/temas/admamormeu/img/modern-creative-workspace-m.jpg ') ?>
   <div class="overlay overlay-bg-black">
      <div class="container">
         <div class="page-section text-center">
            <h1 class="margin-none text-overlay">Library of Courses for Web &amp; Mobile</h1>
            <p class="text-overlay">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consectetur consequatur distinctio earum ipsam.
            </p>
            <a class="btn bg-lightred btn-lg" href="">Saiba mais</a>
         </div>
      </div>
   </div>
</div>
<!-- Fim do banner do blog  -->
<div class="container">
   <div class="row">
      <div class="col-md-9 col-sm-8">
         <div class="row">
            <?php
               echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_itemblog',
                'itemOptions' => ['tag'=>'article', 'class'=>'col-md-6 col-sm-6 col-xs-12'],
                'layout' => "{items}\n<div class='row'><div class='col-md-12 col-md-offset-3'>{pager}</div></div>\n",
                'emptyTextOptions'=>['class'=>'boxvaizo'],
                'emptyText'=>\app\components\helpers\Tools::LayoutEmpty(),
                'pager'=>[
                  'pageCssClass'=>'pagination',
                  'hideOnSinglePage'=>false
                ],
               ]);
               ?>
         </div>

      </div>
      <!-- Coluna esquerda do blog -->
      <div class="col-md-3 col-sm-4">
         <div class="sidebar-item-blog">
            <?php echo \app\components\widgets\ListaCategoria\ListaCategoria::widget([]);?>
            <!-- Campo de busca -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title">Busca</h3>
               </div>
               <div class="panel-body">
                  <?=\app\components\widgets\BuscaBlog\BuscaBlog::widget([]);?>
               </div>
            </div>
            <!-- Fim dos itens Departamentos -->
            <!-- Formulario de newsletter -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title">Assine Nossa News</h3>
               </div>
               <div class="panel-body">
                  <?=\app\components\widgets\FomrNewsletter\FomrNewsletter::widget(['layout'=>'news_sidebar']); ?>
               </div>
            </div>
         </div>
      </div>
      <!-- Fim da Coluna esquerda do blog -->
   </div>
</div>
