<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<section class="cataloguePhotos">

<?php
// Créez un objet WP_Query pour récupérer les posts du Custom Post Type
    $args = array(
        'post_type' => 'photo', // Nom du Custom Post Type
        'posts_per_page' => 12, // Nombre de posts que à afficher par page
    );
    $query = new WP_Query($args);

    // Vérifiez si des posts existent
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // Affichez le titre et le contenu du post
            the_title('<h2>', '</h2>');
            the_content();
        }

        // Réinitialisez les données post
        wp_reset_postdata();
    } else {
        // Aucun post trouvé
        echo 'Aucun post trouvé.';
    }
?>

</section>