<?php
/*------- Theme Supports ---------*/
add_action( 'after_setup_theme', 'res_theme_support' );
function res_theme_support() {
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-formats' );
    add_theme_support('post-thumbnails');
    add_post_type_support('page', 'excerpt');
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    // Woocommerce Support
    add_theme_support( 'woocommerce' );
    //Woocommerce gallery support
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    /*** end ***/
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'awpr_flush_rewrite_rules' );
function awpr_flush_rewrite_rules() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}

/*------------- Disallow Backend Editting ----------------*/
define( 'DISALLOW_FILE_EDIT', true );

/*-------------- Disable XMLRPC ---------------------*/
add_filter('xmlrpc_enabled', '__return_false');

/*------------- Hide Wordpress Version Generator ---------------*/
add_filter('the_generator', 'version');
function version() {
  return '';
}

/*----------- Remove WP-Embed script ---------------*/
function disable_embeds_init() {
    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');
    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'disable_embeds_init', 9999);

/*------- Remove emoji script and css ------*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/*---------- Include BFI Thumb ---------------*/
require_once('includes/BFI_Thumb.php');

/*---------------acf Settings ----------*/
include_once( 'includes/acf-pro/acf.php' );

add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
	// update path
	$path = get_bloginfo('stylesheet_directory') . '/includes/acf-pro/';
	// return
	return $path;
}

add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
	$dir = get_stylesheet_directory_uri() . '/includes/acf-pro/';

	return $dir;
}

/**
 * acf options page
*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'  => 'Theme General Settings',
		'menu_title'  => 'Common Content',
		'menu_slug'   => 'theme-general-settings',
		'capability'  => 'edit_posts',
		'redirect'    => false
	));
	acf_add_options_sub_page(array(
		'page_title'  => 'Footer',
		'menu_title'  => 'Footer',
		'parent_slug' => 'theme-general-settings',
	));
    acf_add_options_sub_page(array(
		'page_title'  => 'Miscellaneous',
		'menu_title'  => 'Miscellaneous',
		'parent_slug' => 'theme-general-settings',
	));
}

/**
 * Remove acf sttings from backend
*/
//add_filter( 'acf/settings/show_admin', '__return_false' );

/*------- Excerpt -------*/
function new_excerpt_length($length) {
    return 200;  // length used for media press release
}
add_filter('excerpt_length', 'new_excerpt_length');

function trim_excerpt($more) {
    return '...';
}
add_filter('excerpt_more', 'trim_excerpt');
/*** end ***/

/*----- svg support -----*/
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/*----- custom post archive -----*/
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag() || is_month() || is_day() || is_year()) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = get_post_types();
    $query->set('post_type',$post_type);
    return $query;
  }
}

/*----- Wp Login Page Logo Link ------*/
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
	return get_home_url();
}

/*------ Wp login Page Logo Change ---------*/
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('<?php echo $image[0]; ?>');
            padding-bottom: 0;
            background-size: 311px auto;
            height: 74px;
            width: 311px;
        }
    </style>
<?php }

