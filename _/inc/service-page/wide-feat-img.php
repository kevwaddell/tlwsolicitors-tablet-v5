<figure class="feat-img-wide img-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
	<?php add_wide_feat_img($img_post) ; ?>
	<div class="col-overlay"></div><div class="striped-overlay"></div>
	<?php if ($post->post_parent != 0 ) { ?>
	<figcaption class="img-caption"><?php echo ($page_icon) ? '<i class="fa '.$page_icon.' fa-lg"></i>' : ''; ?><span><?php echo get_the_title($post->post_parent); ?></span></figcaption>
	<?php } ?>
</figure>