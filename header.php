<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package super-ultra-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title>.::<?php wp_title(''); ?>::.</title>
	<link href="https://fonts.googleapis.com/css?family=Abhaya+Libre:400,500,600,700,800|Nunito+Sans:400,400i,600,600i,700,700i" rel="stylesheet">
	
	<?php wp_head(); ?>
	<style type="text/css">	
	/* Style the form - display items horizontally */
	#mc4wp-form-1  { 
	 align-items: center;
	}
	/* Style the input fields */
	#mc4wp-form-1 .emailadd {
	vertical-align: middle;
	margin: 5px 10px 5px 0;
	padding: 10px;
	width:45%; 
	}
	#mc4wp-form-1 div .subscribetext{
	align-items: center;
	font-size: 15px;
	color: grey;			
	}
	.footer-social ul.social-list li > a:before, 
	.author-content-wrap ul.social-list li > a:before {
	content: "";
	text-transform: capitalize;
	}
	</style>
</head>


<body class=" <?php if ( show_template() == 'homepage-template.php' )echo ' home rightsidebar '; if ( show_template() == 'single.php' )echo ' single single-post rightsidebar';if (show_template() == 'search.php')echo 'search search-results list-view rightsidebar' ; if ( show_template() == '404.php' )echo ' error404 full-width '; if ( show_template() == 'blog.php' )echo ' home rightsidebar '; if ( show_template() == 'archive.php' )echo ' archive category rightsidebar list-view '; if ( show_template() == 'page.php' )echo ' page rightsidebar ';  if ( show_template() == 'author.php' )echo ' archive author rightsidebar list-view ';?>">
	
	<div id="page" class="site">

		<header class="site-header">
			<div class="container">
				<div class="menu-toggle">
					<span class="toggle-bar"></span>
					<span class="toggle-bar"></span>
					<span class="toggle-bar"></span>
				</div>
				<div class="site-branding logo-text">
					<div class="site-logo">
						<?php the_custom_logo();?>
					</div>
					<div class="site-text-wrap">
						<h1 class="site-title">
							<a href="<?php echo get_option("siteurl"); ?>" title="Super Ultra Theme"><?php echo str_replace(' ', '', get_bloginfo('name'));?></a>
						</h1>
						<p class="site-description"><?php echo get_bloginfo('description');?></p>
					</div>
				</div> <!-- .site-branding -->
				<div class="menu-wrap">
					<nav class="main-navigation">
						<button class="menu-toggle">
							<span class="toggle-bar"></span>
							<span class="toggle-bar"></span>
							<span class="toggle-bar"></span>
						</button>
						<?php
							wp_nav_menu(
								array(
									'menu'			=>'menu-1',										
									'items_wrap'     => '<ul class="nav-menu"><li class="current-menu-item"><?php __( "Menu:", "textdomain" ); ?></li>%3$s</ul>',
								)
							);
						?>						
					
					</nav>
					<div class="header-search">
						<span class="search-toggle">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><defs><style>.a{fill:none;}</style></defs><g transform="translate(83 -7842)"><rect class="a" width="18" height="18" transform="translate(-83 7842)"/><path d="M18,16.415l-3.736-3.736a7.751,7.751,0,0,0,1.585-4.755A7.876,7.876,0,0,0,7.925,0,7.876,7.876,0,0,0,0,7.925a7.876,7.876,0,0,0,7.925,7.925,7.751,7.751,0,0,0,4.755-1.585L16.415,18ZM2.264,7.925a5.605,5.605,0,0,1,5.66-5.66,5.605,5.605,0,0,1,5.66,5.66,5.605,5.605,0,0,1-5.66,5.66A5.605,5.605,0,0,1,2.264,7.925Z" transform="translate(-83 7842)"/></g></svg>
						</span>
						 <div class="header-search-form">
							<div class="container">
								<?php get_search_form();?>
								<span class="close"></span>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</header> <!-- .site-header -->


