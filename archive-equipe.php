<?php get_header();?>
<div class="container-fluid mainContainer">
<h1><?php single_cat_title();?></h1>
<div class="row smallMainContainer">
	<div class="col-md-9 col-sm-12">
		<div class="row">
		<?php if(have_posts()):
		while(have_posts()) : the_post();
		$image=get_the_post_thumbnail_url();
		?>
		<div class="post col-12 col-md-4 actualityContainer mt-5">
			<a href="<?php the_permalink();?>"><div class="imageArticle" style="background-image: url(<?php echo $image;?>);"></div></a>
			<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

		</div>
		<?php endwhile;?>
	</div>
	<div class="row" >
			<div class="col-6 previousActuality">
<?php previous_posts_link('&lt;&lt; Actualités précédentes'); ?>
</div>
	<div class="col-6 nextActuality">
<?php next_posts_link('Actualités suivantes &gt;&gt;'); ?>
</div>
</div>
<div class="row">
	<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 2, 'title' => false, 'description' => false ) ); ?>
</div>
	</div>
		<div class="rightColomn col-md-3 col-sm-12">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Colone de droite')):?><?php endif ?>
		</div>
	</div>
		<?php endif;?>
	</div>
<?php get_footer();?>
