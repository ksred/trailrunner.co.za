<?php function ocmx_theme_options(){
	global $obox_meta, $theme_options;
	if(!isset($theme_options))
		$theme_options = array();
	$theme_options["general_site_options"] =
			array(
				array("label" => "Custom Logo", "description" => "Full URL or folder path to your custom logo.", "name" => "ocmx_custom_logo", "default" => "", "id" => "upload_button", "input_type" => "file", "args" => array("width" => 90, "height" => 75)),
				array("label" => "Favicon", "description" => "Select a favicon for your site", "name" => "ocmx_custom_favicon", "default" => "", "id" => "upload_button_favicon", "input_type" => "file", "sub_title" => "favicon", "args" => array("width" => 16, "height" => 16)),	
				array("label" => "Custom Login Logo", "description" => "Select a custom login logo, recommended dimensions (326px x 82px)", "name" => "ocmx_custom_login", "default" => "", "id" => "upload_button_login", "input_type" => "file", "sub_title" => "login logo", "args" => array("width" => 326, "height" => 82)),   
				array(
					"main_section" => "Facebook Sharing Options",
					"main_description" => "Set a default image URL to appear on Facebook shares if no featured image is found. Recommended size 200x200.",
					"sub_elements" =>
						array(
							array("label" => "Disable OpenGraph?", "description" => "Select No if you want to disable the theme's OpenGraph support(do this only if using a conflicting plugin)", "name" => "ocmx_open_graph", "default" => "no", "id" => "ocmx_open_graph", "input_type" => 'select', 'options' => array('Yes' => 'yes', 'No' => 'no')
							),

							array("label" => "Image URL", "description" => "", "name" => "ocmx_site_thumbnail", "sub_title" => "Open Graph image", "default" => "", "id" => "upload_button_ocmx_site_thumbnail", "input_type" => "file", "args" => array("width" => 80, "height" => 80)
							)
						)
				),
				array(
					"main_section" => "Custom Styling",
					"main_description" => "Set your own custom social buttons and CSS for any element you wish to restyle.",
					"sub_elements" => 
						array(
				  
							array("label" => "Custom CSS", "description" => "Enter changed classes from the theme stylesheet, or custom CSS here.", "name" => "ocmx_custom_css", "default" => "", "id" => "ocmx_custom_css", "input_type" => "memo"),
							array("label" => "Social Widget Code", "description" => "Paste the template tag or code for your social sharing plugin here.", "name" => "ocmx_social_tag", "default" => "", "id" => "", "input_type" => "memo"),
				             )
				    ),
				array(
					"main_section" => "Thumbnail Settings",
					"main_description" => "These settings will control which thumbnails your site will prioritize.",
					"sub_elements" => 
						array(
							array("label" => "Thumbnail Position", "description" => "Select the location of the thumbnail on a post page", "name" => "ocmx_thumbnail_position", "default" => "top", "id" => "ocmx_thumbnail_position", "input_type" => "select", "options" => array("In Copy" => "in", "Above Copy" => "top")),	
							array("label" => "Auto-Generate Thumbnails", "description" => "Auto-generate video thumbnails from your video host in blog and archives if oEmbed links are used. Does not affect widgets.", "name" => "ocmx_video_thumbs", "default" => "off", "id" => "ocmx_video_thumbs", "input_type" => "checkbox"),
						)
					),
				array(
				"main_section" => "Full Posts or Excerpts?",
				"main_description" => "Select whether to show full posts or excerpts in your archives/ blog list.",
				"sub_elements" => 
				array(
						array("label" => "Content Length", "description" => "Selecting excerpts will show the Read More link.","name" => "ocmx_content_length", "default" => "yes", "id" => "ocmx_content_length", "input_type" => 'select', 'options' => array('Show Excerpts' => 'yes', 'Show Full Post Content' => 'no'))
		                 )
				     ),
				array(
						"main_section" => "Post Meta",
						"main_description" => "These settings control which post meta is displayed in posts.",
						"sub_elements" => 
							array(							
								array("label" => "Show Author & Comments (Homepage Blog Layout)", "description" => "Uncheck to hide the author & comment block. ","name" => "ocmx_meta_author_comment", "", "default" => "true", "id" => "ocmx_meta_author_comment", "input_type" => "checkbox"),
								array("label" => "Show Date on Posts", "description" => "Uncheck to hide the date. ","name" => "ocmx_meta_date_post", "", "default" => "true", "id" => "ocmx_meta_date_post", "input_type" => "checkbox"),
								array("label" => "Show Category on Posts", "description" => "Uncheck to hide the category. ","name" => "ocmx_meta_category_post", "", "default" => "true", "id" => "ocmx_meta_category_post", "input_type" => "checkbox"),
								array("label" => "Show Author on Posts", "description" => "Uncheck to hide the author. ","name" => "ocmx_meta_author_post", "", "default" => "true", "id" => "ocmx_meta_author_post", "input_type" => "checkbox"),
								
								array("label" => "Tags", "description" => "Check to show tags on single posts", "name" => "ocmx_meta_tags", "default" => "true", "id" => "ocmx_meta_tags", "input_type" => "checkbox"),
								array("label" => "Social Sharing on Posts", "description" => "Uncheck to hide the Sharing buttons on posts and products.", "name" => "ocmx_meta_social_post", "default" => "true", "id" => "ocmx_meta_social_post", "input_type" => "checkbox"),
								array("label" => "Next & Previous Posts", "description" => "Uncheck to hide Next and Previois post links in posts and portfolio items", "name" => "ocmx_meta_post_links", "default" => "on", "id" => "ocmx_meta_post_links", "input_type" => "checkbox")
							)
						),
				array(
						"main_section" => "Page Meta",
						"main_description" => "These settings control which post meta is displayed in pages.",
						"sub_elements" => 
							array(
								array("label" => "Show Date on Pages", "description" => "Uncheck to hide the date. ","name" => "ocmx_meta_date_page", "", "default" => "true", "id" => "ocmx_meta_date_page", "input_type" => "checkbox"),
								array("label" => "Show Author on Pages", "description" => "Uncheck to hide the author. ","name" => "ocmx_meta_author_page", "", "default" => "true", "id" => "ocmx_meta_author_page", "input_type" => "checkbox"),
								array("label" => "Social Sharing on Pages", "description" => "Uncheck to hide the Sharing buttons on posts and products.", "name" => "ocmx_meta_social_page", "default" => "true", "id" => "ocmx_meta_social", "input_type" => "checkbox"),
							)
						),
				array("label" => "Custom RSS URL", "description" => "Paste the URL to your custom RSS feed, such as Feedburner.", "name" => "ocmx_rss_url", "default" => "", "id" => "", "input_type" => "text"),	   
				array(
					"main_section" => "Press Trends Analytics",
					"main_description" => "Select Yes Opt out. No personal data is collected.",
					"sub_elements" => 
					array(
						array("label" => "Disable Press Trends?", "description" => "PressTrends helps Obox build better themes and provide awesome support by retrieving aggregated stats. PressTrends also provides a <a href='http://wordpress.org/extend/plugins/presstrends/' title='PressTrends Plugin for WordPress' target='_blank'>plugin for you</a> that delivers stats on how your site is performing against similar sites like yours. <a href='http://www.presstrends.me' title='PressTrends' target='_blank'>Learn more…</a>","name" => "ocmx_disable_press_trends", "default" => "no", "id" => "ocmx_disable_press_trends", "input_type" => 'select', 'options' => array('Yes' => 'yes', 'No' => 'no'))
		                 )
				     )
			);
					
	$theme_options["footer_options"] = array(
				array("label" => "Custom Footer Text", "description" => "", "name" => "ocmx_custom_footer", "default" => "Copyright ".date("Y")." Personal was created in WordPress by Obox Themes."	, "id" => "ocmx_custom_footer", "input_type" => "memo"),
				array("label" => "Hide Obox Logo", "description" => "Hide the Obox Logo from the footer.", "name" => "ocmx_logo_hide", "default" => "false", "id" => "ocmx_logo_hide", "input_type" => "checkbox"),
				array("label" => "Site Analytics", "description" => "Enter in the Google Analytics Script here.","name" => "ocmx_googleAnalytics", "default" => "", "id" => "","input_type" => "memo")
	);
	
	$theme_options["home_page_options"] = array(
		array(
			  	"label" => "Home Page Layout",
				"description" => "Select whether you'd like to have a Blog home page with a sidebar, or use the business layout.",
				"name" => "ocmx_home_page_layout", "default" => "blog",
				"id" => "ocmx_home_page_layout",
				"input_type" => "hidden",
				"default" => "blog",
				"options" => 
					array(
							"blog" => array("label" => "Blog Layout", "description" => "Perfect if you just want your site to be a blog.", "image" => get_template_directory_uri()."/ocmx/images/blog-layout.png"),
							"widget" => array("label" => "Widget Driven (Advanced)", "description" => "You determine how to layout your page via widgets.", "image" => get_template_directory_uri()."/ocmx/images/widgetized-layout.png"),
						)
				)
	);
	
	$theme_options["sidebar_options"] = array(
		array(
			  	"label" => "Sidebar Layout",
				"description" => "",
				"name" => "ocmx_sidebar_layout", "default" => "sidebarright",
				"id" => "ocmx_sidebar_layout",
				"input_type" => "hidden",
				"default" => "sidebarright",
				"options" => 
					array(
							"sidebarleft" => array("label" => "Sidebar Left", "description" => "", "image" => get_template_directory_uri()."/ocmx/images/sidebar-left.png"),
						  	"sidebarnone" => array("label" => "No Sidebar", "description" => "", "image" => get_template_directory_uri()."/ocmx/images/sidebar-none.png"),
							"sidebarright" => array("label" => "Sidebar Right", "description" => "", "image" => get_template_directory_uri()."/ocmx/images/sidebar-right.png"),
						)
				)
	);
	
	$theme_options["small_ad_options"] = array(
		array(
				"label" => "Number of Small Ads", 
				"description" => "When using the select box, you must click \"Save Changes\" before the blocks are added or removed.", 
				"name" => "ocmx_small_ads", 
				"id" =>  "ocmx_small_ads",
				"prefix" => "ocmx_small_ad",
				"default" => "0", 
				"input_type" => "select", 
				"options" => array("None" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10"), 
				"args" => array("width" => 125, "height" => "125")
			)
	  );

	$theme_options["medium_ad_options"] = array( 
		array(
				"label" => "Number of Medium Ads", 
				"description" => "", 
				"name" => "ocmx_medium_ads", 
				"id" =>  "ocmx_medium_ads",
				"prefix" => "ocmx_medium_ad", 
				"default" => "0", 
				"input_type" => "select", 
				"options" => array("None" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10"), 
				"args" => array("width" => 300, "height" => "250")
			)
		);
	
}
add_action("init", "ocmx_theme_options"); 
	
/***************************************************************************/
/* Setup Defaults for this theme for optiosn which aren't set in this page */
if(is_admin() && !get_option(isset($themeid)."-defaults")) :
	update_option("ocmx_general_font_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_navigation_font_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_sub_navigation_font_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_post_font_titles_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_post_font_meta_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_post_font_copy_font_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_widget_font_titles_font_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_widget_footer_titles_font_size_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	
	
	update_option("ocmx_general_font_color_default", "#333");
	update_option("ocmx_navigation_font_color_default", "#777");
	update_option("ocmx_sub_navigation_font_color_default", "#333");
	update_option("ocmx_post_titles_font_color_default", "#333");
	update_option("ocmx_post_meta_font_color_default", "#999");
	update_option("ocmx_post_copy_font_color_default", "#333");
	update_option("ocmx_widget_titles_font_color_default", "#999");
	update_option("ocmx_widget_footer_titles_font_color_default", "#999");
	
	update_option("ocmx_general_font_size_default", "17");
	update_option("ocmx_navigation_font_size_default", "12");
	update_option("ocmx_sub_navigation_font_size_default", "12");
	update_option("ocmx_post_titles_font_size_default", "10");
	update_option("ocmx_post_meta_font_size_default", "13");
	update_option("ocmx_post_copy_font_size_default", "17");
	update_option("ocmx_widget_titles_font_size_default", "15");
	update_option("ocmx_widget_footer_titles_font_size_default", "15");
	update_option($themeid."-defaults", 1);
endif;
update_option("allow_gallery_effect", "1");

add_action("switch_theme", "remove_ocmx_gallery_effects"); 
function remove_ocmx_gallery_effects(){delete_option("allow_gallery_effect");}; ?>