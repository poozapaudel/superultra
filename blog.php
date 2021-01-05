<?php
/*
Template Name: Blog
*/


get_header();
?>

		
		<div id="content" class="site-content">
			<?php 
				$postid   = get_page_by_path( 'blog' );
				$post_67  = get_post( $postid );
				if( $post_67 ) {
				$title 	  = $post_67->post_title;
				$content  = $post_67->post_content;
				$url      = get_permalink( $post_67->ID );
				$image    = get_the_post_thumbnail_url( $post_67->ID, 'full' );
				$image_id = get_post_thumbnail_id( $post_67->ID );
				$alt_text = get_post_meta( $image->ID , '_wp_attachment_image_alt', true );	
			?>
			<header class="page-header">
				<div class="container">
					<h1 class="page-title"><?php echo $title; ?></h1>
					<div class="page-desc">
						<?php echo $content; ?>
					</div>
				</div>
			</header>
			<?php } ?>

			<?php 
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$args	=   array( 
				    'post_type'		 => 'post', 
				    'post_status'	 => 'publish', 
				    'posts_per_page' =>  2,
				    'paged'          =>  $paged				    
				);
				$the_query = new WP_Query( $args ); 
				if ( $the_query->have_posts() ) :

			?>		
			<div class="container">
				<div id="primary" class="content-area pagination_container">
					<main id="main" class="site-main">
					
						<?php
							while ( $the_query->have_posts() ) : $the_query->the_post(); 
								if ( has_post_thumbnail() ){
									$image    	= get_the_post_thumbnail_url( $the_query->ID, 'full' );							
									$alt_text 	= get_post_meta( $image->ID, '_wp_attachment_image_alt', true );
								}	
									$post_date 	= get_the_date( 'M j, Y' );

									$categories = get_the_category($the_query->ID);
									$separator  = ' ';
									$output     = '';												
															
								
						?>
						<article class="post">
							<?php if($image){?>
							<figure class="post-thumbnail">
								<a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e($alt_text); ?>"></a>
							</figure>
							<?php } ?>
							<div class="post-content-wrap">
								<header class="entry-header">
									<div class="entry-meta">
										<span class="posted-on" itemprop="datePublished">
											<a href="<?php echo esc_url( get_month_link( false, false ) ); ?>">
												<time datetime="<?php echo get_the_date('c'); ?>"><?php echo $post_date; ?></time>
											</a>
										</span>
										<span class="category">
											<?php 
												if ( ! empty( $categories ) ) {
												    foreach( $categories as $category ) {
												        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
												    }
												    echo trim( $output, $separator );
												}	
											?>
										</span>
									</div>
									<h2 class="entry-title" itemprop="headline">
										<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
									</h2>
								</header>
								<div class="entry-content">
									<?php echo the_excerpt(); ?>
								</div>
								<footer class="entry-footer">
									<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-readmore"><?php esc_html_e( 'Continue Reading', 'text-domain' ); ?></a>
								</footer>
							</div>
						</article>
						<?php 
							endwhile;
													
						?>						
						
			        </main>
			        
						<?php  superultra_pagination($the_query); ?>
						
				</div> <!-- #primary -->
				<?php get_sidebar(); ?>
			</div> <!-- .container -->
			<?php wp_reset_postdata();	endif; ?>
		
		</div> <!-- .site-content -->
		<?php get_footer(); ?>