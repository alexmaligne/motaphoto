<?php

function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
    wp_enqueue_script( 'parallax-titre', get_stylesheet_directory_uri() . '/js/parallax-titre.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


/* Création du menu */
function wpb_custom_new_menu() { 
    register_nav_menu('menu-header',__( 'Menu Header' )); 
    register_nav_menu('menu-footer',__( 'Menu Footer' )); 
    } 
    add_action( 'init', 'wpb_custom_new_menu' );



remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );


/* Création des posts*/
function my_cptui_add_post_types_to_instant_articles( $post_types ) {
	
    // Option 1: If you want ALL of your CPTUI items.
    $cptui_post_types = cptui_get_post_type_slugs();

    /* Option 2: If you want just some of them.
    $cptui_post_types = array( 'my_post_type', 'my_other_post_type' );

    return array_merge(
        $post_types,
        $cptui_post_types
    );*/
}
add_filter( 'instant_articles_post_types', 'my_cptui_add_post_types_to_instant_articles' );

?>