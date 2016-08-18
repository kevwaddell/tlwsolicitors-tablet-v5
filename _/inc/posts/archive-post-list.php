<?php  	
$found_posts = $wp_query->found_posts;
$posts_per_page = get_query_var('posts_per_page');
?>

<section class="page-content post-grid">

	<h3 class="icon-header red mag-bot-0">
	<?php
	if ( is_day() ) :
	printf( __( 'Daily Archives: %s', 'tlwsolicitors' ), get_the_date() );
	elseif ( is_month() ) :
	printf( __( 'Monthly Archives: %s', 'tlwsolicitors' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'tlwsolicitors' ) ) );
	elseif ( is_year() ) :
	printf( __( 'Yearly Archives: %s', 'tlwsolicitors' ), get_the_date( _x( 'Y', 'yearly archives date format', 'tlwsolicitors' ) ) );
	else :
	_e( 'Archives' );
	endif;
	?><i class="fa fa-calendar fa-lg"></i>
	</h3>
			
	<?php if ( have_posts() ): ?>
	<div class="row">
		<?php while ( have_posts() ) : the_post(); 
		$date = get_the_date('F jS Y');
		?>	
		<div class="col-xs-4">	
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
	
	<?php if ($found_posts > $posts_per_page) { ?>
	<div class="page-links">
		<?php wp_pagenavi(); ?>
	</div>
	<?php } ?>		
					
	<?php else: ?>
	<div class="no-posts well well-lg">
		<h3 class="text-center">Sorry</h3>
		<p class="text-center">There is no archived articles at the moment.</p>
	</div>
	<?php endif; ?>
	
	<div class="rule"></div>
	
</section>