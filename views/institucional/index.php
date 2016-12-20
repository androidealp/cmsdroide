<?php
  use yii\helpers\Html;
  use app\components\widgets\widgeteffect\getEffect;
  use app\components\widgets\formcompartilhe\FormCompartilhe;
?>

<?=getEffect::widget([
 'tipo'=>'slideshow',
 'chave'=>'slide-seDhMGFVOkXkfEtMGVSLusywYVMLIJNs'
 ]);  ?>

 <div class="bg-amormeu force-text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="upper text-center">Já é cadastrado</h2>
        <div class="form">
          <?=\app\components\widgets\Login\Login::widget(['layout'=>'login_completo','enable'=>1]);?>
        </div>
      </div>
      <div class="col-md-6">
        <h2 class="upper text-center">Compartilhe</h2>
        <?php echo FormCompartilhe::widget([
        'layout'=>'formcompartilhe',
        ]);
       ?>
      </div>
    </div>
  </div>
  <!-- /container -->
</div>

<!-- Busca rápida aqui -->
<!-- Depoimentos aqui -->

<section class="posts-blog">
      <div class="container container-center">
        <h1 class="text-center title-section">Conheça as últimas novidades do nosso blog</h1>
        <?php echo \app\components\widgets\NoticiasBlog\NoticiasBlog::widget([
          'id_categoria'=>2,
          'limit'=>6,
          'item_class'=> 'defaul-size-item'

        ]);?>
    </div>
</section>


<section class="parallax-pg-inicial">
    <?=getEffect::widget([
      'layout'=>'parallax-home',
      'tipo'=>'parallax',
      'chave'=>'slide-qYxBZWDNUeq80FOZk4hfUxTgC9a9swsT'
      ]);  ?>
</section>


<section class="field-newsletter">
    <div class="container container-center">
      <div class="col-md-6">
          <h1>Assine nossa newsletter e receba notícias e novidades</h1>
      </div>
      <div class="col-md-6">
        <?php echo \app\components\widgets\FomrNewsletter\FomrNewsletter::widget([]);?>
      </div>
   </div>
</section>
