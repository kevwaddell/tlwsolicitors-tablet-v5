<?php while ( $ts_query->have_posts() ) : $ts_query->the_post();
$ts_post_counter++;	
$date = get_the_date('F jS Y');
 ?>	
 <div class="item">
	<a href="<?php esc_url( the_permalink() ); ?>" class="slider-link" title="View: <?php the_title_attribute(); ?> article" rel="bookmark">
		<article <?php post_class(); ?>>
			<figure class="feat-img">
			 <?php 
				 $img_atts = array('class'	=> "img-responsive");		 
				 the_post_thumbnail( 'post-list-img' , $img_atts); 	 
				?> 
			</figure>
			<div class="slider-txt">
				<header class="slider-header">
					<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><i class="fa fa-calendar"></i> <?php echo $date; ?></time>
					<h3><?php the_title(); ?></h3>
				</header>
				<div class="slider-entry">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</article>
	</a>
 </div>

<?php endwhile; ?>