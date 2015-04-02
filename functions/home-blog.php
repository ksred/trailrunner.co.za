
	<li class="content-widget widget clearfix">

		<ul class="one-column clearfix">

			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					global $post;
					if( get_post_format() != 'quote' ) : // Render Normal content
						if( get_option("ocmx_video_thumbs" ) != "false") : //check if oEmbed thumbs are enabled
							$video_thumb = true;
						else:
							$video_thumb = false;
						endif;
							// Setup the featured image
								$resizer = '940x529';
								$width = '940';
								$height = '529';
						$args  = array('postid' => $post->ID, 'width' => $width, 'height' => $height, 'hide_href' => false, 'exclude_video' => $video_thumb, 'imglink' => false, 'resizer' => $resizer );
						$image = get_obox_media($args);

						// Set the post link
						$link = get_permalink($post->ID); ?>

						<li class="column">
							<h4 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h4>

							<?php if( get_option("ocmx_meta_date_post") != "false" ) : ?>
								<h5 class="date">
									<?php if( get_option("ocmx_meta_date_post") != "false" ) {echo the_time(get_option('date_format'));} // Hide the date unless enabled in Theme Options ?>
								</h5>
							<?php endif; ?>

							<!--Show the Featured Image or Video -->
							<?php if($image != "") : ?>
								<div class="post-image fitvid">
									<?php echo $image; ?>
								</div>
							<?php endif; ?>

							<div class="content">
								<div class="copy">
									<?php if( get_option( "ocmx_content_length" ) != "no" ) :
										the_excerpt();
									else :
										the_content();
									endif; ?>
								</div>

								<?php if(get_option("ocmx_meta_author_comment") != "false" ) : ?>
									<ul class="post-meta">
										<li class="post-author">
											<p><?php _e("Posted by", "ocmx"); ?> <?php the_author_posts_link(); //Hide the author unless enabled in Theme Options ?></p>
											<div class="author-icon"></div>
										</li>
										<li class="post-comments">
											<a href="<?php comments_link(); ?>"><?php comments_number(__('0 Comments','ocmx'),__('1 Comment','ocmx'),__('% Comments','ocmx')); ?></a>
											<div class="comments-icon"></div>
										</li>
									</ul>
								<?php endif; ?>

							</div>

						</li>

					<?php else : //Render Quote Content
						$quote_link = get_post_meta($post->ID, "quote_link", true); ?>
						<li class="format-quote">
							<div class="copy">
								<?php the_content(); ?>
							</div>
							<cite>&mdash; <?php if($quote_link != '') : ?><a href="<?php echo $quote_link; ?>" target="_blank"><?php the_title(); ?></a> <?php else : the_title(); endif; ?></cite>
						</li>
					<?php endif;
				endwhile;
			else :
				ocmx_no_posts();
			endif; ?>

		</ul>

		<?php motionpic_pagination("clearfix", "pagination clearfix"); ?>

	</li>