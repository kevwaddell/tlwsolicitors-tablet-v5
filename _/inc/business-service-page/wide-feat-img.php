<figure class="feat-img-wide for-biz">
	<?php add_wide_feat_img($post) ; ?>
	<div class="col-overlay"></div><div class="striped-overlay"></div>
	<?php if ($post->post_parent != 0 ) { ?>
	<figcaption class="img-caption"><span><?php echo get_the_title(); ?></span></figcaption>
	<?php } ?>
</figure>