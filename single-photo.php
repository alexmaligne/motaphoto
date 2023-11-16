<?php
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
?>

<a href="<?php the_permalink() ?>"></a>

<div class="photo">
	<div class="displayFlexRow">
		<div class="textPhoto">
			<div class="text">
				<?php the_title('<h2>', '</h2>'); ?>
				<p>RÉFÉRENCE :</p>
				<p>CATÉGORIE :</p>
				<p>FORMAT :</p>
				<p>TYPE :</p>
				<p>ANNÉE :</p>
				<hr />
			</div>
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
			<div><button 
				class="favorite styled" 
				type="button">Contact</button>
			</div>
		</div>
	</div>

<?php
	$terms = get_terms( array(
        'taxonomy'   => 'post_tag',
        'hide_empty' => false,
    ) );
?>
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
