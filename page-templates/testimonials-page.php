<?php 
/*
Template Name: Why Choose TLW page template
*/
 ?>

<?php get_header(); ?>

	<!-- MAIN CONTENT START -->
	<div class="container-fluid">
	
		<div class="content">

			<?php
			$feedback_args = array(
				'posts_per_page'   => 10,
				'post_type' => 'tlw_testimonial_cpt',
				'orderby'          => 'rand',
			); 
			$feedback_quotes = get_posts($feedback_args); 
			$freephone_num = get_field('freephone_num', 'option');
			$color = get_field('page_colour');
			$page_icon = get_field('page_icon');
			$hide_title = get_field('hide_title'); 
			
			if (!$page_icon) {
			$page_icon = get_field('page_icon', $post->post_parent);
			}
			//echo '<pre>';print_r($feedback_quotes);echo '</pre>';
			?>
			
			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
				
			<main class="page-col-red animated fadeIn">
				
					<article <?php post_class(); ?>>
					
						<div class="row">
							
							<div class="col-xs-10 col-xs-offset-1">
								
								<div class="entry wide-entry text-center">

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
			
								</div>
								
							<?php if ($feedback_quotes) { 
							$feed_counter = 0;	
							?>
							<div class="rule"></div>
							<!-- TEAM PROFILES SECTION -->
							<section id="feedback-quotes">
								
									<?php foreach ($feedback_quotes as $quote) : 
									$feed_counter++;
									
									$name = get_field('client_name', $quote->ID);	
									$location = get_field('location', $quote->ID);	
									$quote = get_field('quote', $quote->ID);
									
									if ($feed_counter % 2 != 0) {
									$pointer = "pointer-left";	
									} else {
									$pointer = "pointer-right";		
									}	
									
									?>
									<div id="quote-<?php echo $feed_counter ; ?>" class="quote-wrap <?php echo $pointer; ?>">
										<blockquote class="quote text-center"><?php echo $quote ; ?></blockquote>
										<p class="name-location text-center"><?php echo $name ; ?> - <?php echo $location ; ?></p>	
									</div>
									<?php endforeach; ?>
								
								<a href="mailto:info@tlwsolicitors.co.uk?subject=TLW client feedback" class="icon-btn big-btn btn btn-default btn-block" title="Send us your feedback">Send us your feedback</a>
								<p class="tel-num">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
			
							</section>
							<!-- TEAM PROFILES SECTION -->
							
							<?php } ?>
							
							<?php get_template_part( 'parts/sidebars/sidebar', 'feedback' ); ?>
			
							</div>
							
						</div>
						
					</article>
					
			</main>
			
			<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
