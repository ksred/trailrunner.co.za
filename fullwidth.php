<?php 
/*
Template Name: Full Width 
*/
get_header(); ?>
        
<div class="full-width">
 
	<?php if (have_posts()) :
	    global $post;
	    while (have_posts()) : the_post(); setup_postdata($post);
			$link = get_permalink($post->ID); 
			$date = get_option("ocmx_meta_date_page");
			$author = get_option("ocmx_meta_author_page");
			$args  = array( 'postid' => $post->ID, 'width' => 940, 'height' => 529, 'hide_href' => false, 'exclude_video' => false, 'imglink' => false, 'wrap' => 'div', 'wrap_class' => 'post-image fitvid', 'resizer' => '940x529' );
			
			$image = get_obox_media($args); ?>
			
			<div class="post-title-block">
		    	<!--Show the title -->
		    	<h2 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>
		    	
		    	<?php if( $date != "false" || $author != "false" ) : ?>
		            <h5 class="date">
		                <?php if( $date != "false" ) {_e("Posted by", "ocmx"); ?> <?php the_author_posts_link();} // Hide the date unless enabled in Theme Options ?>
		                <?php if( $author != "false" ) {_e("on ", "ocmx"); echo the_time(get_option('date_format'));} //Hide the author unless enabled in Theme Options ?> 
		            </h5>
		        <?php endif; ?>
				
			</div>
			<?php if ($image !="") : echo $image; endif; ?>
			
			<div class="blog-main-post-container">
			    
				<!--Get the Content -->
			    <div class="copy clearfix">
			        <?php the_content(); ?>
			    </div>
			    
			    <?php $social = get_option("ocmx_meta_social_page"); ?>
			    <ul class="post-meta"> 
		            <?php if( get_option("ocmx_social_tag") !="" ) : ?>
		            	<span class="social"><?php echo get_option("ocmx_social_tag"); ?></span> 
				    <?php elseif( $social != "false" ) : // Show sharing if enabled in Theme Options ?>
					    <li class="meta-block social">
		                    <!-- AddThis Button BEGIN : Customize at http://www.addthis.com -->
		                    <div class="addthis_toolbox addthis_default_style ">
		                        <a class="addthis_button_facebook_like"></a>
		                        <a class="addthis_button_tweet"></a>
		                        <a class="addthis_counter addthis_pill_style"></a>
		                    </div>
		                    <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-507462e4620a0fff"></script>
		                    <!-- AddThis Button END -->
					    </li>
				    <?php endif; ?>         
			    </ul>
	            
	            <?php comments_template(); ?>
	            
	    	</div>
			
	        
	    <?php endwhile;
	else :
	    ocmx_no_posts();
	endif; ?> 
	
</div>
       
<?php get_footer(); ?>