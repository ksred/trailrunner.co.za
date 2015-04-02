<?php global $layout;
	if( $layout == "one-column" ) :
		$width = 940;
		$height = 530;
		$resizer = '940auto';
	elseif( $layout == "two-column" ) :
		$width = 460;
		$height = 260;
		$resizer = '460x259';
	elseif( $layout == "three-column" ) :
		$width = 300;
		$height = 170;
		$resizer = '300x169';
	else :
		$width = 220;
		$height = 125;
		$resizer = '220x124';
	endif;
	$link = get_permalink($post->ID); 
    $args  = array( 'postid' => $post->ID, 'width' => $width, 'height' => $height, 'hide_href' => false, 'exclude_video' => true, 'wrap' => 'div', 'wrap_class' => 'post-image fitvid', 'resizer' => $resizer );
	$image = get_obox_media($args); ?>
	
<li>
    <?php if( $image != "" ) { echo $image; } ?>
    <h4 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h4>
</li>