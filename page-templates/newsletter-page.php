<?php 
/*
Template Name: Newsletter sign up template
*/
?>
<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	<div class="container-fluid">
	
		<div class="content">

			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
			<?php 
			$form = get_field('form');
			$hide_title = get_field('hide_title'); 
			 ?>	
			 <main class="page-col-red animated fadeIn">
				 
				 <div class="row">
				 
				 	<div class="col-xs-10 col-xs-offset-1">
				 	
						<article <?php post_class(); ?>>
							<?php if ($hide_title != 1) { ?>
								<h1><?php the_title(); ?></h1>
							<?php } ?>
	
							<?php the_content(); ?>
							
							<?php if ($form) { ?>
							
							<?php gravity_form($form->id, false, false, false, null, true); ?>
							
							<?php }  ?>
							
						</article>
					 
					 </div>
				
				 </div>
			 
			 </main>
			<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
