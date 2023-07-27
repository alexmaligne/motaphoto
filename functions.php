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


/* Affichage des Custom Fields dans le backoffice WP*/
function ajouter_boite_personnalisee() {
    add_meta_box(
        'champs_personnalises_boite', // ID unique de la boîte personnalisée
        'Champs personnalisés', // Titre de la boîte personnalisée
        'afficher_champs_personnalises', // Fonction pour afficher le contenu de la boîte
        'photo', // Nom du Custom Post Type
        'normal', // Emplacement de la boîte (normal, side, advanced)
        'high' // Priorité de la boîte (high, low)
    );
}
add_action('add_meta_boxes', 'ajouter_boite_personnalisee');


function afficher_champs_personnalises($post) {
    // Récupérez les valeurs des champs personnalisés
    $valeur_champ_1 = get_post_meta($post->ID, 'Référence', true);
    $valeur_champ_2 = get_post_meta($post->ID, 'Type', true);
    // ...

    // Affichez les champs personnalisés dans la boîte
    echo '<p><strong>Champ 1 :</strong> ' . $valeur_champ_1 . '</p>';
    echo '<p><strong>Champ 2 :</strong> ' . $valeur_champ_2 . '</p>';
    // ...
}

?>