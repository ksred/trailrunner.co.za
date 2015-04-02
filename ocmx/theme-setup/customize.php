<?php //OCMX Custom logo and Favicon

function ocmx_logo_register($wp_customize){
    
    $wp_customize->add_section('ocmx_general', array(
        'title'    => __('General Theme Settings', 'ocmx'),
        'priority' => 30,
    ));
    
   //Custom Colors
	
	$wp_customize->add_setting('ocmx_ignore_colours', array(
        'default'        => 'no',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('header_color_scheme', array(
        'label'      => __('Use Theme Default Color Scheme', 'ocmx'),
        'section'    => 'ocmx_general',
        'settings'   => 'ocmx_ignore_colours',
        'type'       => 'radio',
        'priority' => 0,
        'choices'    => array(
            'yes' => 'Yes',
            'no' => 'No'
        ),
    ));
 
    $wp_customize->add_setting('ocmx_custom_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'ocmx_custom_logo', array(
        'label'    => __('Custom Logo', 'ocmx'),
        'section'  => 'ocmx_general',
        'settings' => 'ocmx_custom_logo',
    )));
    
    $wp_customize->add_setting('ocmx_custom_favicon', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'ocmx_custom_favicon', array(
        'label'    => __('Custom Favicon', 'ocmx'),
        'section'  => 'ocmx_general',
        'settings' => 'ocmx_custom_favicon',
    )));
    
}

add_action('customize_register', 'ocmx_logo_register');

// OCMX Color Options 

