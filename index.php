<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	<div class="container-fluid">
	
		<div class="content">

			<?php
			
			$news_page_id = get_option('page_for_posts');
			$news_page = get_page($news_page_id);
			//echo '<pre>';print_r($news_page);echo '</pre>';
			$news_page_content_raw = $news_page->post_content;
			$news_page_content = apply_filters('the_content', $news_page_content_raw );
			$news_page_intro = get_field('intro', $news_page->ID);
			$page_icon = get_field('page_icon', $news_page->ID);
			$paged = (get_query_var('paged') != 0) ? get_query_var('paged'):1;
			
			//echo '<pre>';print_r($paged);echo '</pre>';
			?>
			
			<!-- PAGE TOP SECTION -->
			
			<main class="page-col-red">
			
				<article class="page animated fadeIn">
					
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0">
					
							<?php include (STYLESHEETPATH . '/_/inc/posts/index-top-bar.php'); ?>
						
							<!-- POSTS LIST -->
							<?php include (STYLESHEETPATH . '/_/inc/posts/index-post-list.php'); ?>	
							
							<!-- CATEGORIES LIST -->
							<?php include (STYLESHEETPATH . '/_/inc/posts/index-cats-list.php'); ?>
							
							<!-- SOCIAL FEED LARGE -->
							<?php include (STYLESHEETPATH . '/_/inc/posts/social-feed-lrg.php'); ?>
							
						</div>
					</div>
					
				</article>
				
			</main>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
