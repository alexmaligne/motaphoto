<?php
	$args = array(
		'post_type' => 'books', // Replace 'books' with your custom post type slug
		'posts_per_page' => 9, // Set the number of posts to display per page
		'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
	);

	$custom_query = new WP_Query($args);


	$total_pages = $custom_query->max_num_pages;
	$current_page = max(1, get_query_var('paged'));


	if ( $custom_query->have_posts() ) {
		while ( $custom_query->have_posts() ) {
			$custom_query->the_post();
			?>
			<article>
				<h2><?php the_title(); ?></h2>
				<!-- Display other post fields or content here -->
			</article>
			<?php
		}
	} else {
		?>
		<p>No books found.</p>
		
	<?php } 
?>