function ocmx_customize_register($wp_customize) {


	// Header Color Scheme
	$wp_customize->add_section('header_color_scheme', array(
		'title' => __( 'Header Color Scheme', 'ocmx' ),
		'priority' => 35,
		)
	);
    
    $wp_customize->add_setting( 'ocmx_header_background', array(
		'default' => '#ffffff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_header_background', array(
		'label' => __( 'Header Background', 'ocmx' ),
		'section' => 'header_color_scheme',
		'settings' => 'ocmx_header_background',
		'priority' => 1,
	)));
	
	$wp_customize->add_setting( 'ocmx_header_border', array(
		'default' => '#e4e4e4',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_header_border', array(
		'label' => __( 'Header Border', 'ocmx' ),
		'section' => 'header_color_scheme',
		'settings' => 'ocmx_header_border',
		'priority' => 5,
	)));
    
	$wp_customize->add_setting( 'ocmx_logo_color', array(
		'default' => '#000000',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_logo_color', array(
		'label' => __( 'Header Text Color', 'ocmx' ),
		'section' => 'header_color_scheme',
		'settings' => 'ocmx_logo_color',
		'priority' => 10,
	)));
	
    $wp_customize->add_setting( 'ocmx_navigation_font_color', array(
		'default' => '#777',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_navigation_font_color', array(
		'label' => __( 'Navigation Links', 'ocmx' ),
		'section' => 'header_color_scheme',
		'settings' => 'ocmx_navigation_font_color',
		'priority' => 20,
	)));
	
	$wp_customize->add_setting( 'ocmx_navigation_hover', array(
		'default' => '#000',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_navigation_hover', array(
		'label' => __( 'Navigation Hover', 'ocmx' ),
		'section' => 'header_color_scheme',
		'settings' => 'ocmx_navigation_hover',
		'priority' => 30,
	)));
	
	
	// Content Color Scheme
	$wp_customize->add_section('content_color_scheme', array(
		'title' => __( 'Content Color Scheme', 'ocmx' ),
		'priority' => 36
		)
	);
		
	$wp_customize->add_setting( 'ocmx_post_titles_font_color', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_post_titles_font_color', array(
		'label' => __( 'Post Titles Color', 'ocmx' ),
		'section' => 'content_color_scheme',
		'settings' => 'ocmx_post_titles_font_color',
		'priority' => 1,
	)));
	
	$wp_customize->add_setting( 'ocmx_post_titles_hover', array(
		'default' => '#7c7a45',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_post_titles_hover', array(
		'label' => __( 'Post Titles Hover Color', 'ocmx' ),
		'section' => 'content_color_scheme',
		'settings' => 'ocmx_post_titles_hover',
		'priority' => 10,
	)));
    
    $wp_customize->add_setting( 'ocmx_widget_titles_font_color', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_widget_titles_font_color', array(
		'label' => __( 'Widget Titles', 'ocmx' ),
		'section' => 'content_color_scheme',
		'settings' => 'ocmx_widget_titles_font_color',
		'priority' => 20,
	)));
	
	$wp_customize->add_setting( 'ocmx_date_meta', array(
		'default' => '#777',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_date_meta', array(
		'label' => __( 'Dates', 'ocmx' ),
		'section' => 'content_color_scheme',
		'settings' => 'ocmx_date_meta',
		'priority' => 30,
	)));
	
	$wp_customize->add_setting( 'ocmx_general_font_color', array(
		'default' => '#494949',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_general_font_color', array(
		'label' => __( 'General Body Text Color', 'ocmx' ),
		'section' => 'content_color_scheme',
		'settings' => 'ocmx_general_font_color',
		'priority' => 40,
	)));
	
	$wp_customize->add_setting( 'ocmx_body_links', array(
		'default' => '#9a9657',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_body_links', array(
		'label' => __( 'General Link Color', 'ocmx' ),
		'section' => 'content_color_scheme',
		'settings' => 'ocmx_body_links',
		'priority' => 50,
	)));
	
	$wp_customize->add_setting( 'ocmx_body_links_hover', array(
		'default' => '#000',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_body_links_hover', array(
		'label' => __( 'General Link Color Hover', 'ocmx' ),
		'section' => 'content_color_scheme',
		'settings' => 'ocmx_body_links_hover',
		'priority' => 60,
	)));
	
	$wp_customize->add_setting( 'ocmx_border_color', array(
		'default' => '#CCCAB1',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_border_color', array(
		'label' => __( 'Border Colors', 'ocmx' ),
		'section' => 'content_color_scheme',
		'settings' => 'ocmx_border_color',
		'priority' => 70,
	)));
	
	$wp_customize->add_setting( 'ocmx_buttons_icons', array(
		'default' => '#cccbaf',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_buttons_icons', array(
		'label' => __( 'Buttons and Icons', 'ocmx' ),
		'section' => 'content_color_scheme',
		'settings' => 'ocmx_buttons_icons',
		'priority' => 80,
	)));
	
	// Footer Color Scheme
	$wp_customize->add_section('footer_color_scheme', array(
		'title' => __( 'Footer Color Scheme', 'ocmx' ),
		'priority' => 37,
		)
	);
	
	$wp_customize->add_setting( 'ocmx_footer_background', array(
		'default' => '#ffffff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_footer_background', array(
		'label' => __( 'Footer Background', 'ocmx' ),
		'section' => 'footer_color_scheme',
		'settings' => 'ocmx_footer_background',
		'priority' => 1,
	)));
	
	$wp_customize->add_setting( 'ocmx_footer_text', array(
		'default' => '#494949',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_footer_text', array(
		'label' => __( 'Footer Text', 'ocmx' ),
		'section' => 'footer_color_scheme',
		'settings' => 'ocmx_footer_text',
		'priority' => 10,
	)));
	
	$wp_customize->add_setting( 'ocmx_footer_links', array(
		'default' => '#9A9657',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_footer_links', array(
		'label' => __( 'Footer Links', 'ocmx' ),
		'section' => 'footer_color_scheme',
		'settings' => 'ocmx_footer_links',
		'priority' => 20,
	)));
	
	$wp_customize->add_setting( 'ocmx_footer_link_hover', array(
		'default' => '#000000',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_footer_link_hover', array(
		'label' => __( 'Footer Link Hover', 'ocmx' ),
		'section' => 'footer_color_scheme',
		'settings' => 'ocmx_footer_link_hover',
		'priority' => 30,
	)));
	
	$wp_customize->add_setting( 'ocmx_footer_widget_title', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_footer_widget_title', array(
		'label' => __( 'Footer Widget Titles', 'ocmx' ),
		'section' => 'footer_color_scheme',
		'settings' => 'ocmx_footer_widget_title',
		'priority' => 40,
	)));
	
	wp_reset_query();

//ADD JQUERY

