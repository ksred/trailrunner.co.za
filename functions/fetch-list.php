<?php $layout = get_option( "ocmx_sidebar_layout" );
if(isset($layout) && $layout == 'sidebarnone') : 
	$resizer = '940x529';
	$width = '940';
	$height = '529';
else : 
	$resizer = '640x360';
	$width = '640';
	$height = '360';
endif; 
if( get_option("ocmx_video_thumbs" ) != "false") : //check if oEmbed thumbs are enabled
	$video_thumb = true;
else:
	$video_thumb = false;
endif; 
// Meta Arguments
$date = get_option("ocmx_meta_date_post");
$author = get_option("ocmx_meta_author_post");
$social = get_option("ocmx_meta_social_post");
$category = get_option("ocmx_meta_category_post");

// Feature Image
$args  = array( 'postid' => $post->ID, 'width' => $width, 'height' => $height, 'hide_href' => false, 'exclude_video' => $video_thumb, 'wrap' => 'div', 'wrap_class' => 'post-image fitvid', 'resizer' => $resizer );
$image = get_obox_media( $args );

// Fetch Post Format & meta associated
$format = get_post_format();
$quote_link = get_post_meta($post->ID, "quote_link", true);
$link = get_permalink( $post->ID ); 
 ?>
<li id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>		
    <div class="content <?php if($layout == 'sidebarnone') : ?>one-column<?php endif; ?> clearfix">
    	<!--Begin Top Meta -->
    	
    	<?php if( $format != 'quote' ) : // Render Normal content ?>
		    
		    <div class="post-title-block">
				<!--Show the Title -->
	            <h2 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>

		            <h5 class="date">
		                <?php if( $author != "false" ) {_e("Posted by", "ocmx"); ?> <?php the_author_posts_link();} // Hide the date unless enabled in Theme Options ?>
		                <?php if( $category != "false" ) {_e("in", "ocmx"); ?> <?php the_category(', ');} // Hide the category unless enabled in Theme Options ?>
		                <?php if( $date != "false" ) {_e("on ", "ocmx"); echo the_time(get_option('date_format'));} //Hide the author unless enabled in Theme Options ?> 
		            </h5>

	        </div>
	        
	        <!--Show the Featured Image or Video -->
			<?php if($image !="") : ?>
                <div class="post-image fitvid">
                	<?php echo $image; ?>
                </div>
            <?php  endif; ?>
		    
	        <!--Begin Excerpt -->
	        <div class="copy <?php echo $image_class; ?>">
	        	<?php if( get_option( "ocmx_content_length" ) != "no" ) : 
					the_excerpt(); 
				else : 
					the_content();
				endif; ?>
	        </div>
	        
	        <?php if(isset($layout) && $layout == 'sidebarnone') : ?>
		        <ul class="post-meta">
	       			<li class="post-author">
	       				<p><?php _e('Posted by'); ?> <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a></p>
	       				<div class="author-icon"></div>
	       			</li>
	       			<li class="post-comments">
	       				<a href="<?php comments_link(); ?>"><?php comments_number(__('0 Comments','ocmx'),__('1 Comment','ocmx'),__('% Comments','ocmx')); ?></a>
	       				<div class="comments-icon"></div>
	       			</li>
	       		</ul>
			<?php endif; ?>
    	
    	<?php else : // Render Quote content ?>
    	
    		<div class="copy">
    			<?php the_content(); ?>
    		</div>
            <cite>&mdash; <?php if($quote_link != '') : ?><a href="<?php echo $quote_link; ?>" target="_blank"><?php the_title(); ?></a> <?php else : the_title(); endif; ?></cite>
	        
		<?php endif; ?>

	</div>
</li>