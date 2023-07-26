<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>

<section class="banner">
<img 
	id="logoHeader"
    data-parallax="0.3"
	src="<?php echo get_template_directory_uri() . '/img/Titre header.png'; ?> " 
	alt="Logo Photographe Event">
</section>

<?php

get_footer();
