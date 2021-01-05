<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package super-ultra-theme
 */

get_header();

?>

<div id="content" class="site-content">			
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Uh-Oh...', 'super-ultra-theme' ); ?></h1>
						<div class="page-desc">
							<?php esc_html_e( 'The page you are looking for may have been moved, deleted, or possibly never existed.', 'super-ultra-theme' ); ?>
						</div>
					</header>
					<div class="page-content">
						<div class="error-num">404</div>
						<a class="bttn" href="<?php echo get_option("siteurl"); ?>"><?php esc_html_e( 'Take me to the home page', 'super-ultra-theme' ); ?></a>
					
						<?php get_search_form(); ?>
								
					</div><!-- .page-content -->
				</section>
			</main> <!-- .site-main -->
		</div> <!-- #primary -->
	</div> <!-- .container -->
	<div class="additional-posts">
		<div class="container">
			<h3 class="title">
					Recommended Articles
			</h3>			
			<div class="block-wrap">
				<?php 
				$args	=   array( 
				    'post_type'		 => 'post', 
				    'post_status'	 => 'publish', 
				    'posts_per_page' =>  3,
				   			    
				);
				$the_query = new WP_Query( $args ); 
				if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post(); 
					if ( has_post_thumbnail() ){
						$image    	= get_the_post_thumbnail_url( $the_query->ID, 'full' );							
						$alt_text 	= get_post_meta( $image->ID, '_wp_attachment_image_alt', true );
					}	
						$post_date 	= get_the_date( 'M j, Y' );
				?>
				<div class="block clearfix">
					<div class="entry-meta">
						<span class="posted-on" itemprop="datePublished">
							<a href="<?php echo esc_url( get_month_link( false, false ) ); ?>">
								<time datetime="2017-12-21"><?php echo $post_date; ?></time>
							</a>
						</span>
					</div>
					<header class="entry-header">
						<h3 class="entry-title">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title();?></a>
						</h3>                        
					</header><!-- .entry-header -->
					<figure class="post-thumbnail">
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<img src="<?php echo esc_url($image);?>" alt="<?php esc_attr_e($alt_text);?>">                    
						</a>
					</figure><!-- .post-thumbnail -->
				</div>
				<?php 
				endwhile;
				wp_reset_postdata();
				endif;
				?>	
					
			</div><!-- .block-wrap -->
		</div>
	</div>
</div>
<?php get_footer(); ?>

		




 