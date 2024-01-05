<?php
get_header();
?>

<?php $photosHeader = new WP_Query( array ( "post_type"=>"photo", 'orderby' => 'rand', 'posts_per_page' => '1' ) );
$photoHeader=$photosHeader->posts[0]->post_content;
?>

<section class="bannerHero">
    <?php echo $photoHeader ?>
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
        <div class="listeDates">
            <form id="tri_photos_form" action="" method="get">
                <select name="ordre_tri" id="ordre_tri">
                    <option>TRIER PAR</option>
                    <option value="asc" <?php selected($_GET['ordre_tri'], 'asc'); ?>>Plus anciennes</option>
                    <option value="desc" <?php selected($_GET['ordre_tri'], 'desc'); ?>>Plus récentes</option>
                </select>
            </form>
        </div>
    </div>

    <div class="photos">
        <?php
        // Créez un objet WP_Query pour récupérer les posts du Custom Post Type
            $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
            // echo get_query_var( 'page' );
            $args = array(
                'post_type' => 'photo', // Nom du Custom Post Type
                'posts_per_page' => 8, // Nombre de posts que à afficher par page
                'paged' => $paged,
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

    <div class="boutonPaginationInfinie">
        <button
        id="boutonPagination"
        class="boutonPagination" 
        type="button">Charger plus</button>
    </div>

    <!-- Lightbox 
    <div class="lightbox">
        <button class="lightbox__close">Fermer</button>
        <button class="lightbox__next">Suivant</button>
        <button class="lightbox__prev">Précédent</button>
        <div class="lightbox__container">
            <img src="<?php echo get_template_directory_uri() . '/img/Icon_fullscreen.png'; ?>" alt="test">
        </div>
    </div>-->
</section> 

<?php
get_footer();
