<?php 
//echo '<pre class="debug">';print_r($wp_query);echo '</pre>';
$post_type = get_query_var('post_type');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts_per_page = get_query_var('posts_per_page');
$today = date('Ymd');

$args = array(
'post_type' => $post_type,
'posts_per_page' => $posts_per_page,
'order'	=> 'DESC',
'orderby' => 'date',
'paged'	=> $paged,
'meta_key' => 'job_display_to_date',
'meta_value' => $today,
'meta_compare' => '>'
);
	
$wp_query = new WP_Query( $args );

$section_title = "Positions available";	
$post_count = $wp_query->found_posts;
?>

<section id="vacancies-section" class="pg-section">
	<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
	
	<?php if ( have_posts() ): ?>
		<div class="container-fluid">
			<div class="row">
			<div class="col-md-10 col-md-offset-1">
			<?php while ( have_posts() ) : the_post();
				$date = get_the_date('l - jS F - Y');
				$job_title = get_field('job_title');
				$job_ref = get_field('job_ref');
				$short_description = get_field('short_description');
				$job_closing_date = get_field( 'job_closing_date');
			?>	

				<article <?php post_class(); ?>>
					<div class="close-date text-center">Closing date: <?php echo (empty($job_closing_date)) ? "TBA": date('d.m.Y', strtotime($job_closing_date) ); ?></div>
					<h4><?php echo $job_title; ?></h4>
					<div class="ref">[ref: <?php echo $job_ref; ?>]</div>
					<div class="description">
						<?php echo $short_description; ?>
					</div>
					<a href="<?php esc_url( the_permalink() ); ?>" class="btn btn-default btn-block" title="View: <?php the_title_attribute(); ?> vacancy" rel="bookmark">View vacancy</a>
				</article>

		<?php endwhile; ?>
				</div>
			</div>
			<?php if ($post_count > $posts_per_page) { ?>
			<div class="vacs-page-links">	
				<?php wp_pagenavi(); ?>
			</div>	
			<?php } ?>	
		</div>
					
					
		<?php else: ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
					<div class="well well-lg">
						<h3 class="text-center">There are no positions available at the moment</h3>
						<p class="text-center">Please send us your CV and we will keep you on file for when a relevant post comes available.</p>
					</div>		
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<div class="overlay"></div>
</section>