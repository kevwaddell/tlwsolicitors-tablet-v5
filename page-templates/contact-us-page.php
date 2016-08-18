<?php 
/*
Template Name: Contact Us Page v2
*/
 ?>

<?php get_header(); ?>

	<!-- MAIN CONTENT START -->
	<div class="container-fluid">
	
		<div class="content">

			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
			<?php $form = get_field('form'); ?>	
			
			<main <?php post_class('page-col-red animated fadeIn'); ?>>
			 	
			 	<div class="row">
				 	
				 	<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
					 	<div class="main-txt">
							<?php the_content(); ?>
						</div>
				 	</div>
				 	
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-0">

						<a id="make-a-claim" name="make-a-claim"></a>
						
						<div class="contact-form">
						<?php if ($form) { ?>
						<h3 class="icon-header" style="margin-bottom: 0px;"><?php echo $form->title; ?> <i class="fa fa-cog fa-lg"></i></h3>
						<?php gravity_form($form->id, false, true, false, null, true); ?>
						
						<?php }  ?>
						</div>
						
					</div>
					
					<?php get_template_part( 'parts/sidebars/sidebar', 'contact-us' ); ?>				
					
			</main>
					
			<?php endwhile; ?>
<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
