<p class="tel-num">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>

<?php 
$newsletter_pg = get_page_by_title("Join our mailing list");
?>
<div class="posts-bottom-bar">
		
	<div id="search-form">
		<?php get_search_form(); ?>
	</div>
	
	<div class="tb-links">
		<div class="row">
			
			<div class="col-md-4">
				<a href="<?php bloginfo('rss2_url'); ?>" class="icon-btn btn btn-default btn-block" title="Subscribe to our news feed" target="_blank">TLW news feed<i class="fa fa-rss fa-lg icon"></i></a>
			</div>
			
			<div class="col-md-4">
				<a href="<?php echo get_permalink($newsletter_pg->ID); ?>" class="icon-btn btn btn-default btn-block" title="<?php echo get_the_title($newsletter_pg->ID); ?>"><?php echo get_the_title($newsletter_pg->ID); ?><i class="fa fa-paper-plane fa-lg icon"></i></a>
			</div>
			
			<div class="col-md-4">
				<?php include (STYLESHEETPATH . '/_/inc/posts/archive-dropdown.php'); ?>
			</div>
						
		</div>
	</div>

	
</div>