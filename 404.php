<?php get_header(); ?>
	<?php $wpquery = new WP_Query(array('post_type' => 'post')); ?>
	<ul class="double-cloumn clearfix">
	    <li id="left-column">	
		    <h2 class="section-title-404"><?php _e("(404) The page you are looking for does not exist.", "ocmx"); ?></h2>
	        <ul class="blog-main-post-container">
				<?php if ($wpquery->have_posts()) :
	                while ($wpquery->have_posts()) :
	                	$wpquery->the_post(); setup_postdata($post);
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