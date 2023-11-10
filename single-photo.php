<?php
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
?>

<a href="<?php the_permalink() ?>">
<div class="photo">

<?php
    the_title('<h2>', '</h2>');
    the_content();
?>
</div>
</a>

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
