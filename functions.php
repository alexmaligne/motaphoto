<?php

function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
    wp_enqueue_script( 'script-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );
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

?>