/*------- Enqueue Scripts & Styles --------*/
add_action('wp_enqueue_scripts', 'theme_scripts_styles');
function theme_scripts_styles() {
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');
    wp_register_script('jquery-migrate', get_template_directory_uri() . '/js/migrate.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-migrate');

    //Custom
	wp_register_script('Swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', array('jquery'), '', true);
	wp_register_script('sticky', get_template_directory_uri() . '/js/sticky.js', array('jquery'), '', true);
    wp_register_script( 'common_scripts', get_template_directory_uri() . '/js/common.js', array('jquery'), '', true );
    wp_register_script('magnificPopup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '', true);
    wp_register_script('validate', get_template_directory_uri() . '/js/validate.js', array('jquery'), '', true);
    wp_register_script('aos', get_template_directory_uri() . '/js/aos.js', array('jquery'), '', true);

    wp_enqueue_script('common_scripts');
    wp_enqueue_script('magnificPopup');
    wp_enqueue_script('aos');

}

/*------ Remove script attributes -------*/
add_filter('style_loader_tag', 'mtheme_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'mtheme_remove_type_attr', 10, 2);
function mtheme_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

/**
 * Adding Defer attribute to scripts
*/
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
function add_defer_attribute($tag, $handle) {
    // add script handles to the array below
    $scripts_to_defer = array('google_map');

    foreach($scripts_to_defer as $defer_script) {
       if ($defer_script === $handle) {
          return str_replace(' src', ' defer="defer" src', $tag);
       }
    }
    return $tag;
}

/*------- remove css and js versions --------*/
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

/*-------- Move header scripts to footer ------*/
function remove_head_scripts() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);

    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

/*------ Register Navigation Menu -------*/
register_nav_menus(
    array(
        'header_menu' => 'Header Menu',
        'footer_first_col_menu'=> 'Footer first column Menu',
        'footer_second_col_menu'=> 'Footer second column Menu',
        'footer_third_col_menu'=> 'Footer third column Menu',
        'footer_fourth_col_menu'=> 'Footer fourth column Menu',
        'mobile_menu'=> 'Mobile Menu',
	)
);

/*---------- Register Widgets Area ---------*/
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
	register_sidebar(array(
        'id' => 'footer_widgets',
		'name' => 'Footer Widgets',
		'before_widget' => '<div class="fw-inner-col col-sm-3">',
		'after_widget' => '</div></div>',
		'before_title' => '<h5 class="fw-title">',
		'after_title' => '</h5><div class="fw-content">',
	));
}

/*----------- Register Post Type ------------*/
function theme_posttype() {
	register_post_type('services', array('label' => 'Services',
	'description' => '',
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'has_archive' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'query_var' => true,
	'exclude_from_search' => true,
	'show_in_rest' => true,
		'supports' => array('title','custom-fields','editor'),
		'menu_icon'   => 'dashicons-admin-generic',
		'labels' => array(
			'name' => 'Services',
			'singular_name' => 'service',
			'menu_name' => 'Services',
			'add_new' => 'Add New service',
			'add_new_item' => 'Add New service',
			'edit' => 'Edit service',
			'edit_item' => 'Edit service',
			'new_item' => 'New service',
			'view' => 'View service',
			'view_item' => 'View service',
			'search_items' => 'Search services',
			'not_found' => 'No services Found',
			'not_found_in_trash' => 'No services Found in Trash',
		'parent' => 'Parent service',
	)));

	register_post_type('event', array('label' => 'events',
	'description' => '',
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'has_archive' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'query_var' => true,
	'exclude_from_search' => true,
	'show_in_rest' => false,
		'supports' => array('title','custom-fields'),
		// 'menu_icon'   => 'dashicons-admin-generic',
		'labels' => array(
			'name' => 'events',
			'singular_name' => 'event',
			'menu_name' => 'Events',
			'add_new' => 'Add New event',
			'add_new_item' => 'Add New event',
			'edit' => 'Edit event',
			'edit_item' => 'Edit event',
			'new_item' => 'New event',
			'view' => 'View event',
			'view_item' => 'View event',
			'search_items' => 'Search events',
			'not_found' => 'No events Found',
			'not_found_in_trash' => 'No events Found in Trash',
		'parent' => 'Parent event',
	)));

	register_post_type('programmes', array('label' => 'Services',
	'description' => '',
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'has_archive' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'query_var' => true,
	'exclude_from_search' => true,
	'show_in_rest' => false,
		'supports' => array('title','custom-fields','thumbnail'),
		'menu_icon'   => 'dashicons-welcome-learn-more',
		'labels' => array(
			'name' => 'programmes',
			'singular_name' => 'programme',
			'menu_name' => 'Programmes',
			'add_new' => 'Add New programme',
			'add_new_item' => 'Add New programme',
			'edit' => 'Edit programme',
			'edit_item' => 'Edit programme',
			'new_item' => 'New programme',
			'view' => 'View programme',
			'view_item' => 'View programme',
			'search_items' => 'Search programmes',
			'not_found' => 'No programmes Found',
			'not_found_in_trash' => 'No programmes Found in Trash',
		'parent' => 'Parent programme',
	)));


			//programmes taxonomy
			$programmeslabels = array(
				'name'              => _x( 'programmes Category', 'taxonomy general name', 'textdomain' ),
				'singular_name'     => _x( 'programmes Category', 'taxonomy singular name', 'textdomain' ),
				'search_items'      => __( 'Search Category', 'textdomain' ),
				'all_items'         => __( 'All Category', 'textdomain' ),
				'parent_item'       => __( 'Parent Category', 'textdomain' ),
				'parent_item_colon' => __( 'Parent Category:', 'textdomain' ),
				'edit_item'         => __( 'Edit Category', 'textdomain' ),
				'update_item'       => __( 'Update Category', 'textdomain' ),
				'add_new_item'      => __( 'Add New Category', 'textdomain' ),
				'new_item_name'     => __( 'New Category Name', 'textdomain' ),
				'menu_name'         => __( 'programmes Categories', 'textdomain' ),
				'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			);
			$programmesargs = array(
				'hierarchical'      => true,
				'labels'            => $programmeslabels,
				'supports'              => array( 'title','custom-fields','thumbnail' ),
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'show_in_rest' 		=> true,
			);

			register_taxonomy( 'programmes-category', 'programmes', $programmesargs );
    }
add_action('init', 'theme_posttype');


/************* news loadmore ajax */
add_action('wp_ajax_news_loadmore' , 'fn_news_loadmore');
add_action('wp_ajax_nopriv_news_loadmore','fn_news_loadmore');
function fn_news_loadmore(){
	$offset=$_POST['offset'];
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' =>3,
		'offset'=>$offset,
	);
	$news = new WP_Query($args);ob_start();
	if($news->have_posts()){while($news->have_posts()){$news->the_post();
		?>
		<div class="card">
			<?php if (has_post_thumbnail()) {
				$img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');?>
				<img src="<?php echo $img_url[0]?>" alt="image">
			<?php }?>
			<div class="cardText">
				<h3><?php the_title()?></h3>
				<p><?php the_excerpt()?></p>
				<a title="Click to more details" href="<?php echo get_permalink()?>">Read more <svg xmlns="http://www.w3.org/2000/svg" width="7" height="11" viewBox="0 0 7 11" fill="none"><path d="M1.45312 1.59741L5.33044 5.329L1.45312 9.06059" stroke="#007FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
			</div>
		</div>
	<?php }}?>



	<?php $postscontent= ob_get_contents();
	$total_post=$news->found_posts;
   	ob_end_clean();
	$r = array( "postscontent" => $postscontent,"total_post" => $total_post);
 	echo json_encode($r);
	die();
}
/************* end news loadmore ajax */


