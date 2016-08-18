<?php 
$freephone_num = get_field('freephone_num', 'option');
$cats = wp_get_post_categories(get_the_ID());
	
$topics_args = array(
	'orderby'            => 'meta_value',
	'hierarchical'       => 0,
	'title_li'           => "",
	'show_option_none'   => "",
	'echo'               => 0,
	'taxonomy'           => 'category',
	'current_category'	=> $cats[0]
	);
	
if (count($cats) > 1) {
$topics_args['current_category'] = $cats[count($cats)-1];
}
	
$topics = wp_list_categories($topics_args);
global $show_feat_img;
global $feat_img_options;
$add_form = get_field('add_form');
//echo '<pre>';print_r($cats);echo '</pre>';
?>
<aside class="sidebar hidden-sm col-md-4">
	
	
	<?php if ($show_feat_img &&  $feat_img_options == 'sidebar') { ?>
	
	<?php if (has_post_thumbnail()) { 
	$img_atts = array('class'	=> "img-responsive");
	$thumb_id = get_post_thumbnail_id($post->ID);
	$thumb_args = array(
	'p' => $thumb_id,
	'posts_per_page' => 1,
	'post_type' => 'attachment',
	'include'	=> $thumb_id
	);
	$thumb_image = get_posts($thumb_args);
	
	if ($thumb_image[0]->post_excerpt) {
	$thumb_caption = $thumb_image[0]->post_excerpt;	
	}
	if ($thumb_image[0]->post_content) {
	$thumb_caption = $thumb_image[0]->post_content;	
	}
	?>
	<figure class="feat-img">
	<?php the_post_thumbnail( 'feat-img', $img_atts ); ?>
	
	<?php if ($thumb_caption) { ?>
	<figcaption class="feat-img-caption"><?php echo $thumb_caption; ?></figcaption>
	<?php } ?>
	</figure>
	
	<?php }  ?>
	
	<?php }  ?>

	
	<?php 
	$gallery_imgs = get_field('gallery_imgs');
	
	if ($gallery_imgs) { 
	
	//echo '<pre>';print_r($gallery_imgs);echo '</pre>';	
		
	?>
	<div class="sidebar-block border-top-red">
		<h3 class="icon-header">Image Gallery <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
		<ul class="list-unstyled img-links clearfix">
	<?php foreach( $gallery_imgs as $gallery_img ): 
			if ($gallery_img['alt']) {
			$alt = $gallery_img['alt'];
			}	
			?>
			<li>
				<a href="<?php echo $gallery_img['sizes']['medium']; ?>" rel="fancybox" class="zoomable">
					<img src="<?php echo $gallery_img['sizes']['gallery-img']; ?>" class="img-responsive" width="<?php echo $gallery_img['sizes']['gallery-img-width']; ?>" height="<?php echo $gallery_img['sizes']['gallery-img-height']; ?>"<?php echo ($alt) ? ' alt="'.$alt.'"': ''; ?>>
				</a>
			</li>
	<?php endforeach; ?>
		</ul>
	</div>

	<?php } ?>

	
	<div id="search-form">
		<?php get_search_form(); ?>
	</div>

	<div class="cats-drop-down">
	<?php include (STYLESHEETPATH . '/_/inc/posts/cats-dropdown.php'); ?>
	</div>
	
	<?php include (STYLESHEETPATH . '/_/inc/sidebar/sb-btns.php'); ?>
	
	<?php if ($add_form) { 
	$form = get_field('form');
	?>
	<div class="contact-form sb-form">
		<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	
		<h3 class="icon-header">Make a claim enquiry <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
		
		<?php gravity_form($form->id, false, true, false, null, true); ?>
					
	</div>	
	<?php } ?>
	
	<p class="tel-num">Call us <span>free<br><a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
			
</aside>