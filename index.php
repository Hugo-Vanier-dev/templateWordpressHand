<?php get_header();?>
<div class="container-fluid mainContainer">
<div class="smallMainContainer">
	<h1 class="mb-5"><?php if(single_cat_title() !== null){
			echo single_cat_title();
		}else{
			 echo 'Les équipes';
	 }?></h1>
	 <div class="row">
	<div class="col-md-9 col-sm-12">
		<div id="carouselExampleControls" class="carousel slide mb-5" data-ride="carousel">
		  <div class="carousel-inner">
				<?php
				$args = array(
					'post_type' => 'equipe',
				);
				// The Query
				$the_query = new WP_Query( $args );
				// The Loop
				if ( $the_query->have_posts() ) {
					$count = 0;
						while ( $the_query->have_posts() ) {
							if($count == 0){
							$the_query->the_post(); ?>
							<div class="carousel-item active">
								<div class="carouselImage" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID()); ?>);">
									<h2><?= the_title(); ?></h2>
								</div>
							</div>
						<?php
						}else {
						$the_query->the_post(); ?>
						<div class="carousel-item">
							<div class="carouselImage" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID()); ?>);">
								<h2><?= the_title(); ?></h2>
							</div>
						</div>
					<?php
						}
					$count += 1;
					}
				}
				wp_reset_postdata();
				?>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Précédent</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Suivant</span>
		  </a>
		</div>
		<h2>Les actualités</h2>
		<div class="row centerElemSmall">
		<?php if(have_posts()):
		while(have_posts()) : the_post();
		$image=get_the_post_thumbnail_url();
		?>
		<div class="post col-12 col-md-4 actualityContainer mt-5">
			<div class="imageArticle" style="background-image: url(<?php echo $image;?>);"></div>
			<h2><?php the_title();?></h2>
			<p><?php the_excerpt();?></p>
			<a href="<?php the_permalink();?>">Lire la suite</a>
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
			<h3>Nos équipes</h3>
			<?php
			// The Loop
			if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
							$the_query->the_post(); ?>
							<p><a href="<?php the_permalink(); ?>"><?= the_title() ?></a></p>
					<?php }
				 }
			/* Restore original Post Data */
			wp_reset_postdata();
 			if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Colone de droite')):?><?php endif ?>
		</div>
	</div>
	</div>
		<?php endif;?>
	</div>
<?php get_footer();?>
