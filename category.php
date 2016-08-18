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
?>
<!-- PAGE TOP SECTION -->
			<main class="page-col-red animated fadeIn">
				
				<article class="page">
					
					<?php include (STYLESHEETPATH . '/_/inc/posts/index-top-bar.php'); ?>
					
					<!-- CATEGORY LIST -->
					<?php include (STYLESHEETPATH . '/_/inc/posts/category-post-list.php'); ?>	
					
					<!-- CATEGORIES LIST -->
					<?php include (STYLESHEETPATH . '/_/inc/posts/index-cats-list.php'); ?>		
					
					<!-- SOCIAL FEED LARGE -->
					<?php include (STYLESHEETPATH . '/_/inc/posts/social-feed-lrg.php'); ?>	
						
				</article>
								
			</main>		
			
		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
	
<?php get_footer(); ?>
