<?php get_template_part( 'parts/headers/header', 'landing-page' ); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$freephone_num = get_field('freephone_num', 'option');
$form = get_field('lp_form');
$form_active = get_field('lp_form_active');
$color = get_field('page_colour');
$page_icon = get_field('page_icon');
$hide_title = get_field('hide_title'); 
$all_forms_active = get_field('all_forms_active', 'option');
 ?>			
<!-- MAIN CONTENT START -->
	
<main id="main-content" class="page-wrapper page-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
	<div class="lp-header bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		<div class="container">
			<h1 class="text-center"><?php the_title(); ?></h1>
		</div>
	</div>	 	
 	<article <?php post_class(); ?>>
		<div class="container-fluid">	
			
			<div class="row">
				 	
			 	<div class="col-md-10 col-md-offset-1">
						
				 	<div class="entry entry-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
						
						<div class="main-txt">
						<?php the_content(); ?>
						</div>
						
				 	</div>
				 
			 	</div>
		
			</div>
								 	
			<?php include (STYLESHEETPATH . '/_/inc/sections/sidebar-landing-page.inc'); ?>
			
		</div>
	</article> 	

	
</main>
		
<?php endwhile; ?>
<?php endif; ?>
<!-- MAIN CONTENT END -->

<?php if (!empty($freephone_num)) { ?>
	<div class="contact-details">
	<?php include (STYLESHEETPATH . '/_/inc/sections/global-telephone-number.inc'); ?>		
	<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.inc'); ?>
	</div>
<?php } ?>

</div>

<?php if ($form_active && $all_forms_active) { ?>
<?php include (STYLESHEETPATH . '/_/inc/landing-page/contact-form-modal.inc'); ?>	
<?php } ?>

<?php get_template_part( 'parts/footers/footer', 'landing-page' ); ?>