<?php get_template_part( 'parts/headers/header', 'landing-page' ); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$freephone_num = get_field('freephone_num', 'option');
$number_pos = get_field('tel_num_position');
//echo '<pre>';print_r($number_pos);echo '</pre>';
$form = get_field('form');
$form_active = get_field('form_activated');
$color = get_field('page_colour');
$page_icon = get_field('page_icon');
$on_page_script = get_field('on_page_script');
$hide_title = get_field('hide_title'); 
//echo '<pre>';print_r($color);echo '</pre>';
 ?>	
 
<?php if (!empty($on_page_script)) { ?>
<?php echo $on_page_script; ?>
<?php } ?>

<main class="page-wrapper page-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		 	
 	<article <?php post_class(); ?>>
	 	
	<div class="row">
		 	
		 	<div class="col-md-7 col-md-offset-0">
					
			 	<div class="entry entry-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
				 	
				 	<?php if ($hide_title != 1) { ?>
					<h2><?php the_title(); ?></h2>
					<?php } ?>
				
					<?php the_content(); ?>
				
			 	</div>
			
		 	</div>
		 	
		 	<div class="col-md-5 col-md-offset-0">
			 	
			 	<?php get_template_part( 'parts/sidebars/sidebar', 'landing-page' ); ?>	
			 				 	
		 	</div>
		 			
	</div>
	
	</article> 	
	
	<?php if ($number_pos == 'bottom') { ?>
		<p class="tel-num tel-num-<?php echo (!empty($color)) ? $color : 'red'; ?>">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
	<?php } ?>

	
</main>
		
<?php endwhile; ?>
<?php endif; ?>

</div>

</div>
<!-- MAIN CONTENT END -->

</div>

<?php get_template_part( 'parts/footers/footer', 'landing-page' ); ?>