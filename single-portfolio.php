<?php get_header(); 

if (have_posts()) :
    while (have_posts()) : the_post(); setup_postdata($post);
    global $post; 
    $website = get_post_meta($post->ID, "website", true); ?>
    
    <?php $terms = get_the_terms($post->ID, 'portfolio-category'); 
    $parentpage = get_template_link("portfolio.php"); ?>
	<!--Show Breadcrumbs -->
	<ul id="crumbs">
	    <li><a href="<?php echo home_url('url'); ?>"><?php _e('Home','ocmx')?></a></li>
	    <li> / </li>
	    <li><a href="<?php echo get_permalink($parentpage->ID); ?>"><?php _e('Portfolio','ocmx')?></a></li>
	    <?php if( !empty( $terms ) ) : ?>
		    <li> / </li>
		    <li>
		    	<?php if( is_array( $terms ) )
				$first_term = array_shift( $terms ); ?>
				<a href="<?php echo get_term_link($first_term->slug, "portfolio-category"); ?>"><?php echo $first_term->name; ?></a>
		    </li>
		<?php endif; ?>
	    <li> / </li>
	    <li><span class="current"><?php the_title(); ?></span></li>
	</ul>

	<ul class="portfolio-content">
		<li id="left-column">
			<h2 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>
			<div class="copy clearfix">
		        <?php the_content(); ?>
		        <?php if($website !='') : ?>
					<a class="portfolio-website" href="<?php echo $website; ?>"><?php _e("View Website", "ocmx"); ?></a>
		        <?php endif; ?>
		        <?php if(is_array($terms) && $first_term->name !='') : ?>	    	
					<a class="portfolio-category" href="<?php echo home_url().'/'.$first_term->taxonomy.'/'.$first_term->slug; ?>"><?php echo $first_term->name; ?></a></span>
				<?php endif; ?>
		    </div>
			
			<?php if( get_option("ocmx_social_tag") !="" ) : ?>
            	<div class="social"><?php echo get_option("ocmx_social_tag"); ?></div> 
		    <?php elseif( get_option("ocmx_meta_social") != "false" ) : // Show sharing if enabled in Theme Options ?>
			    <div class="social">
                    <!-- AddThis Button BEGIN : Customize at http://www.addthis.com -->
                    <div class="addthis_toolbox addthis_default_style ">
                        <a class="addthis_button_facebook_like"></a>
                        <a class="addthis_button_tweet"></a>
                        <a class="addthis_counter addthis_pill_style"></a>
                    </div>
                    <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-507462e4620a0fff"></script>
                    <!-- AddThis Button END -->
			    </div>
		    <?php endif; ?> 
		</li>
		    
		<li id="right-column">
			<div class="slider clearfix">
				<?php if(obox_has_video($post->ID)):
					$args  = array('postid' => $post->ID, 'width' => 660, 'height' => 660, 'hide_href' => true, 'exclude_video' => false, 'imglink' => false, 'wrap' => 'div', 'wrap_class' => 'post-image fitvid');
					$image = get_obox_media($args);
					echo $image;
				else : ?>
		        <ul class="gallery-container">
		        	<?php $attach_args = array("post_type" => "attachment", "post_parent" => $post->ID, "numberposts" => "-1", "orderby" => "menu_order", "order" => "ASC");
		            $attachments = get_posts($attach_args);
		            foreach($attachments as $attachement => $this_attachment) :  
	                    $image = wp_get_attachment_image_src($this_attachment->ID, "620auto");
	                    $full = wp_get_attachment_image_src($this_attachment->ID,  "full"); ?>
						<li>
							<a href="<?php echo $link; ?>" rel="lightbox">
								<img src="<?php echo $image[0]; ?>" alt="<?php echo $this_attachment->post_title; ?>" />
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php if(count($attachments) > 1) : ?>
			        <div class="controls"> <a href="#" class="next"><?php _e("Next", "ocmx") ?></a> <a href="#" class="previous"><?php _e("Previous", "ocmx") ?></a>
			            <div class="slider-dots"> 
			            	<?php for($i=1; $i <= count($attachments); $i++) : ?>
			                    <a href="#" rel="<?php echo ($i-1); ?>"class="dot <?php if($i == 1) : ?>dot-selected<?php endif; ?>"><?php echo $i; ?></a>
			                <?php endfor; ?> 
			            </div>
			        </div> 
		        <?php endif; 
				endif?>
		    </div>
		</li>
	    
	</ul>
<?php endwhile; endif; ?>
<?php get_footer(); ?>