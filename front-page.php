<?php
get_header();
?>

<section class="banner">
<img 
	id="logoHeader"
    data-parallax="0.4"
	src="<?php echo get_template_directory_uri() . '/img/Titre header.png'; ?> " 
	alt="Logo Photographe Event">
</section>

<section class="cataloguePhotos"> 

<div class="listes">
<div class="listeCategories">
<?php 
// Afficher la liste déroulante des catégories et des formats
	$args = array(
		'show_option_all' => 'Catégories',
		'taxonomy' => 'categorie',
		'orderby' => 'name',
		'order' => 'ASC',
	);
?>
</div>

<div class="listeFormats">
<?php 
	wp_dropdown_categories($args);

	$args = array(
		'show_option_all' => 'Formats',
		'taxonomy' => 'format',
		'orderby' => 'name',
		'order' => 'ASC',
	);

	wp_dropdown_categories($args);
?>
</div>
</div>

<div class="photos">
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
			get_template_part( 'template-parts/content/content-single' );
        }

        // Réinitialisez les données post
        wp_reset_postdata();
    } else {
        // Aucun post trouvé
        echo 'Aucun post trouvé.';
    }
?>

</div>
</section>

<?php
get_footer();
