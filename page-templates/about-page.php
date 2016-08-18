<?php 
/*
Template Name: About page template
*/
 ?>

<?php get_header(); ?>
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	
	<?php 
	$freephone_num = get_field('freephone_num', 'option');
	$page_icon = get_field('page_icon');
	$color = get_field('page_colour');
	$hide_title = get_field('hide_title'); 
	$latest_news_active = get_field('latest_news_active');
	//echo '<pre>';print_r($brochure);echo '</pre>';
	if ($page_icon == 'null' || !$page_icon) {
	$page_icon = get_field('page_icon', $post->post_parent);
	}
	?>	
	
	<?php if ( has_post_thumbnail() ) { ?>
	<?php include (STYLESHEETPATH . '/_/inc/pages/wide-feat-img.php'); ?>
	<?php } ?>

	<!-- MAIN CONTENT START -->
	<div class="container-fluid">
	
		<div class="content">
			<a name="main-content" id="main-content"></a>
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
									
																	
									<footer class="footer-pg-info">
									 <p class="tel-num">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
									</footer>
									
									<?php include (STYLESHEETPATH . '/_/inc/global/latest-news-panel.php'); ?>
									
								</div>
							
							</div>
							
							<?php get_template_part( 'parts/sidebars/sidebar', 'company' ); ?>
							
						</div>
						
					</article>
					
			</main>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
						
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
