<?php 
/*
Template Name: Service Home page
*/
 ?>

<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
			<?php 
			$freephone_num = get_field('freephone_num', 'option');
			$number_pos = get_field('tel_num_position');
			if (empty($number_pos)) {
			$number_pos = "bottom";	
			}
			$download_active = get_field('download_active');
			$brochure = get_field('brochure');
			$bk_download_active = get_field('bk_download_active');
			$form_active = get_field('form_activated');
			$color = get_field('page_colour');
			$page_icon = get_field('page_icon');
			$page_links = get_field('page_links');
			$on_page_script = get_field('on_page_script');
			$main_title = get_field('main_title');
			$feedback_active = get_field('feedback_active'); 
			$how_it_works_active = get_field('hiw_active');
			
			if ($page_icon == 'null' || !$page_icon) {
			$parent = get_page($post->post_parent);
			$grand_parent = $parent->post_parent;
			$page_icon = get_field('page_icon', $post->post_parent);
				if ($page_icon == 'null' || !$page_icon) {
				$page_icon = get_field('page_icon', $grand_parent);	
				}
			}
			?>	
	<div class="title-banner bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		<div class="container-fluid">
			<?php the_title(); ?>
		</div>
	</div>
				
	<?php if ( has_post_thumbnail() ) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/service-page/banner-feat-img.php'); ?>
	<?php } ?>
	
	<div class="container-fluid">
	
		<div class="content">

			<?php if (!empty($on_page_script)) { ?>
			<?php echo $on_page_script; ?>
			<?php } ?>
			<a name="main-content" id="main-content"></a>
			<main class="page-col-<?php echo (!empty($color)) ? $color : 'red'; ?> animated fadeIn">
					 	
			 	<article <?php post_class(); ?>>
				 	
				 	<div class="row">
					 	
					 	<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-0">
					 	
						 	<div class="entry wide-entry">
								
								<div class="main-txt">
								<?php the_content(); ?>
								</div>
								
								<?php include (STYLESHEETPATH . '/_/inc/service-page/booklet-download.php'); ?>
								
								<?php include (STYLESHEETPATH . '/_/inc/service-page/faqs.php'); ?>
								
								<?php include (STYLESHEETPATH . '/_/inc/service-page/footer-info.php'); ?>
							
						 	</div>
						
					 	</div>
					 	
					 	<?php get_template_part( 'parts/sidebars/sidebar', 'services-landing-page' ); ?>
					 			
				 	</div>
				
				</article>
							 	
			</main>

	</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
	
	<?php include (STYLESHEETPATH . '/_/inc/service-page/how-it-works.php'); ?>
						
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
