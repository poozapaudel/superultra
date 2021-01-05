<?php
/**
 * The template for displaying author page
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
						<div class="author-img">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
						</div>						
							<?php  $archivecat = explode(":", get_the_archive_title());?>
						<div class="author-content-wrap">
							<h1 class="page-title">
								<span class="sub-title">All Posts By</span><?php echo $archivecat[1]; ?>
							</h1>
							<div class="author-desc">
								<?php the_author_description();?>
							</div>
							<?php
							wp_nav_menu(
								array(
									'menu'			  =>'menu-2',	
															
									'items_wrap'      => '<ul class="social-list"><li class="socio-item"><?php __( "Menu:", "textdomain" ); ?></li>%3$s</ul>',
								)
							); 
							?>		
						</div>    
					</header>
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
						
								if ( has_post_thumbnail() ){
									$image    	= get_the_post_thumbnail_url($POST->ID,'full' );							
									$alt_text 	= get_post_meta( $image->ID, '_wp_attachment_image_alt', true );
								}							
									$categories = get_the_category();
									$separator  = ' ';
									$output     = '';									
									
							?>
							<article class="post " >
								<figure class="post-thumbnail">
									<a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e($alt_text); ?>"></a>
								</figure>
								<div class="post-content-wrap">
									<header class="entry-header">
										
										<div class="entry-meta">
											<span class="posted-on" itemprop="datePublished">
												<a href="<?php echo esc_url( get_month_link( false, false ) ); ?>">
														<time datetime="2017-12-21"><?php	echo get_the_date( 'M j, Y' );	?></time>
												</a>
											</span>
											<span class="category">
												<?php 
												if ( ! empty( $categories ) ) {
												    foreach( $categories as $category ) {
												        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
												    }
												    echo trim( $output, $separator );
												}else{ echo get_the_author();}	
												?>
											</span>
										</div>
										<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
										
									</header><!-- .entry-header -->							
									<div class="entry-content">
										<?php the_excerpt(); ?>
									</div><!-- .entry-summary -->
									<footer class="entry-footer">
										
										<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-readmore"><?php esc_html_e( 'Continue Reading', 'text-domain' ); ?></a>												
									</footer><!-- .entry-footer -->
								</div>
							</article>
						<?php
						endwhile;
						superultra_pagination($wp_query);
						endif;
						?>
					</main> <!-- .site-main -->				
				</div>
				<?php get_sidebar();?>
			</div>
		</div>
<?php get_footer();?>