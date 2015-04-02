<?php get_header(); ?>
		
<ul class="double-cloumn clearfix">
    <li id="left-column">
	<ul id="home-widget-block" class="clearfix">
		<?php if(get_option( "ocmx_home_page_layout" ) != "widget"):
			get_template_part("functions/home-blog");
		endif;
			dynamic_sidebar("homepage");
		?>
	</ul>
</li>

		<?php get_sidebar(); ?>
</ul>

<style>
.one-column .post-meta {
	display: none;
}
</style>
    
<?php get_footer(); ?>
