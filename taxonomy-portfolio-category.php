<?php get_header();
$parentpage = get_template_link("portfolio.php");
$layout = get_post_meta($parentpage->ID, "layout", true);
$terms = get_terms("portfolio-category", "orderby=count&hide_empty=0"); 
$activeterm = get_term_by( 'slug', get_query_var('term' ), get_query_var( 'taxonomy' ) ); 

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
	"showposts" => "-1",
	"tax_query" => array(
		array(
			'taxonomy' => 'portfolio-category',
			'field' => 'slug',
			'terms' => $activeterm->slug
		)
	)
);

$portfolio = new WP_Query($args);

?>
<div class="portfolio-title-block">
	<h2 class="post-title"><?php echo $parentpage->post_title; ?> <span>/ <?php echo $term->name; ?></span></h2>
</div>

<?php // Query Portfolio Categories
if ( !empty($activeterm) ) : ?>
	<ul class="portfolio-category-list">
		<li><a href="<?php  echo get_permalink($parentpage->ID); ?>"><?php _e("All", "ocmx"); ?></a></li>
		<?php foreach($terms as $term) :
			$link = get_term_link($term->slug, "portfolio-category");
			$class = "";
			if($activeterm->slug == $term->slug	)
				$class = "class=\"selected\"";
			echo "<li><a href=\"$link\" $class>".$term->name."</a></li>";
		endforeach; ?>
	</ul>
<?php endif; ?>  

<ul class="<?php echo $layout ;?> portfolio-list clearfix">
	<?php while ($portfolio->have_posts() ) : $portfolio->the_post();
		get_template_part("functions/portfolio-list"); ?>
	<?php endwhile; ?>
</ul>

<?php get_footer(); ?>