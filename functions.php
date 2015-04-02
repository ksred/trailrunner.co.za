<?php  global $themename, $input_prefix;

/*****************/
/* Theme Details */

$themename = "Personal";
$themeid = "personal";
$productid = "1640";
$presstrendsid = "mhernxqbkkc0n1q0ule4kfvwyzey0n2nf";

/**********************/
/* Include OCMX files */
$include_folders = array("/ocmx/includes/", "/ocmx/theme-setup/", "/ocmx/widgets/", "/ocmx/front-end/", "/ajax/", "/ocmx/interface/");


include_once (get_template_directory()."/ocmx/folder-class.php");
include_once (get_template_directory()."/ocmx/load-includes.php");
include_once (get_template_directory()."/ocmx/custom.php");

/**********************/
/* "Hook" up the OCMX */

update_option("ocmx_font_support", true);
add_action('init', 'ocmx_add_scripts');
add_action('after_setup_theme', 'ocmx_setup');


/*********************/
/* Load Localization */
load_theme_textdomain('ocmx', get_template_directory() . '/lang');

/***********************/
/* Add OCMX Menu Items */

add_action('admin_menu', 'ocmx_add_admin');
function ocmx_add_admin() {
	global $wpdb;
	
	add_object_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), '', 'http://obox-design.com/images/ocmx-favicon.png');
	
	//Check if we need to upgrade the Gallery Table
	check_gallery_table();
	
	add_submenu_page(basename(__FILE__), "General Options", "General", "edit_theme_options", basename(__FILE__), 'ocmx_general_options');
	add_submenu_page(basename(__FILE__), "Adverts", "Adverts", "administrator",  "ocmx-adverts", 'ocmx_advert_options');
	add_submenu_page(basename(__FILE__), "Typography", "Typography", "edit_theme_options", "ocmx-fonts", 'ocmx_font_options');
	add_submenu_page(basename(__FILE__), "Customize", "Customize", "edit_theme_options", "customize.php");
	add_submenu_page(basename(__FILE__), "Help", "Help", "edit_theme_options", "obox-help", 'ocmx_welcome_page');

	
};

/*****************/
/* Add Nav Menus */

if (function_exists('register_nav_menus')) :
	register_nav_menus( array(
		'primary' => __('Primary Navigation', '$themename')
	) );
endif;

/************************************************/
/* Fallback Function for WordPress Custom Menus */

function ocmx_fallback() {
	echo '<ul id="nav" class="clearfix">';
	wp_list_pages('title_li=&');
	echo '</ul>';
}

/*******************/
/* Widgetized Page */
function add_widgetized_pages(){
	global $wpdb;
	$get_widget_pages = $wpdb->get_results("SELECT * FROM ".$wpdb->postmeta." WHERE `meta_key` = '_wp_page_template' AND  `meta_value` = 'widget-page.php'");
	foreach($get_widget_pages as $pages) :
		$post = get_post($pages->post_id);
		register_sidebar(array("name" => $post->post_title." Body", "description" => "Place all 'Home Page Widgets' here.", "before_title" => '<h4 class="widgettitle">', "after_title" => '</h4><div class="content">', 'before_widget' => '<li id="%1$s" class="widget %2$s">', 'after_widget' => '</div></li>'));
	endforeach;
}
add_action("init", "add_widgetized_pages");


/**************************/
/* WP 3.4 Support         */
global $wp_version;
if ( version_compare( $wp_version, '3.4', '>=' ) ) 
	add_theme_support( 'custom-background' ); 
	add_theme_support( 'post-thumbnails' ); 
	add_theme_support( 'automatic-feed-links' ); 
	add_theme_support( 'post-formats', array( 'quote' ) );
	
if ( ! isset( $content_width ) ) $content_width = 980;


/************************/
/* Add WP Custom Header */
function ocmx_header_style() { $do = "nothing"; }
function ocmx_admin_header_style() { $do = "nothing"; }
	
$headerargs = array( 'wp-head-callback' => 'ocmx_header_style', 'admin-head-callback' => 'ocmx_admin_header_style', 'width' => '1980', 'height' => '350',  'header-text' => false, 'random-default' => true);
	add_theme_support( 'custom-header', $headerargs );
	
/******************************************************************************/
/* Each theme has their own "No Posts" styling, so it's kept in functions.php */

function ocmx_no_posts(){ ?>
<li class="post">
	<h2 class="post-title"><a href="#"><?php _e("No Content Found", "ocmx"); ?></a></h2>
    <div class="copy <?php echo $image_class; ?>">
	    <?php _e("The content you are looking for does not exist", "ocmx"); ?>
    </div>
</li>
<?php 
}
/**************************/
/* Set the Excerpt Length */
function new_excerpt_length($length) {
	return 35;
}
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_length', 'new_excerpt_length');
add_filter('excerpt_more', 'new_excerpt_more');

function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}

function my_admin_styles() {
	wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');

/**************************/
/* Set Up Thumbnails */
function ocmx_setup_image_sizes() {
	//image info: (name, width, height, force-crop)
	add_image_size('940x529', 940, 529, true);
	add_image_size('640x360', 640, 360, true);
	add_image_size('460x259', 460, 259, true);
	add_image_size('300x169', 300, 169, true);
	add_image_size('220x124', 220, 124, true);
	add_image_size('940auto', 940);
	add_image_size('620auto', 620);

} 

add_action( 'after_setup_theme', 'ocmx_setup_image_sizes' );


/**************************/
/* Facebook Support      */
function get_fbimage() {
	global $post;
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '', '' );
	$fbimage = null;
	if ( has_post_thumbnail($post->ID) ) {
		$fbimage = $src[0];
	} else {
		global $post, $posts;
		$fbimage = '';
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',
		$post->post_content, $matches);
		if(!empty($matches[1]))
			$fbimage = $matches [1] [0];
	}
	if(empty($fbimage)) {
		$fbimage = get_the_post_thumbnail($post->ID);
	}
	return $fbimage;
}

function search_form_shortcode( ) 
{
    ob_start();

    get_search_form( );

    $html = ob_get_contents();
    ob_end_clean();
        
    return $html;
}

add_shortcode('search_form', 'search_form_shortcode');
