<section class="page-content post-grid">
			
	<h3 class="icon-header red mag-bot-0">Latest from <?php bloginfo('name'); ?><i class="fa fa-bullhorn fa-lg"></i></h3>
	
	<?php 
	//echo '<pre>';print_r($exclude);echo '</pre>';
	
	if (!empty($exclude)) {
	$args = array (
	'post__not_in'	=> $exclude,
	'paged'	=> $paged
	);	
	$wp_query = new WP_Query( $args );	
	//echo '<pre>';print_r($wp_query);echo '</pre>';
	}
	
	if ( have_posts() ): ?>
	
	<div class="row">		
	<?php while ( have_posts() ) : the_post();
	$date = get_the_date('F jS Y');
	 ?>	
	<div class="col-md-4">
		<article <?php post_class(); ?>>
			<a href="<?php esc_url( the_permalink() ); ?>" title="View: <?php the_title_attribute(); ?> article" rel="bookmark">
				<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><i class="fa fa-calendar"></i> <?php echo $date; ?></time>
				<h4><?php the_title(); ?></h4>
				<?php the_excerpt(); ?>
			</a>
		</article>
	</div>
	<?php endwhile; ?>
	</div>
	
	<div class="page-links">
		<?php wp_pagenavi(); ?>
	</div>					
				
	
	<?php else: ?>
	<h3 class="text-center">Sorry</h3>
	<p class="text-center">There is no news at the moment.</p>	
	<?php endif; ?>
					
	<div class="rule"></div>
					
</section>
