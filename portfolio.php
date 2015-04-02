<?php
/*
	Template Name: Portfolio List
*/

get_header();

$parentpage = get_template_link("portfolio.php");
$cat_list = get_terms("portfolio-category", "orderby=count&hide_empty=0");
$layout = get_post_meta($post->ID, "layout", true);
if($layout == "one-column") :
	$nextul = 1;
elseif($layout == "two-column") :
	$nextul = 2;
else :
	$nextul = 3;
endif;
$i = 1; 

$args = array( 
	"post_type" => "portfolio", 
	"post_status" => "publish", 
	"showposts" => "-1"
);

$portfolio = new WP_Query($args);

?>

<?php while (have_posts() ) : the_post(); ?>
	<div class="portfolio-title-block">
		<!--Show the title -->
		<h2 class="post-title"><?php the_title(); ?></h2>
	</div>
	
	<?php if ($cat_list != "") : ?>
		<ul class="portfolio-category-list">
			<?php foreach($cat_list as $tax) :
				$link = get_term_link($tax->slug, "portfolio-category");
				echo "<li><a href=\"$link\">".$tax->name."</a></li>";
			endforeach; ?>
		</ul>
	<?php endif; ?>
<?php endwhile; ?>

<ul class="<?php echo $layout ;?> portfolio-list clearfix">
	<?php while ($portfolio->have_posts() ) : $portfolio->the_post();
		get_template_part("functions/portfolio-list"); ?>
	<?php endwhile; ?>
</ul>
	
<?php get_footer(); ?>