<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package super-ultra-theme
 */

?>
<section class="newsletter-section">
	<img src="<?php echo get_template_directory_uri();?>/assets/images/newsletter-section.jpg" alt="">
</section> <!-- .newsletter-section -->
<footer class="site-footer">
			<div class="top-footer">
				<div class="container">
					<div class="col">
						<section class="widget widget_text">
							<?php dynamic_sidebar( 'about' ); ?>
						</section>
					</div>
					<div class="col">
						<section class="widget widget_recent_entries">		
							<?php dynamic_sidebar( 'recent-posts' ); ?>
						</section>
					</div>
					<div class="col">
						<section class="widget widget_categories">
							<?php dynamic_sidebar( 'categories' ); ?>
						</section>
					</div>
				</div>
			</div> <!-- .top-footer -->
			<div class="bottom-footer">
				<div class="container">
					<div class="copyright">            
						<?php dynamic_sidebar( 'powered-by' ); ?>             
					</div>
					<div class="footer-social">
						<?php
						wp_nav_menu(
							array(
								'menu'			  =>'menu-2',	
														
								'items_wrap'      => '<ul class="social-list"><li class="socio-item"><?php __( "Menu:", "textdomain" ); ?></li>%3$s</ul>',
							)
						); 
						?>			 
								
					</div>
				</div>
			</div>
	</footer> <!-- .site-footer -->
</div> <!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
	