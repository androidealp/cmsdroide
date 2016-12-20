<?php
  use yii\helpers\Html;
  use yii\helpers\Url;
  use yii\widgets\BaseListView;
  use yii\widgets\ListView;
  use yii\data\ActiveDataProvider;
  use app\components\widgets\widgeteffect\getEffect;
 ?>

 <?=getEffect::widget([
  'tipo'=>'static',
  'chave'=>'slide-zCSait-EMquSjaf-AEfofu7sMZJPaquZ',
  'layout'=>'static-default'
  ]);  ?>

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
                  <?=\app\components\widgets\BuscaBlog\BuscaBlog::widget([]);  ?>
                </div>
            </div>


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
