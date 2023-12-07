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

		<?php
		$navigationPrevious=get_previous_post();
		$navigationNext=get_next_post();
		?>
			<div id="banner">
				<a class="flechePrevious" href="<?php echo get_permalink($navigationPrevious->ID) ?>" >
					<div class="photoPrevious">
					<?php echo $navigationPrevious->post_content ;
					?>
					</div>
					<img class="fleche_precedente" src="<?php echo get_stylesheet_directory_uri() . '/img/line-6.png'; ?>" alt="Flèche précédente">
				</a>
        		<a class="flecheNext" href="<?php echo get_permalink($navigationNext->ID) ?>" >
					<div class="photoNext">
					<?php echo $navigationNext->post_content ;
					?>
					</div>
					<img class="fleche_suivante" src="<?php echo get_stylesheet_directory_uri() . '/img/line-7.png'; ?>" alt="Flèche suivante">
				</a>
			</div>
		</div>
	</div>


	<?php
	get_template_part( 'template-parts/photo_block' ); ?>
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


//echo '<div class="pagination">';
//echo paginate_links(array(
//    'base' => get_pagenum_link(1) . '%_%',
//    'format' => '/page/%#%', // Change to match your URL structure if needed
//    'current' => $current_page,
//    'total' => $total_pages,
//));
//echo '</div>';


get_footer();
