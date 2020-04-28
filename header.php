<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
<meta charset="<?php bloginfo('charset');?>" />
<title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
<?php wp_head();?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href="<?php bloginfo('stylesheet_url');?>" type="text/css" rel="stylesheet">
</head>
<body <?php body_class();?>>
<div class="container-fluid">
<div class="navContainer">
  <div class="row menuDeNav">
    <div class="col-4 col-md-2 mt-3">
      <?php the_custom_logo();?>
    </div>
    <div class="col-4 col-md-8 navbar navbar-expand-md navbar-light d-flex justify-content-sm-end">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
    <?php
    wp_nav_menu( array(
        'theme_location'  => 'Menu principal',
        'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
        'container'       => 'div',
        'container_class' => 'collapse navbar-collapse',
        'container_id'    => 'bs-example-navbar-collapse-1',
        'menu_class'      => 'navbar-nav mr-auto menu-top',
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker(),
    ) );
    ?>
    </div>
    <div class="col-4 col-md-2">
      <img class="logoFacebook" src="<?= get_template_directory_uri() ?>/assets/img/logoFacebook.png" alt="image du logo de facebook">
    </div>
  </div>
</div>
</div>
