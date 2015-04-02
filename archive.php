<?php get_header(); ?>

<ul class="double-cloumn clearfix">
    <li id="left-column">	
        <ul class="blog-main-post-container">
			<?php if (have_posts()) :
                while (have_posts()) :	the_post(); setup_postdata($post);
					get_template_part("/functions/fetch-list");
                endwhile;
            else :
                ocmx_no_posts();
            endif; ?>
        </ul>
        <?php motionpic_pagination("clearfix", "pagination clearfix"); ?>
	</li>
	
	<?php if(get_option("ocmx_sidebar_layout") != "sidebarnone"): ?>
		<?php get_sidebar(); ?>
	<?php endif;?>
	
</ul>
<?php get_footer(); ?>
