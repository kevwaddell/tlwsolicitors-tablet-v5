<?php 
/*
Template Name: Sitemap page
*/
 ?>

<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	

<!-- MAIN CONTENT START -->
<main>
	
	<?php include (STYLESHEETPATH . '/_/inc/global/breadcrumbs.php'); ?>
		
	<article <?php post_class("content-section"); ?>>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
						
						<div class="entry wide-entry">		
							<div class="main-txt">
								<h1 class="text-center"><?php the_title(); ?></h1>
					
								<?php the_content(); ?>	
							</div>
						</div>
						
						<div class="search-form-wrap text-center">
						<?php get_search_form(); ?>
						</div>
						
						<?php include (STYLESHEETPATH . '/_/inc/site-map/vars.inc'); ?> 
				
						<section id="site-map-lists">
				
							<div class="row">
							<!-- Left -->
							<?php include (STYLESHEETPATH . '/_/inc/site-map/site-map-list-left-col.inc'); ?> 
							
							<!-- Right -->
							<?php include (STYLESHEETPATH . '/_/inc/site-map/site-map-list-right-col.inc'); ?>
							
							</div>
				
						</section>
				</div>
			</div>
		</div>
	</article>


 </main>
		
<?php endwhile; ?>
<?php endif; ?>
	
<?php get_footer(); ?>
