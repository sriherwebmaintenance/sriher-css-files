<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="theme-color" content="#1D35AA"/>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/styles.css?version=1" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" type="text/css" media="screen" />
	<style>
		<?php if($variable=get_field('custom_css',get_the_ID())){echo $variable;}?>
	</style>

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Open+Sans:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;700&display=swap" rel="stylesheet">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if(!(get_site_icon_url())):?>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.svg" />
	<?php endif;
	wp_head(); ?>
	<script>
		<?php if($variable=get_field('google_analytics_script','option')){echo $variable;}?>
		<?php if($variable=get_field('custom_js_in_header','option')){echo $variable;}?>
	</script>

</head>
<body <?php body_class(); ?>>
<?php $pageID = get_the_ID(); global $post; ?>
<?php if((is_front_page() || is_home())) { ?>
<div class="preloader">
	<span class="loaderLogo">
		<?php if ( has_custom_logo() ) { ?>
			<?php the_custom_logo()?>
		<?php }
		else { ?>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>" />
		<?php } ?>
	</span>
</div>
<?php } ?>

<header class="header">
	<!-- Header content Here -->
	<div class="container">
		<div class="header-content">
			<div class="logo">
				<?php the_custom_logo()?>
				<div class="toggler">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="menu-items">
				<?php  wp_nav_menu(array( 'container' => '', 'theme_location' => 'header_menu' )); ?>
			</div>
			<div style="display:none" class="mobile-menu">
				<?php  wp_nav_menu(array( 'container' => '', 'theme_location' => 'mobile_menu' )); ?>
			</div>
		</div>
	</div>


</header>
