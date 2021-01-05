<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package super-ultra-theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function super_ultra_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'super_ultra_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function super_ultra_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'super_ultra_theme_pingback_header' );




/**
 * Custom Function
 */




function superultra_clients_custom_post_type() {
	$labels = array(
        'name'                  => _x( 'Clients', 'Post type general name', 'client' ),
        'singular_name'         => _x( 'client', 'Post type singular name', 'client' ),
        'menu_name'             => _x( 'Clients', 'Admin Menu text', 'client' ),
        'name_admin_bar'        => _x( 'client', 'Add New on Toolbar', 'client' ),
        'add_new'               => __( 'Add New', 'client' ),
        'add_new_item'          => __( 'Add New client', 'client' ),
        'new_item'              => __( 'New client', 'client' ),
        'edit_item'             => __( 'Edit client', 'client' ),
        'view_item'             => __( 'View client', 'client' ),
        'all_items'             => __( 'All clients', 'client' ),
        'search_items'          => __( 'Search client', 'client' ),
        'parent_item_colon'     => __( 'Parent client:', 'client' ),
        'not_found'             => __( 'No clients found.', 'client' ),
        'not_found_in_trash'    => __( 'No clients found in Trash.', 'client' ),
        'featured_image'        => _x( 'Client Feature Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'client' ),
        'set_featured_image'    => _x( 'Set feature image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'client' ),
        'remove_featured_image' => _x( 'Remove feature image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'client' ),
        'use_featured_image'    => _x( 'Use as feature image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'client' ),
        'archives'              => _x( 'client archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'client' ),
        'insert_into_item'      => _x( 'Insert into client', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'client' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this client', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'client' ),
        'filter_items_list'     => _x( 'Filter clients list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'client' ),
        'items_list_navigation' => _x( 'Clients list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'client' ),
        'items_list'            => _x( 'Clients list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'client' ),
    ); 
	 $args = array(
		        'labels'             => $labels,
		        'description'        => 'Clients custom post type.',
		        'public'             => true,
		        'publicly_queryable' => true,
		        'show_ui'            => true,
		        'show_in_menu'       => true,
		        'query_var'          => true,
		        'rewrite'            => array( 'slug' => 'clients' ),
		        'capability_type'    => 'post',
		        'has_archive'        => true,
		        'hierarchical'       => false,
		        'menu_position'      => 20,
		        'supports'           => array( 'title', 'editor','custom-fields', 'author', 'thumbnail' ),
		        'taxonomies'         => array( 'category', 'post_tag' ),
		        'show_in_rest'       => true
		    ); 
    register_post_type('clients',$args);
   
}
add_action('init', 'superultra_clients_custom_post_type');

function superultra_services_custom_post_type() {
	$labels = array(
        'name'                  => _x( 'Services', 'Post type general name', 'service' ),
        'singular_name'         => _x( 'service', 'Post type singular name', 'service' ),
        'menu_name'             => _x( 'Services', 'Admin Menu text', 'service' ),
        'name_admin_bar'        => _x( 'service', 'Add New on Toolbar', 'service' ),
        'add_new'               => __( 'Add New', 'service' ),
        'add_new_item'          => __( 'Add New service', 'service' ),
        'new_item'              => __( 'New service', 'service' ),
        'edit_item'             => __( 'Edit service', 'service' ),
        'view_item'             => __( 'View service', 'service' ),
        'all_items'             => __( 'All services', 'service' ),
        'search_items'          => __( 'Search service', 'service' ),
        'parent_item_colon'     => __( 'Parent service:', 'service' ),
        'not_found'             => __( 'No services found.', 'service' ),
        'not_found_in_trash'    => __( 'No services found in Trash.', 'service' ),
        'featured_image'        => _x( 'Service Feature Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'service' ),
        'set_featured_image'    => _x( 'Set feature image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'service' ),
        'remove_featured_image' => _x( 'Remove feature image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'service' ),
        'use_featured_image'    => _x( 'Use as feature image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'service' ),
        'archives'              => _x( 'service archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'service' ),
        'insert_into_item'      => _x( 'Insert into service', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'service' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this service', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'service' ),
        'filter_items_list'     => _x( 'Filter services list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'service' ),
        'items_list_navigation' => _x( 'Services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'service' ),
        'items_list'            => _x( 'Services list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'service' ),
    ); 
	 $args = array(
		        'labels'             => $labels,
		        'description'        => 'Services custom post type.',
		        'public'             => true,
		        'publicly_queryable' => true,
		        'show_ui'            => true,
		        'show_in_menu'       => true,
		        'query_var'          => true,
		        'rewrite'            => array( 'slug' => 'services' ),
		        'capability_type'    => 'post',
		        'has_archive'        => true,
		        'hierarchical'       => false,
		        'menu_position'      => 20,
		        'supports'           => array( 'title', 'editor','custom-fields', 'author', 'thumbnail' ),
		        'taxonomies'         => array( 'category', 'post_tag' ),
		        'show_in_rest'       => true
		    ); 
    register_post_type('Services',$args);
   
}
add_action('init', 'superultra_services_custom_post_type');


// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

global $wp_version;
if ( $wp_version !== '4.7.1' ) {
return $data;
}

$filetype = wp_check_filetype( $filename, $mimes );

return [
  'ext'             => $filetype['ext'],
  'type'            => $filetype['type'],
  'proper_filename' => $data['proper_filename']
];

}, 10, 4 );

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

/**
 * Filter the except length.

 */


function superultra_excerpt_length( $length ) { 
    return 25;	
}
add_filter( 'excerpt_length', 'superultra_excerpt_length', 100 );
function superultra_excerpt_more( $more ) {
   	return ' ';
}
add_filter( 'excerpt_more', 'superultra_excerpt_more' );


// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination( $query ) {
		
		$prev_arrow = ' <span>&larr;</span> Prev ';
		$next_arrow = ' Next <span>&rarr;</span> ';
		
		global $wp_query;
		$total 	= $query->max_num_pages;
		$big 	= 999999999; 
		if( $total > 1 )  {
			 if( !$current_page = get_query_var( 'paged' ) )
				 $current_page 	= 1;
			 if( get_option( 'permalink_structure' ) ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			$pagination =  paginate_links( array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,				
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
			echo '<nav class="navigation pagination">
						<div class="nav-links">'.$pagination.'</div></nav>';
		}
	}
	
}
if ( !function_exists( 'superultra_pagination' ) ) {
	
	function superultra_pagination( $query ) {
		
		$prev_arrow = ' <span>&larr;</span> Prev ';
		$next_arrow = ' Next <span>&rarr;</span> ';
		
		global $wp_query;
		$total 	= $query->max_num_pages;
		$big 	= 999999999; 
		if( $total > 1 )  {
			 if( !$current_page = get_query_var( 'paged' ) )
				 $current_page 	= 1;
			 if( get_option( 'permalink_structure' ) ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			$pagination =  paginate_links( array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,				
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
			echo '<nav class="navigation pagination">
						<div class="nav-links">'.$pagination.'</div></nav>';
		}
	}
	
}

/* show template */
add_action('wp_head', 'show_template');
function show_template() {
global $template;
return basename($template);
}

 
/**
 * Customize the title for the home page, if one is not set.
 
 */
add_filter( 'wp_title', 'superultra_wp_title_for_home' );
function superultra_wp_title_for_home( $title )
{
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = get_bloginfo( 'name' ) . ' | ' . __( 'Home', 'textdomain' );
  }
  return $title;
}


if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'superultra_activation_notice' );
}

function superultra_activation_notice(){
    ?>
    <div class="updated notice is-dismissible">
        <p>Thank you for activating Super Ultra Theme. <strong>Please install and activate social-icons-widget-by-wpzoom, mailchimp-for-wp and favorites plugins.</strong>.</p>
    </div>
    <?php
} 