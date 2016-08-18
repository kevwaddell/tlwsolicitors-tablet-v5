<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	<div class="container-fluid">
	
		<div class="content">

			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); 
			$download_active = get_field('download_active');
			$freephone_num = get_field('freephone_num', 'option');
			$date = get_the_date('l - jS F - Y');	
			$gallery_imgs = get_field('gallery_imgs');	
			$show_feat_img = get_field('show_feat_img');
			$show_author = get_field('show_author');
			if ($show_feat_img) {
			$feat_img_options = get_field('feat_img_options');
			}
			?>	
			<main class="page-col-red animated fadeIn">
				
				<article <?php post_class(); ?>>
					
				<div class="row">
					
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-0">
						<div class="entry wide-entry">
							
							<header class="pg-header">		
							<?php if ( $show_feat_img && $feat_img_options == 'wide') { ?>			
								<?php if ( has_post_thumbnail() ) { 
								$thumb_id = get_post_thumbnail_id($post->ID);
								$thumb_args = array(
								'p' => $thumb_id,
								'posts_per_page' => 1,
								'post_type' => 'attachment',
								'include'	=> $thumb_id
								);
								$thumb_image = get_posts($thumb_args);
				
								//echo '<pre>';print_r($thumb_image);echo '</pre>';
								if ($thumb_image[0]->post_excerpt) {
								$thumb_caption = $thumb_image[0]->post_excerpt;	
								}
								if ($thumb_image[0]->post_content) {
								$thumb_caption = $thumb_image[0]->post_content;	
								}
								?>
								
								<?php include (STYLESHEETPATH . '/_/inc/posts/posts-wide-feat-img.php'); ?>

								<?php } ?>
							<?php } ?>
								
								<time class="date" datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><i class="fa fa-calendar fa-lg"></i> <?php echo $date; ?></time>
								<h1><?php the_title(); ?></h1>
							</header>
			
							<div class="main-txt">
								<?php the_content(); ?>
							</div>
							
							<?php include (STYLESHEETPATH . '/_/inc/posts/download-form.php'); ?>
							
							<div class="post-footer hidden-md">
								<?php include (STYLESHEETPATH . '/_/inc/posts/single-footer-bar.php'); ?>
							</div>
							
						</div>
					</div>
				
					<?php get_sidebar('single'); ?>
						
				</div>
			
								
				</article>
				
			</main>
			
			<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
<?php get_footer(); ?>
