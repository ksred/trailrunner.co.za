</div><!--End Content Container -->

<div id="footer-container" <?php if( get_option( "ocmx_show_footer" ) != "false" ) : ?>style="display: block"<?php endif; ?>>
	<div id="footer">
	    <ul class="footer-widgets">
	        <?php if (function_exists('dynamic_sidebar')) :
	            dynamic_sidebar('footersidebar');
	        endif; ?>
	    </ul>
	       
	    <div class="footer-text">
	        <p class="copyright"><?php echo stripslashes(get_option("ocmx_custom_footer")); ?></p>
	        <?php if( get_option("ocmx_logo_hide") != "true") : ?>
	            <div class="obox-credit">
	                <p><a href="http://www.obox-design.com/wordpress-themes/blogging.cfm">Personal WordPress Themes</a> by <a href="http://www.obox-design.com"><img src="<?php echo get_template_directory_uri(); ?>/images/obox-logo.png" alt="Obox Logo" /></a></p>
	            </div>
	        <?php endif; ?>
	    </div>
	</div>
</div>

<!--Get Google Analytics -->
<?php 
	if(get_option("ocmx_googleAnalytics")) :
		echo stripslashes(get_option("ocmx_googleAnalytics"));
	endif;
?>

<?php wp_footer(); ?>
</body>
</html>