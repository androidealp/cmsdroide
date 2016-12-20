<?php 
  use yii\helpers\Html;
  use yii\helpers\Url;
 ?>
 <?php for ($i=0; $i <= 9; $i++) : ?>
<div class="item col-md-6 col-sm-6 col-xs-12">
	<div class="panel panel-default blog-am">
		  <div class="post-thumbnail">
		   <?=Html::a(Html::img('@web/temas/admamormeu/img/place3-full.jpg ',['class' => 'img-responsive']) , ['blog/blog-item']) ?>

		  </div>

		  <div class="panel-body">
		    <h1 class="title-item-blog">Titulo do blog do artigo</h1>
			    <div class="blog-post-met-cat">
			      <span><i class="fa fa-fw fa-user"></i> Andre Luiz</span>
			      <span><i class="fa fa-fw fa-folder"></i> Institucional </span>
			      <span> <i class="fa fa-fw fa-comment-o"></i> (1)</span>
			    </div>
		    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				<div class="social-share">

				
				   <!-- Facebook -->
				    <a class="fb-share fa fa-fw fa-facebook" href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" target="_blank">
				    </a>
				    
				    <!-- Google+ -->
				    <a class="fb-share fa fa-fw fa-google-plus" href="https://plus.google.com/share?url=https://simplesharebuttons.com" target="_blank">
				    </a>
				    
				    <!-- LinkedIn -->
				    <a class="fb-share fa fa-fw fa-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://simplesharebuttons.com" target="_blank">
				    </a>
				     
				    <!-- Twitter -->
				    <a class="fb-share fa fa-fw fa-twitter" href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
				    </a>
				</div>
				<?=Html::a('Leia mais...', ['blog/blog-item'], ['class' => 'btn btn-primary pull-right']) ?>		       
		</div>	
  </div>
</div>
<?php endfor; ?>

<script type="text/javascript">
	(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

window.fbAsyncInit = function() {
    FB.init({
        appId: '409742669131720',  // Change appId 409742669131720 with your Facebook Application ID
        status: true,
        xfbml: true,
        cookie: true
    });
};

$(document).ready(function() {
    $('.fb-share').click(function() {
        FB.ui({
            method: 'feed',
            name: 'Manoj Yadav',
            link: 'http://www.manojyadav.co.in/',
            picture: 'https://www.gravatar.com/avatar/119a8e2d668922c32083445b01189d67',
            description: 'Manoj Yadav a PHP Developer from Mumbai, India'
        });
    });
});
</script>