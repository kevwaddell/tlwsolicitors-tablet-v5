<?php  	
$found_posts = $wp_query->found_posts;
$posts_per_page = get_query_var('posts_per_page');
?>

<section class="page-content post-grid">
			
	<h3 class="icon-header red mag-bot-0"><?php bloginfo('name'); ?> Blog Category: <?php single_cat_title(); ?><i class="fa fa-bullhorn fa-lg"></i></h3>
	
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
		<p class="text-center">There is no <strong><?php single_cat_title(); ?></strong> at the moment.</p>
	</div>
	<?php endif; ?>
	
	<div class="rule"></div>

</section>