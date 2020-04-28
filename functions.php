<?php
//////////////// DECLARATION DES MENUS DU SITE ////////////////
register_nav_menus(array(
'Menu principal'=>'En haut du site',
'Menu footer'=>'Dans le pied de page'));

//////////////// DECLARATION DES ZONES DE WIDGETS ////////////////
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name'=>'Colone de droite',
'before_widget' => '',
'after_widget' => '<hr>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

if (function_exists('register_sidebar'))
register_sidebar(array(
'name'=>'Pied de page',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h6>',
'after_title' => '</h6>',
));

//////////////// GESTION LOGO DU SITE ////////////////
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array('site-title', 'site-description'),
) );

//////////////// ACTIVATION DES IMAGES A LA UNE ////////////////
add_theme_support('post-thumbnails');
the_post_thumbnail('thumbnail');
the_post_thumbnail('medium');
the_post_thumbnail('large');
the_post_thumbnail('full');

//////////////// CSS ADMIN ////////////////
function admin_css() {
	$admin_handle = 'admin_css';
	$admin_stylesheet = get_template_directory_uri() . '/css/admin.css';
	wp_enqueue_style($admin_handle, $admin_stylesheet );
	}
	add_action('admin_print_styles', 'admin_css', 11 );

	/**
	 * Filter the except length to 20 words.
	 *
	 * @param int $length Excerpt length.
	 * @return int (Maybe) modified excerpt length.
	 */
	function wpdocs_custom_excerpt_length( $length ) {
	    return 8;
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

	function wpdocs_codex_equipe_init() {
	    $labels = array(
	        'name'                  => _x( 'Equipes', 'Post type general name', 'textdomain' ),
	        'singular_name'         => _x( 'Equipe', 'Post type singular name', 'textdomain' ),
	        'menu_name'             => _x( 'Equipes', 'Admin Menu text', 'textdomain' ),
	        'name_admin_bar'        => _x( 'Equipe', 'Add New on Toolbar', 'textdomain' ),
	        'add_new'               => __( 'Nouvel ajout', 'textdomain' ),
	        'add_new_item'          => __( 'Ajouter une nouvelle équipe', 'textdomain' ),
	        'new_item'              => __( 'Nouvelle équipe', 'textdomain' ),
	        'edit_item'             => __( 'Editer équipe', 'textdomain' ),
	        'view_item'             => __( 'Voir l\'équipe', 'textdomain' ),
	        'all_items'             => __( 'Toutes les équipes', 'textdomain' ),
	        'search_items'          => __( 'Chercher une équipe', 'textdomain' ),
	        'parent_item_colon'     => __( 'Equipe parent', 'textdomain' ),
	        'not_found'             => __( 'Aucune équipe trouvé.', 'textdomain' ),
	        'not_found_in_trash'    => __( 'Aucune équipe trouvé dans la poubelle.', 'textdomain' ),
	        'featured_image'        => _x( 'Image de l\'équipe', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'set_featured_image'    => _x( 'Définir l\'image de l\'équipe', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'remove_featured_image' => _x( 'Retirer l\'image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'use_featured_image'    => _x( 'Utiliser comme image de l\'équipe', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
	        'archives'              => _x( 'Toutes les équipes', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
	        'insert_into_item'      => _x( 'Inserer dans l\'équipe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
	        'uploaded_to_this_item' => _x( 'Charger dans l\'équipe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
	        'filter_items_list'     => _x( 'Filtrer la liste des équipes', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
	        'items_list_navigation' => _x( 'Naviguer dans la listes des équipes', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
	        'items_list'            => _x( 'Liste des équipes', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	    );

	    $args = array(
	        'labels'             => $labels,
	        'public'             => true,
	        'publicly_queryable' => true,
	        'show_ui'            => true,
	        'show_in_menu'       => true,
	        'query_var'          => true,
	        'rewrite'            => array( 'slug' => 'equipes-du-club' ),
	        'capability_type'    => 'post',
	        'has_archive'        => true,
	        'hierarchical'       => false,
	        'menu_position'      => null,
	        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	    );

	    register_post_type( 'equipe', $args );
		}

add_action( 'init', 'wpdocs_codex_equipe_init' );

function addMetabox(){
  add_meta_box('metaboxUrlEquipeId', 'Url', 'urlEquipeFonction', 'equipe', 'side', 'high');
}


add_action('add_meta_boxes_equipe', 'addMetabox');

function urlEquipeFonction($post){
	wp_nonce_field(basename(__FILE__), 'wp_url_equipe');
	$urlChamp = get_post_meta($post->ID, 'url championnat', true);
	?>
	<div>
		<label for="urlChampEquipe">Url du championnat de l'équipe</label>
		<input type="text" name="urlChampEquipe" id="urlChampEquipe" value="<?= $urlChamp ?>" />
	</div>
	<?php
}
add_action('save_post', 'verifPost', 10, 2);


function verifPost($postId, $post){
	if(!isset($_POST['wp_url_equipe']) || !wp_verify_nonce($_POST['wp_url_equipe'], basename(__FILE__))){
		return $postId;
	}
	$postSlug = 'equipe';
	if($postSlug != $post->post_type){
		return;
	}
	$postValue = '';
	if(isset($_POST['urlChampEquipe'])){
		$postValue = sanitize_text_field($_POST['urlChampEquipe']);
	}
	update_post_meta($postId, 'url championnat', $postValue);
}

function register_navwalker(){
	//require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	get_template_part('parts/class-wp-bootstrap-navwalker');
}
add_action( 'after_setup_theme', 'register_navwalker' );


function GetClassement($url){
	$long=strlen($url);
	$lastTiret=strrchr($url,'-');
	$code=substr($lastTiret,1);
	$newurl='https://jjht57whqb.execute-api.us-west-2.amazonaws.com/prod/pool/' . $code;
  $file = file_get_contents($newurl);
  $file=gzdecode($file);
  $file=json_decode($file,true);
  //print_r(get_headers($urlbis));
  $nbrequipes=count($file['teams']);
  $table='<table class="table table-striped table-hover table-sm"><thead>';
  $table.="<tr><th>&nbsp;</th><th>Equipes</th><th>Points</th><th>J</th><th>G</th><th>N</th><th>P</th><th>BUTS +</th><th>BUTS -</th><th>DIFF</th></tr>";
  $table.="</thead>";
  $table.="<tbody>";

  for($i=0;$i<$nbrequipes;$i++){

        $table.='<tr>';
        $table.='<td>'.$file['teams'][$i]['position'].'</td>';
        $table.='<td>'.$file['teams'][$i]['name'].'</td>';
        $table.='<td>'.$file['teams'][$i]['points'].'</td>';
        $table.='<td>'.$file['teams'][$i]['games'].'</td>';
        $table.='<td>'.$file['teams'][$i]['wins'].'</td>';
        $table.='<td>'.$file['teams'][$i]['draws'].'</td>';
        $table.='<td>'.$file['teams'][$i]['defeats'].'</td>';
        $table.='<td>'.$file['teams'][$i]['scored'].'</td>';
        $table.='<td>'.$file['teams'][$i]['missed'].'</td>';
        $table.='<td>'.$file['teams'][$i]['difference'].'</td>';
        $table.='</tr>';

    }

    $table.="</tbody>";
    $table.="</table>";

    return $table;
   }
