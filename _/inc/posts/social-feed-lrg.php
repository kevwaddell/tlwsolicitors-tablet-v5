<?php 
$twitter_url = get_field('twitter_page', 'options');	
$facebook_url = get_field('facebook_page', 'options');	
$google_url = get_field('google_page', 'options');	
?>

<section class="social-feed-lrg">
	<h3 class="icon-header">TLW Social <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
	
	<div class="social-feed-inner">
		
		<div class="feed-box twitter-feed">
			<a href="<?php echo $twitter_url; ?>" target="_blank" class="feed-link-btn"><i class="fa fa-twitter fa-lg"></i><span class="sr-only">Twitter</span></a>
			<div class="feed-wrapper">
				<?php echo do_shortcode('[wp_rss_multi_importer category="2" thisfeed="1"]'); ?>
			</div>
		</div>
		
		<div class="feed-box facebook-feed">
			<a href="<?php echo $facebook_url; ?>" target="_blank" class="feed-link-btn"><i class="fa fa-facebook fa-lg"></i><span class="sr-only">Facebook</span></a>
			<div class="feed-wrapper">
				<?php echo do_shortcode('[wp_rss_multi_importer category="3" thisfeed="1"]'); ?>	
			</div>
		</div>
		
		<div class="feed-box google-feed">
			<a href="<?php echo $google_url; ?>" target="_blank" class="feed-link-btn"><i class="fa fa-google-plus fa-lg"></i><span class="sr-only">Google+</span></a>
			<div class="feed-wrapper">
				<?php echo do_shortcode('[wp_rss_multi_importer category="1" thisfeed="1"]'); ?>
			</div>
		</div>
		
	</div>
	
	<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>
	
	<div class="rule"></div>
	
</section>