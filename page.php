<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package super-ultra-theme
 */

get_header();

if ( have_posts() ) : 
	
	get_template_part( 'template-parts/content', 'page' );
endif;
 get_footer();
 ?>
