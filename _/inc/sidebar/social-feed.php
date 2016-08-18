<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	
<h3 class="icon-header">TLW Social <i class="fa fa-arrow-circle-down fa-lg"></i></h3>

<div class="sidebar-feeds-block">
	
	<ul class="list-unstyled feed-links">
		<li class="active twitter"><a href="#twitter-feed" data-toggle="tab" title="Twitter"><i class="fa fa-twitter fa-lg"></i><span class="sr-only">Twitter</span></a></li>
		<li class="facebook"><a href="#facebook-feed" data-toggle="tab" title="Twitter"><i class="fa fa-facebook fa-lg"></i><span class="sr-only">Facebook</span></a></li>
		<li class="google"><a href="#google-plus-feed" data-toggle="tab" title="Twitter"><i class="fa fa-google-plus fa-lg"></i><span class="sr-only">Google+</span></a></li>
	</ul>
	
	<div class="tab-content sidebar-tab-content">
		
		<div id="twitter-feed" class="feed-panel tab-pane fade in active">
			<div class="feed-wrap">
			<?php echo do_shortcode('[wp_rss_multi_importer category="2"]'); ?>
				
			</div>
			
<!-- 			<a href="https://twitter.com/TLWSolicitors" class="feed-link" title="View our Twitter page" target="_blank">View our Twitter page <i class="fa fa-angle-right fa-lg"></i></a> -->
		</div>
		
		<div id="facebook-feed" class="feed-panel tab-pane fade">
			<div class="feed-wrap">
			<?php echo do_shortcode('[wp_rss_multi_importer category="3"]'); ?>
				
			</div>
			
<!-- 			<a href="http://facbook.com/" class="feed-link" title="View our Facebook page" target="_blank">View our Facebook page <i class="fa fa-angle-right fa-lg"></i></a> -->
		</div>
		
		<div id="google-plus-feed" class="feed-panel tab-pane fade">
			<div class="feed-wrap">
			<?php echo do_shortcode('[wp_rss_multi_importer category="1"]'); ?>
				
			</div>
			
<!-- 			<a href="https://plus.google.com/+TlwsolicitorsCoUk" class="feed-link" title="View our Google+ page" target="_blank">View our Google+ page <i class="fa fa-angle-right fa-lg"></i></a> -->
		</div>

		
	</div>
	
</div>
<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	