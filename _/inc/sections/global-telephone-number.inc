<?php 
$freephone_num = get_field('freephone_num', 'option');	
?>
<?php if (!empty($freephone_num)) { ?>
<div id="global-tel-num">
	<i class="fa fa-phone fa-lg"></i>
	<div class="number font-slab-serif">
		Call us <span class="caps">free</span> on <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a>
	</div>
	<i class="fa fa-mobile-phone fa-2x"></i>
	<div class="overlay"></div>
</div>
<?php } ?>