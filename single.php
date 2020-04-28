<?php get_header();?>
<div class="contenu">
  <div class="smallMainContainer">
    <div class="col-md-9 col-sm-12">
      <?php if(have_posts()):
      while(have_posts()) : the_post();
      ?>
      <h1><?php the_title();?></h1>
      <?php the_post_thumbnail(); ?>
      <p><?php the_content();?></p>
      <?php endwhile;?>
      <?php endif;?>
    </div>
    <div class="rightColomn col-md-3 col-sm-12">
      <h3>Nos équipes</h3>
        <?php
        $args = array(
          'post_type' => 'equipe',
        );
        // The Query
        $the_query = new WP_Query( $args );
          // The Loop
          if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
              $the_query->the_post(); ?>
              <a href="<?php the_permalink(); ?>"><?= the_title() ?></a>
        <?php }
        }
        /* Restore original Post Data */
      wp_reset_postdata();
      if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Colone de droite')):?><?php endif ?>
    </div>
  </div>
</div>
<?php get_footer();?>
