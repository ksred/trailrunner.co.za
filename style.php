<?php header('Content-type: text/css'); ?>
<?php if(get_option("ocmx_ignore_colours") != "yes"): ?>

	<?php if(get_option("ocmx_header_background")) : ?>
		#header-container{background-color: <?php echo get_option('ocmx_header_background');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_header_border")) : ?>
		#header-container{border-color: <?php echo get_option('ocmx_header_border');?>;}
	<?php endif; ?>
    
    <?php if(get_option("ocmx_logo_color")) : ?>
		.logo h1 a{color: <?php echo get_option('ocmx_logo_color');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_navigation_font_color")) : ?>
		.tagline, ul#nav li a{color: <?php echo get_option('ocmx_navigation_font_color');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_navigation_hover")) : ?>
		.logo h1 a:hover, ul#nav li a:hover{color: <?php echo get_option('ocmx_navigation_hover');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_post_titles_font_color")) : ?>
		.post-title, .post-title a{color: <?php echo get_option('ocmx_post_titles_font_color');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_post_titles_hover")) : ?>
		.post-title a:hover{color: <?php echo get_option('ocmx_post_titles_hover');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_date_meta")) : ?>
		.content-widget .date, .dater, .post-title-block .date, #right-column .widget .dater, .archives_list .date, .comment .date, .three-column .date{color: <?php echo get_option('ocmx_date_meta');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_general_font_color")) : ?>
		body, #crumbs li, .portfolio-category-list .selected, .post-title span, .logged-in-as, label{color: <?php echo get_option('ocmx_general_font_color');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_body_links")) : ?>
		.copy a, .content a, .obox-credit a, .archives_list a, .comment-post a, #crumbs li a, .portfolio-category-list a, .tags li a, .logged-in-as a, .next-prev-post-nav a, .date a{color: <?php echo get_option('ocmx_body_links');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_body_links_hover")) : ?>
		.copy a:hover, .content a:hover, .obox-credit a:hover, .archives_list a:hover, .comment-post a:hover, #crumbs li a:hover, .portfolio-category-list a:hover, .tags li a:hover, .logged-in-as a:hover, .next-prev-post-nav a:hover, .date a:hover{color: <?php echo get_option('ocmx_body_links_hover');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_border_color")) : ?>
		#comments, .next-prev-post-nav, .one-column li, #footer-container, .footer-text, .comments-open, .related-posts, #right-column .widget li, .content-widget, .pagination, .pagination a, .blog-main-post-container li.post, .archives_list li, .one-column .post-meta .post-author, .threaded-comments li.comment, .comment, .portfolio-content .post-title, .portfolio-content #left-column, input[type="text"], textarea, .chirp span.meta, .section-title{border-color: <?php echo get_option('ocmx_border_color');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_buttons_icons")) : ?>
		.comments-icon, .author-icon, button, input[type="button"], input[type="submit"], .slider .next, .slider .previous{background-color: <?php echo get_option('ocmx_buttons_icons');?>;}
	<?php endif; ?>
	
	<?php if(get_option("ocmx_widget_titles_font_color")) : ?>
		#reply-title, #right-column .widgettitle, #right-column .widgettitle a, .footer-widgets .widgettitle, .footer-widgets .widgettitle a, .comments h3{color: <?php echo get_option('ocmx_widget_titles_font_color');?>;}
	<?php endif; ?>

    <?php if(get_option("ocmx_footer_background")) : ?>
		#footer-container{background-color: <?php echo get_option('ocmx_footer_background');?>;}
	<?php endif; ?>
    
    <?php if(get_option("ocmx_footer_text")) : ?>
		#footer-container, .footer-widgets{color: <?php echo get_option('ocmx_footer_text');?>;}
	<?php endif; ?>
    
    <?php if(get_option("ocmx_footer_links")) : ?>
		#footer-container a{color: <?php echo get_option('ocmx_footer_links');?>;}
	<?php endif; ?>
    
    <?php if(get_option("ocmx_footer_link_hover")) : ?>
		#footer-container a:hover{color: <?php echo get_option('ocmx_footer_link_hover');?>;}
	<?php endif; ?>
	
<?php endif; ?>

<?php if(get_header_image() != "") : ?>  
	#header-banner{background: url(<?php header_image(); ?>) no-repeat bottom center;}
<?php endif; ?>

<?php if(get_option("ocmx_custom_css") != ""): ?>
	<?php echo get_option("ocmx_custom_css"); ?>
<?php endif; ?>