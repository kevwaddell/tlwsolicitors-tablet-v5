<?php 
/*
Template Name: Team Profiles Page
*/
 ?>

<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	<div class="container-fluid">
	
		<div class="content">
			
			<?php
			$position_args = array(
				'orderby'       => 'meta_value', 
			    'hide_empty'    => true); 
			$positions = get_terms( 'tlw_positions_tax', $position_args );
			//echo '<pre>';print_r($positions);echo '</pre>';
			$tabs_counter = 0;
			$panels_counter = 0;
			$freephone_num = get_field('freephone_num', 'option');
			?>
			
			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
			<?php 
			$hide_title = get_field('hide_title'); 
			$page_icon = get_field('page_icon');
			$color = get_field('page_colour');
			
			if (!$page_icon) {
			$page_icon = get_field('page_icon', $post->post_parent);
			}
			 ?>	
			<!-- PAGE TOP SECTION -->
			<main class="page-col-red animated fadeIn">
					
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
									
									<?php include (STYLESHEETPATH . '/_/inc/team-page/team-list.php'); ?>
								
								</div>
							
							</div>
							
							<?php get_template_part( 'parts/sidebars/sidebar', 'company' ); ?>
							
						</div>
						
					</article>
					
			</main>
					
			<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
