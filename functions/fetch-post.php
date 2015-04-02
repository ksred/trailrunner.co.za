<?php $link = get_permalink($post->ID); 
$thumb_pos = get_option("ocmx_thumbnail_position");
if ($thumb_pos == "top") : 
	$resizer = '940auto';
	$width = '940';
	$height = '529';
else :
	$resizer = '620auto';
	$width = '620';
	$height = '349';
endif;
if(is_page()) : 
	$date = get_option("ocmx_meta_date_page");
	$author = get_option("ocmx_meta_author_page");
	$social = get_option("ocmx_meta_social_page");
else:
	$date = get_option("ocmx_meta_date_post");
	$author = get_option("ocmx_meta_author_post");
	$social = get_option("ocmx_meta_social_post");
	$category = get_option("ocmx_meta_category_post");
endif; 
$args  = array( 'postid' => $post->ID, 'width' => $width, 'height' => $height, 'hide_href' => false, 'exclude_video' => false, 'imglink' => false, 'resizer' => $resizer );
$image = get_obox_media($args); 
?>

<?php if( $thumb_pos != "in" ) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="post-title-block">
	    	<!--Show the title -->
	    	<h2 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>
	        
	    	<?php if( $date != "false" || $author != "false" ) : ?>
	            <h5 class="date">
	                <?php if( $author != "false" ) {_e("Posted by", "ocmx"); ?> <?php the_author_posts_link();} // Hide the date unless enabled in Theme Options ?>
	                <?php if(!is_page()) : ?>
	                	<?php if( $category != "false" ) {_e("in", "ocmx"); ?> <?php the_category(', ');} // Hide the category unless enabled in Theme Options ?>
	                <?php endif; ?>
	                <?php if( $date != "false" ) {_e("on ", "ocmx"); echo the_time(get_option('date_format'));} //Hide the author unless enabled in Theme Options ?> 
	            </h5>
	        <?php endif; ?>
			
		</div>
		<div class="post-image fitvid">
			<?php if ($image !="") { echo $image; }?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
	
<ul class="double-cloumn clearfix">
	<?php rewind_posts(); ?>
    <?php if (have_posts()) :
        global $post;
        while (have_posts()) : the_post(); ?>
        
        <li id="left-column">
        	
        	<div class="blog-main-post-container">
        	
	        	<?php if( $thumb_pos != "top" ) : ?>
		            <div class="post-title-block">
				    	<!--Show the title -->
				    	<h2 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>
				    	
				    	<?php if( $date != "false" || $author != "false" ) : ?>
				            <h5 class="date">
				                <?php if( $date != "false" ) {_e("Posted by", "ocmx"); ?> <?php the_author_posts_link();} // Hide the date unless enabled in Theme Options ?>
				                <?php if( $author != "false" ) {_e("on ", "ocmx"); echo the_time(get_option('date_format'));} //Hide the author unless enabled in Theme Options ?> 
				            </h5>
			            <?php endif; ?>
			            <div class="post-image fitvid">
			            	<?php if ($image !="") { echo $image; }?>
						</div>
					</div>
				<?php endif; ?>
			    
				<!--Get the Content -->
			    <div class="copy clearfix">
			        <?php the_content(); ?>
			        <?php wp_link_pages( ); ?> 
			    </div>
			    
			    <ul class="post-meta"> 
		    		<?php if( get_option("ocmx_meta_tags") != "false" ) : // Show tags if enabled in Theme Options ?>
					    <li class="meta-block">
						    <ul class="tags">
							    <?php the_tags('<li>','</li><li>','</li>'); ?>
						    </ul>
					    </li>
				    <?php endif; ?>
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
				<?php if(!is_page() && get_option( "ocmx_meta_post_links" ) != "false" ) : //Show the Post Nav unless unchecked in Theme Options ?>            
                    <ul class="next-prev-post-nav">
                        <li>
                        	<?php if ( get_adjacent_post( false, '', true ) ): // if there are older posts ?>
                        		&larr;  <span><?php previous_post_link("%link", "%title"); ?></span>
                        	<?php else : ?>
                        		&nbsp;
                        	<?php endif; ?>
                        </li>
                        <li>
							<?php if ( get_adjacent_post( false, '', false ) ): // if there are newer posts ?>
                            	<span><?php next_post_link("%link", "%title"); ?></span> &rarr;
                            <?php else : ?>
                            	&nbsp;
                            <?php endif; ?>    
                        </li>
                    </ul>
                <?php endif; ?>   
	            <?php comments_template(); ?>
	            
	    	</div>
	    	
        </li>
        
    <?php endwhile;
    else :
        ocmx_no_posts();
    endif;
    
    if(get_option("ocmx_sidebar_layout") != "sidebarnone"):
		get_sidebar();
	endif;?>
</ul>

<?php if( !is_page() ) : ?>
    <ul class="three-column related-posts clearfix">
    	<?php wp_reset_postdata();
    		$args = array('posts_per_page' => 3, 'post__not_in' =>get_option("sticky_posts"), "orderby" => "rand");
    		$loop = new WP_Query($args);
	        while ( $loop->have_posts() ) : $loop->the_post();
	        	global $post;
	        	$link = get_permalink($post->ID); 
	        	$args  = array('postid' => $post->ID, 'width' => 300, 'height' => 169, 'hide_href' => false, 'exclude_video' => false, 'imglink' => false, 'wrap' => 'div', 'wrap_class' => 'post-image fitvid', 'resizer' => '300x169');
	        	$image = get_obox_media($args); 
				$url = get_post_meta($post->ID, "video_link", true);
				$vid_info = video_info($url);
				$thumb = $vid_info['thumb_large']; ?>	
	        <li class="column">
            <!--Show the Featured Image or Video -->
            <?php if( get_option("ocmx_video_thumbs" ) != "false" && $url !="" ) : ?> 
                <div class="post-image fitvid">
                    <a href="<?php the_permalink(); ?>">
                    	<img src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>" />
                    </a>
                </div>
            <?php elseif($image != "") : echo $image; 
            endif; 
	            
	            // Clean up the content
	            $content = get_the_content();
				$contenttext = strip_tags($content);
				$excerpt = get_the_excerpt();
				$excerpttext = strip_tags($excerpt); ?>
	           
	           	<div class="content">
	
	                <h4 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h4>
	                <?php if( get_option("ocmx_meta_date_post") != "false") : ?>
		                <h5 class="date"><?php echo date('F j, Y', strtotime($post->post_date)); ?></h5>
	                <?php endif; ?>
	                <?php if ($contenttext != '' || $excerpttext != '') : ?>
						<div class="copy">
							<?php if($excerpttext != "") :
								echo '<p>'.$excerpttext.'</p>';
							else :
								echo '<p>'.$contenttext.'</p>';
							endif; ?>
						</div>
	               	<?php endif; ?>
	           	</div>
	        </li>	
	        			
	    <?php endwhile; ?>
        
    </ul>
	 
<?php endif; ?>