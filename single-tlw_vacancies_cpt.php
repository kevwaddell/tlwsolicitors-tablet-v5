<?php get_header(); ?>
			
			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
			<!-- MAIN CONTENT START -->

			
			<main class="page-col-red">
				
				<?php include (STYLESHEETPATH . '/_/inc/xmas/pop-up.inc'); ?>
				
				<?php include (STYLESHEETPATH . '/_/inc/global/awards-strip.inc'); ?>	
							
				<?php include (STYLESHEETPATH . '/_/inc/global/breadcrumbs.php'); ?>
				
				<?php include (STYLESHEETPATH . '/_/inc/vacancies/sections/main-content-section.inc'); ?>
				
				<?php include (STYLESHEETPATH . '/_/inc/vacancies/sections/send-us-cv.inc'); ?>
				
			</main>
			
			<?php endwhile; ?>
			<?php endif; ?>

<?php get_footer(); ?>
