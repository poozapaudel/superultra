<?php
/**
 * Template part for displaying single blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package super-ultra-theme
 */

?>
<div id="content" class="site-content">
			

	<?php if(have_posts()): ?>
		
	<header class="page-header" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/single-img.jpg );">
		<div class="container">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</header>
	<div class="container">
		<div id="primary" class="content-area sticky-meta">
			<main id="main" class="site-main">

					<?php
					
						if ( 'post' === get_post_type() ) :
						$categories = get_the_category($the_query->ID);
						$separator  = ' ';
						$output     = '';	
						?>
						<div class="entry-meta">
										<div class="sticky-inner">
											<div class="sidebar__inner">
												<span class="byline" itemprop="author">
													<span class="meta-title">Written By</span>
													<span class="author">
														<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="url fn" itemprop="name"><?php  the_author();	?></a>	
																			
													</span>
												</span>
												<span class="posted-on" itemprop="datePublished">
													<span class="meta-title">Published on</span>
													<a href="<?php echo esc_url( get_month_link( false, false ) ); ?>">
														<time datetime="2017-12-21"><?php	echo get_the_date( 'M j, Y' );	?></time>
													</a>
												</span>
												<span class="category">
													<span class="meta-title">Category</span>
													<?php 
													if ( ! empty( $categories ) ) {
													    foreach( $categories as $category ) {
													        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'super-ultra-theme' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
													    }
													    echo trim( $output, $separator );
													}	
													?>
												</span>
												<div class="sticky-social">
													<div class="post-favourite">
														<span class="fav-count"><?php echo get_favorites_count() ?></span>
														<?php echo get_favorites_button() ?>
													</div>

													<ul class="social-list">
														<?php dynamic_sidebar( 'post-sidebar' ); ?>											
													</ul>
												</div>
											</div>
										</div>
									</div>								

						
					<?php endif; ?>
				
				<div class="entry-content">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'super-ultra-theme' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'super-ultra-theme' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php super_ultra_theme_entry_footer(); ?>
				</footer><!-- .entry-footer -->

				<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'super-ultra-theme' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'super-ultra-theme' ) . '</span> <span class="nav-title">%title</span>',
					)
				);

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				?>
			</main>
		</div>
		<?php get_sidebar(); ?>
	</div>
	<?php endif; ?>
</div>