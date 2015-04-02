<?php 
/*
	Template Name: Widgetized Page 
*/
get_header();
global $post; 
$widgetpage = $post->post_title; 
?>
<?php dynamic_sidebar($widgetpage." Slider Widget"); ?> 
	<div id="widget-block" class="clearfix">
		<ul class="widget-list">
			<?php dynamic_sidebar($widgetpage." Body"); ?>
		</ul>
	</div>
<?php  get_footer(); ?>