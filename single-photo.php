<?php
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
?>
<?php $format=get_the_terms( $post->ID, 'format' ); ?>
<?php $categorie=get_the_terms( $post->ID, 'categorie' ); ?>

<a href="<?php the_permalink() ?>"></a>

<div class="photo">
	<div class="displayFlexRow">
		<div class="textPhoto">
			<div class="text">
				<?php the_title('<h2>', '</h2>'); ?>
				<p>RÉFÉRENCE : <span id="photoReference"><?php echo get_field( "reference" ) ?></span></p>
				<p>CATÉGORIE : <span id="photoCategorie"><?php echo $categorie[0]->name; ?></span></p>
				<p>FORMAT : <span id="photoFormat"><?php echo $format[0]->name; ?></span></p> 
				<p>TYPE : <span id="photoType"><?php echo get_field( "type" ) ?></span></p>
				<p>ANNÉE : <span id="photoAnnee"><?php echo get_field( "annee" ) ?></span></p>
			</div>
			<div><hr></div>
		</div>
		<div class="affichagePhoto">
			<?php the_content(); ?>
		</div>
	</div>

	<div class="displayFlexRow">
		<div class="blocContac">
			<div class="contact">
					<p>Cette photo vous intéresse ?</p>
			</div>
			<div class="bouton">
				<button
				id="contactBTNWithPhotoRef"
				class="boutonContact" 
				type="button">Contact</button>
			</div>
		</div>

		<div class="blocNavigation">
			<div id="banner">
				<img class="banner-img" src="<?php echo get_stylesheet_directory_uri() . '/img/slideshow/nathalie-0.jpeg'; ?>" alt="Photo">
				<img class="fleche fleche_precedente" src="<?php echo get_stylesheet_directory_uri() . '/img/line-6.png'; ?>" alt="Flèche précédente">
        		<img class="fleche fleche_suivante" src="<?php echo get_stylesheet_directory_uri() . '/img/line-7.png'; ?>" alt="Flèche suivante">
			</div>
		</div>
	</div>
	<?php get_template_part( 'template-parts/photo_block' ); ?>
</div>

<?php
	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

endwhile; // End of the loop.

get_footer();