/************* events loadmore ajax */
add_action('wp_ajax_events_loadmore' , 'fn_events_loadmore');
add_action('wp_ajax_nopriv_events_loadmore','fn_events_loadmore');
function fn_events_loadmore(){
	$offset=$_POST['offset'];
	$args = array(
		'post_type' => 'event',
		'post_status' => 'publish',
		'posts_per_page' =>3,
		'offset'=>$offset,
	);
	$event = new WP_Query($args);ob_start();
	if($event->have_posts()){while($event->have_posts()){$event->the_post();
		?>
		<div class="card">
			<?php if (has_post_thumbnail()) {
				$img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');?>
				<img src="<?php echo $img_url[0]?>" alt="image">
			<?php }?>
			<div class="cardText">
				<h3><?php the_title()?></h3>
				<p><?php the_excerpt()?></p>
				<a title="Click to more details" href="<?php echo get_permalink()?>">Read more <svg xmlns="http://www.w3.org/2000/svg" width="7" height="11" viewBox="0 0 7 11" fill="none"><path d="M1.45312 1.59741L5.33044 5.329L1.45312 9.06059" stroke="#007FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
			</div>
		</div>
	<?php }}?>



	<?php $postscontent= ob_get_contents();
	$total_post=$event->found_posts;
   	ob_end_clean();
	$r = array( "postscontent" => $postscontent,"total_post" => $total_post);
 	echo json_encode($r);
	die();
}
/************* end events loadmore ajax */

// Remove category archives
add_action('template_redirect', 'jltwp_adminify_remove_archives_category');
function jltwp_adminify_remove_archives_category()
{
    if (is_category()){
        $target = get_option('siteurl');
        $status = '301';
        wp_redirect($target, 301);
        die();
    }
}
?>