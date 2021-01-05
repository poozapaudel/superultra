<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package super-ultra-theme
 */

get_header();
?>

<div id="content" class="site-content">			
		<div class="container">
			<div id="primary" class="content-area">

				<?php if ( have_posts() ) : ?>	
				<?php  $archivecat = explode(":", get_the_archive_title());?>
				<header class="page-header">								
					<h1 class="page-title"><span class="sub-title"><?php echo $archivecat[0]; ?></span><?php echo $archivecat[1]; ?></h1>
					
					<span class="total-result"><?php echo $wp_query->found_posts; ?> Results</span>		
						
				</header><!-- .page-header -->
				<div class="showing-result">
				Showing: 
				<?php 
					$paged = !empty($wp_query->query_vars['paged']) ? $wp_query->query_vars['paged'] : 1;
				    $prev_posts = ( $paged - 1 ) * $wp_query->query_vars['posts_per_page'];
				    $from = 1 + $prev_posts;
				    $to = count( $wp_query->posts ) + $prev_posts;
				    $of = $wp_query->found_posts;
				    // ... Display the information
				    printf( '%s to %s of %s', $from, $to, $of );
				?> 
				RESULTS
				</div>
				<main id="main" class="site-main">
					
						
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						superultra_pagination($wp_query);

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
					
				</main>

		</div>
		<?php get_sidebar(); ?>
	</div>
</div>


	<?php

get_footer();



