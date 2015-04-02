<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> xmlns:og="http://ogp.me/ns/fb#" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:addthis="http://www.addthis.com/help/api-spec">
<head profile="http://gmpg.org/xfn/11">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--Set Viewport for Mobile Devices -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<title>
<?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'ocmx' ), max( $paged, $page ) );
?>
</title>
<!-- Setup OpenGraph support-->
<?php if(get_option("ocmx_open_graph") !="yes") {
	$default_thumb = get_option('ocmx_site_thumbnail');
	$fb_image = get_fbimage();
	if(is_home()) :
?>

<meta property="og:title" content="<?php bloginfo('name'); ?>"/>
<meta property="og:description" content="<?php bloginfo('description'); ?>"/>
<meta property="og:url" content="<?php echo home_url(); ?>"/>
<meta property="og:image" content="<?php if(isset($default_thumb) && $default_thumb !==""){echo $default_thumb; } else {echo $fb_image;}?>"/>
<meta property="og:type" content="<?php echo "website";?>"/>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>

<?php else : ?>
<meta property="og:title" content="<?php the_title(); ?>"/>
<meta property="og:description" content="<?php echo strip_tags($post->post_excerpt); ?>"/>
<meta property="og:url" content="<?php the_permalink(); ?>"/>
<meta property="og:image" content="<?php if($fb_image ==""){echo $default_thumb;} else {echo $fb_image;} ?>"/>
<meta property="og:type" content="<?php echo "article"; ?>"/>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>

<?php endif;
}?>
<!-- Begin Styling -->
<?php if(get_option("ocmx_custom_favicon") != "") : ?>
	<link href="<?php echo get_option("ocmx_custom_favicon"); ?>" rel="icon" type="image/png" />
<?php endif; ?>

<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo get_template_directory_uri(); ?>/responsive.css" rel="stylesheet" type="text/css" />


<?php if(get_option("ocmx_rss_url")) : ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo get_option("ocmx_rss_url"); ?>" />
<?php else : ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<?php endif; ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if(get_option("ocmx_typekit") != "") :
	echo get_option("ocmx_typekit");
endif; ?>


<!--[if lt IE 8]>
	   <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/ie.css" media="screen" />
<![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class(''); ?>>

<div id="header-container">
	<div id="header" class="clearfix">
		<!--Logo -->
		<div class="logo">
			<h1>
				<?php if(get_option("ocmx_custom_logo")) : ?>
					<a href="<?php echo home_url(); ?>"><img src="<?php echo get_option("ocmx_custom_logo"); ?>" alt="<?php bloginfo('name'); ?>" /></a>
				<?php else : ?>
					<a href="<?php echo home_url(); ?>"><?php echo strip_tags(bloginfo('name')); ?></a>
				<?php endif; ?>
			</h1>
			<?php if(get_option("ocmx_display_site_tagline") != "no") : ?>
				<p class="tagline">
					<?php echo strip_tags(bloginfo('description')); ?>
				</p>
			<?php endif; ?>
		</div>
		<!--Menu -->
		<?php
			if (function_exists("wp_nav_menu")) :
				wp_nav_menu(array(
						'menu' => 'Kiosk Nav',
						'menu_id' => 'nav',
						'menu_class' => 'clearfix',
						'sort_column' 	=> 'menu_order',
						'theme_location' => 'primary',
						'container' => 'ul',
						'fallback_cb' => 'ocmx_fallback')
			);
		endif; ?>

	</div><!--End header -->
	<div class="search-form-top" style="display:none">
		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:" />
			<input type="submit" class="search-submit" value="Search" />
		</form>
	</div>

</div><!--End header-container -->

<?php if(get_header_image() != "") : ?>
	<div id="header-banner"></div>
<?php endif; ?>

<!--Begin Content -->
<div id="content-container" class="clearfix <?php echo get_option( "ocmx_sidebar_layout" ); ?>">
	<a href="#" id="menu-drop-button"></a>
