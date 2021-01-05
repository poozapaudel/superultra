<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package super-ultra-theme
 */

get_header();
?>

<div id="content" class="site-content">			
		<div class="container">
			<div id="primary" class="content-area">			
				<header class="page-header">
					<h1 class="page-title">Search Results For:</h1>
					<?php get_search_form();?>
					
					<span class="total-result"><?php echo $wp_query->found_posts; ?> Results</span>
			
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'super-ultra-theme' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->
					<div class="showing-result">
						Showing: 
						<?php 
							$paged = !empty($wp_query->query_vars['paged']) ? $wp_query->query_vars['paged'] : 1;
						    $prev_posts = ( $paged - 1 ) * $wp_query->query_vars['posts_per_page'];
						    $from = 1 + $prev_posts;
						    $to = count( $wp_query->posts ) + $prev_posts;
						    $of = $wp_query->found_posts;
						    // ... Display the information, for example
						    printf( '%s to %s of %s', $from, $to, $of );
						?> 
						RESULTS
					</div>
					<main id="main" class="site-main">
					<?php if ( have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
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
<?php get_footer();
