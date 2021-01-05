<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package super-ultra-theme
 */

?>
<?php 
	
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
					        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'super-ultra-theme' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
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
			
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-readmore"><?php esc_html_e( 'Continue Reading', 'super-ultra-theme' ); ?></a>								
			
		</footer><!-- .entry-footer -->
	</div>
</article>


