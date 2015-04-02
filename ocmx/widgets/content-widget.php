<?php
class ocmx_content_widget extends WP_Widget {
    /** constructor */
    function ocmx_content_widget() {
        parent::WP_Widget(false, $name = "(Obox) Content Widget", array("description" => "Display various kinds of content in a multi-column layout on your home page."));	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        // Turn $args array into variables.
		extract( $args );

		// Turn $instance array into variables
		if (class_exists( 'Woocommerce' )) {
			global $woocommerce;
		}
		$instance_defaults = array ( 'excerpt_length' => 80, 'post_thumb' => true);
		$instance_args = wp_parse_args( $instance, $instance_defaults );
		extract( $instance_args, EXTR_SKIP );
		
		if(isset($instance["excerpt_length"]) && $instance["excerpt_length"] != "") :
			$excerpt_length = esc_attr($instance["excerpt_length"]);
		else :
			$excerpt_length = 80;
		endif;
		
		
		if(isset($instance["posttype"]))
			$posttype = esc_attr($instance["posttype"]); 
		if(isset($instance["postfilter"]))
	        $postfilter = esc_attr($instance["postfilter"]); 
	        
		if(isset($postfilter) && isset($instance[$postfilter]))
	        $filterval = esc_attr($instance[$postfilter]); 
        else
	        $filterval = 0;
		
		if(isset($postfilter) && $postfilter != "" && $filterval != "0") :
			$args = array(
				"post_type" => $posttype,
				"posts_per_page" => $post_count,
				'post__not_in' => get_option("sticky_posts"),
				"tax_query" => array(
					array(
						"taxonomy" => $postfilter,
						"field" => "slug",
						"terms" => $filterval
					)
				)		
			);
		else :
			$args = array(
				"post_type" => $posttype,
				"posts_per_page" => $post_count,
				'post__not_in' => get_option("sticky_posts")
			);
		endif;

		$loop = new WP_Query($args); 
		
		//Set the post Aguments and Query accordingly
		$count = 0;
		$numposts = 0;
		
		?>
		
		<li class="content-widget widget clearfix">
			
			<?php if(isset($title) && $title != "") : ?>
				<h3 class="widgettitle"><?php echo $title; ?></h3>
			<?php endif; ?>

            <ul class="<?php echo $layout_columns; ?>-column clearfix">
            
                <?php while ( $loop->have_posts() ) : $loop->the_post();
                    global $post;

					if($layout_columns == 'four') : 
                    	$resizer = '220x124';
                    	$width = '220';
                    	$height = '125';
                    elseif($layout_columns == 'three') :
                    	$resizer = '300x169';
                    	$width = '300';
                    	$height = '170';
                    elseif($layout_columns == 'two') :
                    	$resizer = '460x259';
                    	$width = '460';
                    	$height = '260';
                    elseif($layout_columns == 'one') :
                    	$resizer = '940x529';
                    	$width = '940';
                    	$height = '529';
                    endif;
                    
                    $link = get_permalink($post->ID); 
               		$args  = array('postid' => $post->ID, 'width' => $width, 'height' => $height, 'hide_href' => false, 'exclude_video' => $post_thumb, 'imglink' => false, 'imgnocontainer' => true, 'resizer' => $resizer);
					$image = get_obox_media($args); ?>	
                    
                    <li class="column">
                        <?php if($post_thumb != "none" && $layout_columns !='one') : ?> 
                            <div class="post-image fitvid">
                                <?php if( $image != "" ){ echo $image; }; ?>
                            </div>
						<?php endif; ?>
                        <?php $content = get_the_content();
						$contenttext = strip_tags($content);
						$excerpt = get_the_excerpt();
						$excerpttext = strip_tags($excerpt); ?>
                       
                       	<div class="content">

	                        <h4 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h4>
	                        
	                        <?php if(isset($show_date) && $show_date == "on") : ?>
                       			<h5 class="date"><?php echo date('F j, Y', strtotime($post->post_date)); ?></h5>
                       		<?php endif; ?>
                       		
                       		<?php if($post_thumb != "none" && $layout_columns =='one') : ?> 
                                    <!--Show the Featured Image or Video -->
                                    <div class="post-image fitvid">
                            			<?php if( $image != "" ){ echo $image; }; ?>
 									</div>
							<?php endif; ?>
							<?php if(isset($show_excerpts) && $show_excerpts == "on") : ?>
								<div class="copy">
									<?php if($post->post_excerpt != "") :
										echo '<p>';
											echo substr($excerpttext, 0, $excerpt_length );
										echo ' ...</p>';
									else :
										echo '<p>';
											echo substr($contenttext, 0, $excerpt_length );
										echo ' ...</p>';
									endif; ?>
								</div>
	                       	<?php endif; ?>
	                       	
	                       	<?php if($layout_columns == 'one' && $show_meta =='on') : ?>
	                       		<ul class="post-meta">
	                       			<li class="post-author">
	                       				<p><?php _e("Posted by", "ocmx"); ?> <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a></p>
	                       				<div class="author-icon"></div>
	                       			</li>
	                       			<li class="post-comments">
	                       				<a href="<?php comments_link(); ?>"><?php if(comments_open())comments_number(__('0 Comments','ocmx'),__('1 Comment','ocmx'),__('% Comments','ocmx')); ?></a>
	                       				<div class="comments-icon"></div>
	                       			</li>
	                       		</ul>
	                       	<?php endif; ?>
	                       	
                       	</div>
                    </li>	
                    			
                <?php endwhile; ?>
                
            </ul>
            
     	</li>
    
<?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
    	// Setup Instance defaults to avoid non-defined warnings
	    	$instance_defaults = array (
	    		'title' => '',
	    		'layout_columns' => 1,
	    		'post_count' => '1',
	    		'excerpt_length' => 120,
	    		'post_thumb' => 0,
	    		'posttype' => '',
	    		'postfilter' => '',    		
	    	);
  
		$instance_args = wp_parse_args( $instance, $instance_defaults );
		extract( $instance_args, EXTR_SKIP );
		
		if(isset($instance["posttype"]))
        	$posttype = esc_attr($instance["posttype"]); 
        if(isset($instance["postfilter"]))
        	$postfilter = esc_attr($instance["postfilter"]); 
        	
        if(isset($postfilter) && isset($instance[$postfilter]))
        	$filterval = esc_attr($instance[$postfilter]); 	

		$post_type_args = array("public" => true, "exclude_from_search" => false, "show_ui" => true);
		$post_types = get_post_types( $post_type_args, "objects");
?>

	<p><em><?php _e("Click Save after selecting a filter from each menu to load the next filter", "ocmx"); ?></em></p>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e("Title", "ocmx"); ?><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
	</p>
	
	<p>
        <label for="<?php echo $this->get_field_id('layout_columns'); ?>"><?php _e("Column Layout", "ocmx"); ?></label>
        <select size="1" class="widefat" id="<?php echo $this->get_field_id('layout_columns'); ?>" name="<?php echo $this->get_field_name('layout_columns'); ?>">
			<option <?php if($layout_columns == "one") : ?>selected="selected"<?php endif; ?> value="one">1</option>
			<option <?php if($layout_columns == "two") : ?>selected="selected"<?php endif; ?> value="two">2</option>
			<option <?php if($layout_columns == "three") : ?>selected="selected"<?php endif; ?> value="three">3</option>
			<option <?php if($layout_columns == "four") : ?>selected="selected"<?php endif; ?> value="four">4</option>
        </select>
    </p>
	
	<p>
		<label for="<?php echo $this->get_field_id('posttype'); ?>"><?php _e("Display", "ocmx"); ?></label>
       	<select size="1" class="widefat" id="<?php echo $this->get_field_id("posttype"); ?>" name="<?php echo $this->get_field_name("posttype"); ?>">
       		<option <?php if($posttype == ""){echo "selected=\"selected\"";} ?> value="">--- Select a Content Type ---</option>
				<?php foreach($post_types as $post_type => $details) : 
						if($post_type != 'attachment') : ?>
                	<option <?php if($posttype == $post_type){echo "selected=\"selected\"";} ?> value="<?php echo $post_type; ?>"><?php echo $details->labels->name; ?></option>
				<?php endif;
				endforeach; ?>
        </select>
    </p>

    <?php if($posttype != "") :
    	if($posttype != "page" && $posttype != "attachment") : ?>
			<?php $taxonomyargs = array('post_type' => $posttype, "public" => true, "exclude_from_search" => false, "show_ui" => true); 
			$taxonomies = get_object_taxonomies($taxonomyargs,'objects');
			if(!empty($taxonomies)) : ?>
				<p>
					<label for="<?php echo $this->get_field_id('postfilter'); ?>"><?php _e("Filter by", "ocmx"); ?></label>
		           	<select size="1" class="widefat" id="<?php echo $this->get_field_id("postfilter"); ?>" name="<?php echo $this->get_field_name("postfilter"); ?>">
		           		<option <?php if(!isset($postfilter) || isset($postfilter) && $postfilter == ""){echo "selected=\"selected\"";} ?> value="">--- Select a Filter ---</option>
		 				<?php foreach($taxonomies as $taxonomy => $details) : ?>
			                <option <?php if(isset($postfilter) && $postfilter == $taxonomy){echo "selected=\"selected\"";} ?> value="<?php echo $taxonomy; ?>"><?php echo $details->labels->name; ?></option>
		 				<?php $validtaxes[] = $taxonomy;
		 				endforeach; ?>
		            </select>
		        </p>
	        <?php endif;
	        if( ( isset($postfilter) && $postfilter != "" ) && ( (isset($validtaxes) && is_array($validtaxes) && in_array($postfilter, $validtaxes)) || !is_array($validtaxes) ) ) :
				$tax = get_taxonomy($postfilter);
				$terms = get_terms($postfilter, "orderby=name&hide_empty=0"); ?>
				<p><label for="<?php echo $this->get_field_id($postfilter); ?>"><?php echo $tax->labels->name; ?></label>
		           <select size="1" class="widefat" id="<?php echo $this->get_field_id($postfilter); ?>" name="<?php echo $this->get_field_name($postfilter); ?>">
		                <option <?php if(isset($filterval) && $filterval == 0){echo "selected=\"selected\"";} ?> value="0">All</option>
		                <?php foreach($terms as $term => $details) :?>
							<option  <?php if($filterval == $details->slug){echo "selected=\"selected\"";} ?> value="<?php echo $details->slug; ?>"><?php echo $details->name; ?></option>
		                <?php endforeach;?>
		            </select>
		        </p>
		    <?php endif; ?>
			<?php if(isset($instance["postfilter"])) :
				if(!isset($post_count))
	        		$post_count = 1; ?>
			
			    <p>
			        <label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e("Post Count", "ocmx"); ?></label>
			        <select size="1" class="widefat" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>">
			            <?php $i = 1;
						while($i < 13) :?>
							<option <?php if($post_count == $i) : ?>selected="selected"<?php endif; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php if($i < 1) :
								$i++;
							else: 
								$i=($i+1);
							endif;
						endwhile; ?>
			        </select>
			    </p>
		    <?php endif; ?>
	    <?php endif; ?>
	    <?php
	endif; ?>
	

	 <p>
        <label for="<?php echo $this->get_field_id('post_thumb'); ?>"><?php _e("Thumbnails", "ocmx"); ?></label>
        <select size="1" class="widefat" id="<?php echo $this->get_field_id('post_thumb'); ?>" name="<?php echo $this->get_field_name('post_thumb'); ?>">
				<option <?php if($post_thumb == "none") : ?>selected="selected"<?php endif; ?> value="none">None</option>
				<option <?php if($post_thumb == "1") : ?>selected="selected"<?php endif; ?> value="1">Post Feature Images</option>
				<?php if($layout_columns != "three") : ?>
					<option <?php if($post_thumb == "0") : ?>selected="selected"<?php endif; ?> value="0">Videos</option>
				<?php endif; ?>
        </select>
    </p>
	<p>
        <label for="<?php echo $this->get_field_id('show_date'); ?>">
        	<input type="checkbox" <?php if(isset($show_date) && $show_date == "on") : ?>checked="checked"<?php endif; ?> id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>">
			<?php _e("Show Date", "ocmx"); ?>
        </label>
	</p>

    <p>
        <label for="<?php echo $this->get_field_id('show_excerpts'); ?>">
        	<input type="checkbox" <?php if(isset($show_excerpts) && $show_excerpts == "on") : ?>checked="checked"<?php endif; ?> id="<?php echo $this->get_field_id('show_excerpts'); ?>" name="<?php echo $this->get_field_name('show_excerpts'); ?>">
			<?php _e("Show Excerpts", "ocmx"); ?>
        </label>
	</p>
	
    <p>
    	<label for="<?php echo $this->get_field_id('excerpt_length'); ?>"><?php _e("Excerpt Length (character count)", "ocmx"); ?><input class="shortfat" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" type="text" value="<?php echo $excerpt_length; ?>" /><br /></label>
    </p>
    
    <?php if($layout_columns == 'one') : ?>
	    <p>
	        <label for="<?php echo $this->get_field_id('show_meta'); ?>">
	        	<input type="checkbox" <?php if(isset($show_meta) && $show_meta == "on") : ?>checked="checked"<?php endif; ?> id="<?php echo $this->get_field_id('show_meta'); ?>" name="<?php echo $this->get_field_name('show_meta'); ?>">
				<?php _e("Show Author & Comment Meta", "ocmx"); ?>
	        </label>
		</p>
	<?php endif; ?>

    

    
<?php 
	} // form

}// class

//This sample widget can then be registered in the widgets_init hook:

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("ocmx_content_widget");'));

?>