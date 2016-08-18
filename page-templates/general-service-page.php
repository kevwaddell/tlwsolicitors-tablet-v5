<?php 
/*
Template Name: General Service page
*/
 ?>

<?php get_header(); ?>
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	<?php 
	$freephone_num = get_field('freephone_num', 'option');
	$number_pos = get_field('tel_num_position');
	if (empty($number_pos)) {
	$number_pos = "bottom";	
	}
	$page_icon = get_field('page_icon');
	$download_active = get_field('download_active');
	$brochure = get_field('brochure');
	$bk_download_active = get_field('bk_download_active');
	$color = get_field('page_colour');
	$hide_title = get_field('hide_title'); 
	$parent = get_page($post->post_parent);
	$feedback_active = get_field('feedback_active'); 
	$how_it_works_active = get_field('hiw_active');
	
	if ( has_post_thumbnail() ) {
	$img_post = get_the_ID();
	} else {
	$img_post = $post->post_parent;
	$parent = get_post($img_post);	
	
		if (!has_post_thumbnail($img_post) && $parent->post_parent != 0) {
		$img_post = $parent->post_parent;
		}
	}
	
	//echo '<pre>';print_r($page_icon);echo '</pre>';
	
	if ($page_icon == 'null' || !$page_icon) {
	$parent = get_page($post->post_parent);
	$grand_parent = $parent->post_parent;
	$page_icon = get_field('page_icon', $post->post_parent);
		if ($page_icon == 'null' || !$page_icon) {
		$page_icon = get_field('page_icon', $grand_parent);	
		}
	}
	?>	
	
	<?php if ( has_post_thumbnail($img_post) ) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/service-page/wide-feat-img.php'); ?>
	<?php } ?>

	<!-- MAIN CONTENT START -->
	<div class="container-fluid">
	
		<div class="content">
			<a name="main-content" id="main-content"></a>
			<!-- PAGE TOP SECTION -->
			<main class="page-col-<?php echo (!empty($color)) ? $color : 'red'; ?> animated fadeIn">
				
					<article <?php post_class(); ?>>
					
						<div class="row">
			
							<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-0">
								
								<div class="entry wide-entry">
								
									<header class="pg-header">	
									<?php if ($hide_title == 1) { ?>
									<div class="service-tag"><?php echo get_the_title(); ?></div>
									<?php } ?>	
									<?php if ($hide_title != 1) { ?>		
									<h1><?php the_title(); ?></h1>
									<?php } ?>
									</header>
									
									<div class="main-txt">
										<?php the_content(); ?>
									</div>
									
									<?php include (STYLESHEETPATH . '/_/inc/service-page/booklet-download.php'); ?>
									
									<?php include (STYLESHEETPATH . '/_/inc/service-page/faqs.php'); ?>
									
									<?php include (STYLESHEETPATH . '/_/inc/service-page/footer-info.php'); ?>
																				
								</div>
							
							</div>
								
							<?php get_template_part( 'parts/sidebars/sidebar', 'services' ); ?>
							
						</div>
						
					</article>
					
			</main>
			<!-- PAGE TOP SECTION -->

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
	
	<?php include (STYLESHEETPATH . '/_/inc/service-page/how-it-works.php'); ?>
						
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
