<?php get_header(); ?>
		
	<ul id="home-widget-block" class="clearfix">
		<?php if(get_option( "ocmx_home_page_layout" ) != "widget"):
			get_template_part("functions/home-blog-blog");
		endif;
		if(is_active_sidebar("homepage")) :
			dynamic_sidebar("homepage");
		endif; ?>
	</ul>
    
<?php get_footer(); ?>
