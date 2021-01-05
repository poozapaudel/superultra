<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package super-ultra-theme
 */

get_header();

if ( have_posts() ) : 

	if ( 'post' === get_post_type() ) {
		get_template_part( 'template-parts/content', 'blog' );
	}else {
	
		get_template_part( 'template-parts/content', 'page' );
	}

endif;

 get_footer();
?>