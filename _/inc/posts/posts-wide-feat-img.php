<figure class="feat-img-wide">
	<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	
	<?php add_wide_feat_img($post) ; ?>
	<?php if ($thumb_caption) { ?>
	<figcaption class="feat-img-caption"><?php echo $thumb_caption; ?></figcaption>
	<?php } ?>
</figure>