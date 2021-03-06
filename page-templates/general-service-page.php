<?php 
/*
Template Name: General Service page
*/
 ?>

<?php get_header(); ?>	
	
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	<?php 
		$color = get_field('page_colour');
		$page_icon = get_field('page_icon');
		$sections_active = get_field('sections_active');
		$banner_active = get_field('banner_active');	
		
		if ( has_post_thumbnail() ) {
		$img_post = get_the_ID();
		}
	?>	
	
	<!-- MAIN CONTENT START -->
	<main id="main-content">
		
		<?php include (STYLESHEETPATH . '/_/inc/xmas/pop-up.inc'); ?>
		
		<?php include (STYLESHEETPATH . '/_/inc/global/awards-strip.inc'); ?>	
		
		<?php include (STYLESHEETPATH . '/_/inc/global/breadcrumbs.php'); ?>
		
		<!-- BANNER SECTION -->
		<?php if ($banner_active) { 
		$banner_type = get_field('banner_type');	
		?>
		
			<?php if ($banner_type == 'slider') { ?>
			<?php include (STYLESHEETPATH . '/_/inc/banners/testimonial-slider.inc'); ?>			
			<?php } ?>
			
			<?php if ($banner_type == 'slim-img') { ?>
			<?php include (STYLESHEETPATH . '/_/inc/banners/img-banner-slim.inc'); ?>			
			<?php } ?>	
			
			<?php if ($banner_type == "video") { ?>
			<?php include (STYLESHEETPATH . '/_/inc/banners/video-banner.inc'); ?>		
			<?php } ?>
			
			<?php if ($banner_type == "img") { ?>
			<?php include (STYLESHEETPATH . '/_/inc/banners/img-banner.inc'); ?>		
			<?php } ?>	
			
		<?php } ?>		
		
		
		<!-- MAIN TEXT SECTION -->
		<?php include (STYLESHEETPATH . '/_/inc/sections/main-content-section.inc'); ?>
		
		<?php if ($sections_active) { 
		$sections = get_field('sections'); 
		?>		
		
			<?php foreach ($sections as $section) { ?>
				<?php if ($section['acf_fc_layout'] == 'video-section') { ?>
				<!-- VIDEO SECTION -->
					<?php include (STYLESHEETPATH . '/_/inc/sections/video-section.inc'); ?>		
				<?php } ?>
				
				<?php if ($section['acf_fc_layout'] == 'feedback-section') { ?>
				<!-- FEEDBACK SECTION -->
					<?php include (STYLESHEETPATH . '/_/inc/sections/feedback-section.inc'); ?>		
				<?php } ?>
				
				<?php if ($section['acf_fc_layout'] == 'faqs-section') { ?>
				<!-- FAQ's SECTION -->
					<?php include (STYLESHEETPATH . '/_/inc/sections/faqs-section.inc'); ?>		
				<?php } ?>
				
				<?php if ($section['acf_fc_layout'] == 'form-section') { ?>
				<!-- FORM SECTION -->
					<?php include (STYLESHEETPATH . '/_/inc/sections/form-section.inc'); ?>		
				<?php } ?>
				
				<?php if ($section['acf_fc_layout'] == 'blog-posts') { ?>
				<!-- BLOG SECTION -->
					<?php include (STYLESHEETPATH . '/_/inc/sections/blog-section.inc'); ?>		
				<?php } ?>
				
				<?php if ($section['acf_fc_layout'] == 'downloads-section') { ?>
				<!-- DOWNLOADS SECTION -->
					<?php include (STYLESHEETPATH . '/_/inc/sections/downloads-section.inc'); ?>		
				<?php } ?>
				
				<?php if ($section['acf_fc_layout'] == 'toolkit-section') { ?>
				<!-- TOOLKIT SECTION -->
					<?php include (STYLESHEETPATH . '/_/inc/sections/toolkit-section.inc'); ?>		
				<?php } ?>
	
			<?php } ?>
		
		<?php } ?>
		
	</main>	
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
