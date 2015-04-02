<?php
class ocmx_social_widget extends WP_Widget {
    /** constructor */
    function ocmx_social_widget() {
        parent::WP_Widget(false, $name = '(Obox) Social Links', $widget_options = 'Link people up to your social Profiles.');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        
        $facebook = $instance["facebook"];
        $googleplus = $instance["googleplus"];
		$twitter = $instance["twitter"];
		$youtube = $instance["youtube"];
		$vimeo = $instance["vimeo"];
		$skype = $instance["skype"];
		$tumblr = $instance["tumblr"];
		$linkedin = $instance["linkedin"];
		$fivehundredpx = $instance["fivehundredpx"];
		$aim = $instance["aim"];
		$android = $instance["android"];
		$badoo = $instance["badoo"];
		$dailybooth = $instance["dailybooth"];
		$dribbble = $instance["dribbble"];
		$emailz = $instance["emailz"];
		$foursquare = $instance["foursquare"];
		$github = $instance["github"];
		$hipstamatic = $instance["hipstamatic"];
		$icq = $instance["icq"];
		$instagram = $instance["instagram"];
		$lastfm = $instance["lastfm"];
		$path = $instance["path"];
		$pinterest = $instance["pinterest"];
		$quora = $instance["quora"];
		$rdio = $instance["rdio"];
		$reddit = $instance["reddit"];
		$rss = $instance["rss"];
		$spotify = $instance["spotify"];
		$thefancy = $instance["thefancy"];
		$xbox = $instance["xbox"];
		$zerply = $instance["zerply"];
		
		?>
			<?php echo $before_widget; ?>
				<?php echo $before_title;
                	_e("Social Links", "ocmx");
				echo $after_title; ?>
				
                <ul class="social-icons clearfix">
                    
                    <?php if ($facebook !== "") : ?><li><a target="_blank" href="<?php echo $facebook; ?>" class="facebook"></a></li><?php endif; ?>
                    <?php if ($googleplus !== "") : ?><li><a target="_blank" href="<?php echo $googleplus; ?>" class="googleplus"></a></li><?php endif; ?>
                    <?php if ($twitter !== "") : ?><li><a target="_blank" href="<?php echo $twitter; ?>" class="twitter"></a></li><?php endif; ?>
                    <?php if ($youtube !== "") : ?><li><a target="_blank" href="<?php echo $youtube; ?>" class="youtube"></a></li><?php endif; ?>
                    <?php if ($vimeo !== "") : ?><li><a target="_blank" href="<?php echo $vimeo; ?>" class="vimeo"></a></li><?php endif; ?>
                    <?php if ($skype !== "") : ?><li><a target="_blank" href="<?php echo $skype; ?>" class="skype"></a></li><?php endif; ?>
                    <?php if ($tumblr !== "") : ?><li><a target="_blank" href="<?php echo $tumblr; ?>" class="tumblr"></a></li><?php endif; ?>
                    <?php if ($linkedin !== "") : ?><li><a target="_blank" href="<?php echo $linkedin; ?>" class="linkedin"></a></li><?php endif; ?>
                    <?php if ($fivehundredpx !== "") : ?><li><a target="_blank" href="<?php echo $fivehundredpx; ?>" class="fivehundredpx"></a></li><?php endif; ?>
                    <?php if ($aim !== "") : ?><li><a target="_blank" href="<?php echo $aim; ?>" class="aim"></a></li><?php endif; ?>
                    <?php if ($android !== "") : ?><li><a target="_blank" href="<?php echo $android; ?>" class="android"></a></li><?php endif; ?>
                    <?php if ($badoo !== "") : ?><li><a target="_blank" href="<?php echo $badoo; ?>" class="badoo"></a></li><?php endif; ?>
                    <?php if ($dailybooth !== "") : ?><li><a target="_blank" href="<?php echo $dailybooth; ?>" class="dailybooth"></a></li><?php endif; ?>
                    <?php if ($dribbble !== "") : ?><li><a target="_blank" href="<?php echo $dribbble; ?>" class="dribbble"></a></li><?php endif; ?>
                    <?php if ($emailz !== "") : ?><li><a target="_blank" href="mailto:<?php echo $emailz; ?>" class="emailz"></a></li><?php endif; ?>
                    <?php if ($foursquare !== "") : ?><li><a target="_blank" href="<?php echo $foursquare; ?>" class="foursquare"></a></li><?php endif; ?>
                    <?php if ($github !== "") : ?><li><a target="_blank" href="<?php echo $github; ?>" class="github"></a></li><?php endif; ?>
                    <?php if ($hipstamatic !== "") : ?><li><a target="_blank" href="<?php echo $hipstamatic; ?>" class="hipstamatic"></a></li><?php endif; ?>
                    <?php if ($icq !== "") : ?><li><a target="_blank" href="<?php echo $icq; ?>" class="icq"></a></li><?php endif; ?>
                    <?php if ($instagram !== "") : ?><li><a target="_blank" href="<?php echo $instagram; ?>" class="instagram"></a></li><?php endif; ?>
                    <?php if ($lastfm !== "") : ?><li><a target="_blank" href="<?php echo $lastfm; ?>" class="lastfm"></a></li><?php endif; ?>
                    <?php if ($path !== "") : ?><li><a target="_blank" href="<?php echo $path; ?>" class="path"></a></li><?php endif; ?>
                    <?php if ($pinterest !== "") : ?><li><a target="_blank" href="<?php echo $pinterest; ?>" class="pinterest"></a></li><?php endif; ?>
                    <?php if ($quora !== "") : ?><li><a target="_blank" href="<?php echo $quora; ?>" class="quora"></a></li><?php endif; ?>
                    <?php if ($rdio !== "") : ?><li><a target="_blank" href="<?php echo $rdio; ?>" class="rdio"></a></li><?php endif; ?>
                    <?php if ($reddit !== "") : ?><li><a target="_blank" href="<?php echo $reddit; ?>" class="reddit"></a></li><?php endif; ?>
                    <?php if ($rss !== "") : ?><li><a target="_blank" href="<?php echo $rss; ?>" class="rss"></a></li><?php endif; ?>
                    <?php if ($spotify !== "") : ?><li><a target="_blank" href="<?php echo $spotify; ?>" class="spotify"></a></li><?php endif; ?>
                    <?php if ($thefancy !== "") : ?><li><a target="_blank" href="<?php echo $thefancy; ?>" class="thefancy"></a></li><?php endif; ?>
                    <?php if ($xbox !== "") : ?><li><a target="_blank" href="<?php echo $xbox; ?>" class="xbox"></a></li><?php endif; ?>
                    <?php if ($zerply !== "") : ?><li><a target="_blank" href="<?php echo $zerply; ?>" class="zerply"></a></li><?php endif; ?>
                    
                </ul>
			<?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $facebook = $instance["facebook"];
        $googleplus = $instance["googleplus"];
		$twitter = $instance["twitter"];
		$youtube = $instance["youtube"];
		$vimeo = $instance["vimeo"];
		$skype = $instance["skype"];
		$tumblr = $instance["tumblr"];
		$linkedin = $instance["linkedin"];
		$fivehundredpx = $instance["fivehundredpx"];
		$aim = $instance["aim"];
		$android = $instance["android"];
		$badoo = $instance["badoo"];
		$dailybooth = $instance["dailybooth"];
		$dribbble = $instance["dribbble"];
		$emailz = $instance["emailz"];
		$foursquare = $instance["foursquare"];
		$github = $instance["github"];
		$hipstamatic = $instance["hipstamatic"];
		$icq = $instance["icq"];
		$instagram = $instance["instagram"];
		$lastfm = $instance["lastfm"];
		$path = $instance["path"];
		$pinterest = $instance["pinterest"];
		$quora = $instance["quora"];
		$rdio = $instance["rdio"];
		$reddit = $instance["reddit"];
		$rss = $instance["rss"];
		$spotify = $instance["spotify"];
		$thefancy = $instance["thefancy"];
		$xbox = $instance["xbox"];
		$zerply = $instance["zerply"]; ?>
        
        	<p><label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $instance["facebook"]; ?>" /></label></p>
        	<p><label for="<?php echo $this->get_field_id('googleplus'); ?>">Googleplus<input class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo $instance["googleplus"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $instance["twitter"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('youtube'); ?>">YouTube<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $instance["youtube"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('vimeo'); ?>">Vimeo<input class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo $instance["vimeo"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('skype'); ?>">Skype<input class="widefat" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo $instance["skype"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('tumblr'); ?>">Tumblr<input class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" type="text" value="<?php echo $instance["tumblr"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('linkedin'); ?>">Linkedin<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $instance["linkedin"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('fivehundredpx'); ?>">500px<input class="widefat" id="<?php echo $this->get_field_id('fivehundredpx'); ?>" name="<?php echo $this->get_field_name('fivehundredpx'); ?>" type="text" value="<?php echo $instance["fivehundredpx"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('aim'); ?>">Aim<input class="widefat" id="<?php echo $this->get_field_id('aim'); ?>" name="<?php echo $this->get_field_name('aim'); ?>" type="text" value="<?php echo $instance["aim"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('android'); ?>">Android<input class="widefat" id="<?php echo $this->get_field_id('android'); ?>" name="<?php echo $this->get_field_name('android'); ?>" type="text" value="<?php echo $instance["android"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('badoo'); ?>">Badoo<input class="widefat" id="<?php echo $this->get_field_id('badoo'); ?>" name="<?php echo $this->get_field_name('badoo'); ?>" type="text" value="<?php echo $instance["badoo"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('dailybooth'); ?>">Dailybooth<input class="widefat" id="<?php echo $this->get_field_id('dailybooth'); ?>" name="<?php echo $this->get_field_name('dailybooth'); ?>" type="text" value="<?php echo $instance["dailybooth"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('dribbble'); ?>">Dribbble<input class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" type="text" value="<?php echo $instance["dribbble"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('emailz'); ?>">Email<input class="widefat" id="<?php echo $this->get_field_id('emailz'); ?>" name="<?php echo $this->get_field_name('emailz'); ?>" type="text" value="<?php echo $instance["emailz"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('foursquare'); ?>">Foursquare<input class="widefat" id="<?php echo $this->get_field_id('foursquare'); ?>" name="<?php echo $this->get_field_name('foursquare'); ?>" type="text" value="<?php echo $instance["foursquare"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('github'); ?>">Github<input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" type="text" value="<?php echo $instance["github"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('hipstamatic'); ?>">Hipstamatic<input class="widefat" id="<?php echo $this->get_field_id('hipstamatic'); ?>" name="<?php echo $this->get_field_name('hipstamatic'); ?>" type="text" value="<?php echo $instance["hipstamatic"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('icq'); ?>">ICQ<input class="widefat" id="<?php echo $this->get_field_id('icq'); ?>" name="<?php echo $this->get_field_name('icq'); ?>" type="text" value="<?php echo $instance["icq"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('instagram'); ?>">Instagram<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instance["instagram"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('lastfm'); ?>">LastFM<input class="widefat" id="<?php echo $this->get_field_id('lastfm'); ?>" name="<?php echo $this->get_field_name('lastfm'); ?>" type="text" value="<?php echo $instance["lastfm"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('path'); ?>">Path<input class="widefat" id="<?php echo $this->get_field_id('path'); ?>" name="<?php echo $this->get_field_name('path'); ?>" type="text" value="<?php echo $instance["path"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('pinterest'); ?>">Pinterest<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo $instance["pinterest"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('quora'); ?>">Quora<input class="widefat" id="<?php echo $this->get_field_id('quora'); ?>" name="<?php echo $this->get_field_name('quora'); ?>" type="text" value="<?php echo $instance["quora"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('rdio'); ?>">Rdio<input class="widefat" id="<?php echo $this->get_field_id('rdio'); ?>" name="<?php echo $this->get_field_name('rdio'); ?>" type="text" value="<?php echo $instance["rdio"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('reddit'); ?>">Reddit<input class="widefat" id="<?php echo $this->get_field_id('reddit'); ?>" name="<?php echo $this->get_field_name('reddit'); ?>" type="text" value="<?php echo $instance["reddit"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('rss'); ?>">RSS<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo $instance["rss"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('spotify'); ?>">Spotify<input class="widefat" id="<?php echo $this->get_field_id('spotify'); ?>" name="<?php echo $this->get_field_name('spotify'); ?>" type="text" value="<?php echo $instance["spotify"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('thefancy'); ?>">The Fancy<input class="widefat" id="<?php echo $this->get_field_id('thefancy'); ?>" name="<?php echo $this->get_field_name('thefancy'); ?>" type="text" value="<?php echo $instance["thefancy"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('xbox'); ?>">Xbox<input class="widefat" id="<?php echo $this->get_field_id('xbox'); ?>" name="<?php echo $this->get_field_name('xbox'); ?>" type="text" value="<?php echo $instance["xbox"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('zerply'); ?>">Zerply<input class="widefat" id="<?php echo $this->get_field_id('zerply'); ?>" name="<?php echo $this->get_field_name('zerply'); ?>" type="text" value="<?php echo $instance["zerply"]; ?>" /></label></p>
           
        <?php 
    }

} // class FooWidget

//This sample widget can then be registered in the widgets_init hook:

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("ocmx_social_widget");'));

?>