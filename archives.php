<?php
	/* 
	Template Name: Archives 
	*/
	
	get_header(); 
	
	global $wpdb;	
	//DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts  
	global $wpquery;
if (is_paged()) :
        $fetch_archive = query_posts( "paged=".get_query_var('paged' ) );
    else :
        $fetch_archive = query_posts( "paged=1" );
    endif;
    
?>
<ul class="clearfix">
    <li id="left-column">	
    	<div class="archives">
        	<h2 class="post-title"><?php the_title(); ?></h3>
            <ul class="archives_list">
            <?php
                foreach($fetch_archive as $archive_data) :
                    global $post;
                     $post = $archive_data;
                    $category_id = get_the_category($archive_data->ID);
                    $this_category = get_category($category_id[0]->term_id);
                    $this_category_link = get_category_link($category_id[0]->term_id);
                    $link = get_permalink($archive_data->ID); 
					if( get_option("ocmx_video_thumbs" ) != "false") : //check if oEmbed thumbs are enabled
						$video_thumb = true;
					else:
						$video_thumb = false;
					endif; 
					$args  = array( 'postid' => $post->ID, 'width' => 150, 'height' => 98, 'hide_href' => false, 'exclude_video' => $video_thumb, 'resizer' => '150x98' );
					$image = get_obox_media($args);
					?>
                    <li>
                    	<?php if($image !="") : ?>
                            <div class="archive-post-image">
                                <?php echo $image; ?>
                            </div>
                        <?php endif; ?>
                        <?php if(get_option("ocmx_meta_date") != "false"): ?>  
                            <span class="date">
                                <?php echo date('F j, Y', strtotime($archive_data->post_date)); ?>
                            </span>
                        <?php endif; ?>
                        <a href="<?php echo get_permalink($archive_data->ID); ?>" class="post-title"><?php echo substr($archive_data->post_title, 0, 45); ?></a>
                        <?php if(get_option("ocmx_meta_comments") != "false" && comments_open()): ?>  
                        	<a href="<?php echo get_permalink($archive_data->ID); ?>/#comments" class="comment-count" title="<?php _e("Comment on ", "ocmx"); echo get_permalink($archive_data->post_title); ?>">
                            	<?php comments_number(__('0 Comments','ocmx'),__('1 Comment','ocmx'),__('% Comments','ocmx'));  ?>
                        	</a>
                        <?php endif; ?>
                        <span class="label">
                            <a href="<?php echo $this_category_link; ?>" title="<?php _e("View all posts in ", "ocmx"); echo $this_category->name; ?>" rel="category tag"><?php echo $this_category->name; ?></a>
                        </span>
                    </li>
                <?php
                    $last_month = date("m Y", strtotime($archive_data->post_date));
                endforeach;
            ?>
       
        </ul>
         <?php motionpic_pagination("clearfix", "pagination clearfix"); ?>	
	  </div>
	</li>
	<?php get_sidebar(); ?>
</ul>
<?php get_footer(); ?>