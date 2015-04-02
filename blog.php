<?php
/*
Template Name: Blog
*/

get_header(); ?>

<ul class="double-cloumn clearfix">
    <li id="left-column">
        <ul class="blog-main-post-container">
			<?php
			if ( get_query_var( 'paged' ) ) {
				$currentpage = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$currentpage = get_query_var( 'page' );
			} else {
				$currentpage = 0;
			} // if get_query_var
			$args = array("post_type" => "post", "paged" => $currentpage);
			$wp_query = new WP_Query($args);

			while ( $wp_query->have_posts() ) : $wp_query->the_post();
				global $post;
				get_template_part("/functions/fetch-list");
			endwhile; ?>
        </ul>
        <?php motionpic_pagination("clearfix", "pagination clearfix"); ?>
        <?php // reset post data
         wp_reset_postdata(); ?>
	</li>

	<?php if(get_option("ocmx_sidebar_layout") != "sidebarnone"): ?>
		<?php get_sidebar(); ?>
	<?php endif;?>

</ul>
<?php get_footer(); ?>