if ( $wp_customize->is_preview() && ! is_admin() )
	add_action( 'wp_footer', 'ocmx_customize_preview', 21);
	
	function ocmx_customize_preview() {
	?>
	<script type="text/javascript">

	( function( $ ){
	
		wp.customize('ocmx_header_background',function( value ) {
			value.bind(function(to) {
				jQuery('#header-container').css({'backgroundColor': to});
			});
		});
		
		wp.customize('ocmx_header_border',function( value ) {
			value.bind(function(to) {
				jQuery('#header-container').css({'borderColor': to});
			});
		});
		
		wp.customize('ocmx_logo_color',function( value ) {
			value.bind(function(to) {
				jQuery('.logo h1 a').css({'color': to});
			});
		});
	
		
		wp.customize('ocmx_navigation_font_color',function( value ) {
			value.bind(function(to) {
				jQuery('.tagline, ul#nav li a').css({'color': to});
			});
		});
		
		wp.customize('ocmx_post_titles_font_color',function( value ) {
			value.bind(function(to) {
				jQuery('.post-title, .post-title a').css({'color': to});
			});
		});
		
		wp.customize('ocmx_date_meta',function( value ) {
			value.bind(function(to) {
				jQuery('.content-widget .date, .dater, .post-title-block .date, #right-column .widget .dater, .archives_list .date, .comment .date, .three-column .date').css({'color': to});
			});
		});
		
		wp.customize('ocmx_general_font_color',function( value ) {
			value.bind(function(to) {
				jQuery('body, #crumbs li, .portfolio-category-list .selected, .post-title span, .logged-in-as, label').css({'color': to});
			});
		});
		
		wp.customize('ocmx_body_links',function( value ) {
			value.bind(function(to) {
				jQuery('.copy a, .content a, .obox-credit a, .archives_list a, .comment-post a, #crumbs li a, .portfolio-category-list a, .tags li a, .logged-in-as a, .next-prev-post-nav a, .date a').css({'color': to});
			});
		});
		
		wp.customize('ocmx_border_color',function( value ) {
			value.bind(function(to) {
				jQuery('#comments, .next-prev-post-nav, .section-title, .one-column li, #footer-container, .footer-text, .comments-open, .related-posts, #right-column .widget li, .content-widget, .pagination, .pagination a, .blog-main-post-container li.post, .archives_list li, .one-column .post-meta .post-author, .threaded-comments li.comment, .comment, .portfolio-content .post-title, .portfolio-content #left-column, input[type="text"], textarea, .chirp span.meta').css({'borderColor': to});
			});
		});
		
		wp.customize('ocmx_buttons_icons',function( value ) {
			value.bind(function(to) {
				jQuery('.comments-icon, .author-icon, button, input[type="button"], input[type="submit"], .slider .next, .slider .previous').css({'backgroundColor': to});
			});
		});
		
		wp.customize('ocmx_widget_titles_font_color',function( value ) {
			value.bind(function(to) {
				jQuery('#reply-title, #right-column .widgettitle, #right-column .widgettitle a, .footer-widgets .widgettitle, .footer-widgets .widgettitle a, .comments h3').css({'color': to});
			});
		});
	
		wp.customize('ocmx_footer_background',function( value ) {
			value.bind(function(to) {
				jQuery('#footer-container').css({'backgroundColor': to});
			});
		});
		
		wp.customize('ocmx_footer_text',function( value ) {
			value.bind(function(to) {
				jQuery('#footer-container, .footer-widgets').css({'color': to});
			});
		});
		
		wp.customize('ocmx_footer_links',function( value ) {
			value.bind(function(to) {
				jQuery('#footer-container a').css({'color': to});
			});
		});
		
		wp.customize('ocmx_footer_link_hover',function( value ) {
			value.bind(function(to) {
				jQuery('#footer-container a:hover').css({'color': to});
			});
		});
		
		wp.customize('ocmx_footer_widget_title',function( value ) {
			value.bind(function(to) {
				jQuery('.footer-widgets .widgettitle, .footer-widgets .widgettitle a').css({'color': to});
			});
		});
	
	} )( jQuery );
	</script>
<?php } 

//ADD POST MESSAGE
}
add_action( 'customize_register', 'ocmx_customize_register' );

function ocmx_add_query_vars($query_vars) {
	$query_vars[] = 'stylesheet';
	return $query_vars;
}
add_filter( 'query_vars', 'ocmx_add_query_vars' );
function ocmx_takeover_css() {
	    $style = get_query_var('stylesheet');
	    if($style == "custom") {
		    include_once(TEMPLATEPATH . '/style.php');
	        exit;
	    }
	}
add_action( 'template_redirect', 'ocmx_takeover_css');