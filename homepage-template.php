<?php
/*
Template Name: Homepage
*/


get_header();
?>

<div class="site-banner">
			<div class="banner-item">
				<img src="<?php echo get_template_directory_uri();?>/assets/images/banner-img.jpg" alt="banner">
				<div class="banner-caption center">
					<div class="container">
						<h1 class="title">
							<a href="#"><?php the_title(); ?></a>
						</h1>
						<div class="item-desc">
							<?php the_content(); ?><!-- see remove p tag -->
							<?php dynamic_sidebar( 'banner-subscribe' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- .site-banner -->

		<?php 
			$postid   = get_page_by_path( 'about' );
			$post_15  = get_post( $postid );
			if( $post_15 ) {
			$title 	  = $post_15->post_title;
			$content  = $post_15->post_content;
			$url      = get_permalink( $post_15->ID );
			$image    = get_the_post_thumbnail_url( $post_15->ID, 'full' );
			$image_id = get_post_thumbnail_id( $post_15->ID );
			$alt_text = get_post_meta( $image->ID , '_wp_attachment_image_alt', true );	
		?>

		<section class="about-section">			
			<div class="container">
				<section class="widget widget_raratheme_featured_page_widget">                
					<div class="widget-featured-holder right">
						<p class="section-subtitle">                        
							<span>About Us</span>
						</p>                    
						<div class="text-holder">
							<h2 class="widget-title"><?php echo $title;?></h2>
							<div class="featured_page_content">

								<?php echo $content; ?>

								
								<a href="<?php echo esc_url( $url );?>" target="_blank" class="btn-readmore"><?php esc_html_e( 'Know more about me', 'text-domain' ); ?></a>
								

							</div> 
						</div>
						<div class="img-holder">
							<a target="_blank" href="#">
								<img src="<?php echo esc_url( $image );?>" alt="<?php echo esc_attr( $alt_text );;?>">                        
							</a>
						</div>
					</div>        
				</section>
			</div>	
		</section> <!-- .about-section -->
		<?php }	?>

		<?php 
			$args =   array( 
			    'post_type' => 'clients', 
			    'post_status' => 'publish', 
			    'posts_per_page' => 6
			);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) :	
		?>

		<section class="client-section">
			<div class="container">
				<section class="widget widget_raratheme_client_logo_widget">            
					<div class="raratheme-client-logo-holder">
						<div class="raratheme-client-logo-inner-holder">
							<h2 class="widget-title" itemprop="name">Raushan has been featured on:</h2>                             
							<div class="image-holder-wrap"> <!-- yo wrap plugin ko filter bata rakhnu parxa -->

								<?php 
									while ( $the_query->have_posts() ) : $the_query->the_post(); 
										if ( has_post_thumbnail() ){
											$image   = get_the_post_thumbnail_url( $the_query->ID, 'full' );											
	    									$alt_text = get_post_meta( $image->ID, '_wp_attachment_image_alt', true );
	    									
    									
								?>
								
								<div class="image-holder black-white">
									<a href="#" target="_blank">
										<img src="<?php echo esc_url( $image );?>" alt="<?php echo esc_attr( $alt_text );?>">
									</a> 
								</div>

								<?php  }
									endwhile;
								 	wp_reset_postdata(); ?>
								

							</div>
						</div>
					</div>
				</section>
			</div>
		</section> <!-- .client-section -->
		
		<?php endif; ?>

		<?php 
			$postid   = get_page_by_path( 'services' );
			$post_40  = get_post( $postid );
			if( $post_40 ) {
			$title 	  = $post_40->post_title;
			$content  = $post_40->post_content;
			$url      = get_permalink( $post_40->ID );
			$image    = get_the_post_thumbnail_url( $post_40->ID, 'full' );
			$image_id = get_post_thumbnail_id( $post_40->ID );
			$alt_text = get_post_meta( $image->ID , '_wp_attachment_image_alt', true );		

		?>
		<section class="service-section">
			<div class="container">
				<section class="widget widget_text">
					<h2 class="widget-title"><?php echo $title; ?></h2>
					<div class="textwidget">
						<?php echo $content; ?>
					</div>    		
				</section>

				<?php 
					$args =   array( 
					    'post_type' => 'services', 
					    'post_status' => 'publish', 
					    'posts_per_page' => 6
					);
					$the_query = new WP_Query( $args ); 
					if ( $the_query->have_posts() ) :	
					while ( $the_query->have_posts() ) : $the_query->the_post(); 
						if ( has_post_thumbnail() ){
							$image    = get_the_post_thumbnail_url( $the_query->ID, 'full' );							
							$alt_text = get_post_meta( $image->ID, '_wp_attachment_image_alt', true );
							
						}
				?>
				<section class="widget widget_rrtc_icon_text_widget">        
					<div class="rtc-itw-holder">
						<div class="rtc-itw-inner-holder">
							<div class="text-holder">
								<h2 class="widget-title" itemprop="name"><?php echo the_title(); ?></h2>
								<div class="content">
									<?php echo the_excerpt(); ?>
								</div>
								<a class="btn-readmore" href="<?php echo esc_url( get_permalink() ); ?>" target="_blank"><?php esc_html_e( 'Learn More', 'text-domain' ); ?></a>                              
							</div>
							<?php if ( $image ) { ?>
							<div class="icon-holder">								
								<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( $alt_text ); ?>"> 
							</div>
							<?php } ?>
						</div>
					</div>
				</section>
				<?php 
					endwhile;
					wp_reset_postdata();
					endif; 
				?>
				
			</div>
		</section> <!-- .service-section -->
		<?php } ?>
		<?php //get_template_part( 'template-parts/blog' ); ?>

		


<?php get_footer(); ?>
