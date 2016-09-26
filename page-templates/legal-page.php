<?php 
/*
Template Name: Legal pages template
*/
?>
<?php get_header(); ?>
	<!-- MAIN CONTENT START -->

	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	<?php 
	$color = get_field('page_colour');
	
	$children_args = array(
		'sort_column' => 'menu_order',
		'hierarchical' => 0,
		'post_type' => 'page'
	);
	
	if ($post->post_parent == 0) {
	$children_args['parent'] = $post->ID;
	} else {
	$children_args['parent'] = $post->post_parent;	
	}
	
	$children = get_pages($children_args);	
	
	//echo '<pre>';print_r($children);echo '</pre>';
	
	if ( has_post_thumbnail() ) {
	$img_post = get_the_ID();
	}
	
	?>	
	<main>
		
		<?php include (STYLESHEETPATH . '/_/inc/global/awards-strip.inc'); ?>	
		
		<?php include (STYLESHEETPATH . '/_/inc/global/breadcrumbs.php'); ?>
		
		<?php if (has_post_thumbnail()) { ?>
			<?php include (STYLESHEETPATH . '/_/inc/banners/img-banner-slim.inc'); ?>			
		<?php } ?>	
		
	 	<!-- MAIN TEXT SECTION -->
		<?php include (STYLESHEETPATH . '/_/inc/sections/main-content-section.inc'); ?>
		
	 	
	</main>
			
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
