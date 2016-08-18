<?php 
$biz_hp_banner_active = get_field('biz_hp_banner_active', 'option');	
$biz_banner_links = get_field('biz_banner_links', 'option');
$first_slide_active = get_field('first_slide_active', 'option');
$slide_tag = get_field('first_slide_tag', 'option');
$slide_img = get_field('first_slide_img', 'option');
$bblinks_counter = 0;	
//echo '<pre>';print_r($biz_banner_links);echo '</pre>';
?>

<?php if ($biz_hp_banner_active && $first_slide_active && !empty($biz_banner_links)) { ?>

<section id="business-home-banner">
	<div class="striped-overlay"></div>
	<div id="business-carousel" class="carousel carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
			
			<?php if ($first_slide_active) { 
			$img = $slide_img['sizes']['wide-banner-img'];
			?>
			<div id="item-start" class="item active">
				<div class="img" style="background-image: url(<?php echo $img; ?>);"></div>
				<div class="slider-tag animated slideInUp"><?php echo $slide_tag; ?></div>
			</div>
			<?php } else { ?>
			<div id="item-start" class="item active">
				<div class="img" style="background-image: url('http://tlwsolicitors_v3.dev/wp-content/uploads/2015/04/bussiness-2000x490-1427904575.jpg?3d6ce');"></div>
				<div class="slider-tag animated slideInUp">Helping businesses through out the UK</div>
			</div>
			<?php } ?>
			<?php foreach ($biz_banner_links as $banner_link) { 
			$pg_id = $banner_link['page_link'];
			$pg = get_post($pg_id);	
			$pg_title = $banner_link['link_title'];
			$img = $banner_link['slider_img']['sizes']['wide-banner-img'];
			?>
			<div id="item-<?php echo $pg->post_name; ?>" class="item" for="<?php echo $pg->post_name; ?>">
				<div class="img" style="background-image: url(<?php echo $img; ?>);"></div>
				<div class="slider-tag animated slideInDown">Services for <span><?php echo $pg_title; ?></span></div>
			</div>
			<?php } ?>
			
		</div>
	</div>
	
	<div class="links">
	<?php foreach ($biz_banner_links as $link) { 
	$pg_id = $link['page_link'];
	$pg_title = $link['link_title'];
	$pg = get_post($pg_id);
	$col = get_field('page_colour', $pg_id);
	$icon = get_field('page_icon', $pg_id);
	$child_args = array(
	'sort_column' => 'menu_order',
	'echo' => 0,
	'child_of'	=> $pg_id,
	'title_li'	=> ''
	); 

	$children = wp_list_pages($child_args);
	//echo '<pre>';print_r($icon);echo '</pre>';
	?>
		<div id="link-<?php echo $pg->post_name; ?>" class="banner-item bc-link-item col-<?php echo $col; ?>">
			<a href="<?php echo get_permalink($pg_id); ?>" title="<?php echo $pg->post_title; ?>" class="top-link" for="item-<?php echo $pg->post_name; ?>">
				<span class="icon"><i class="fa <?php echo $icon; ?> fa-3x"></i></span>
				<span class="title">
					Services for
					<span><?php echo $pg_title; ?></span>
				</span>
				<span class="pointer"><i class="fa fa-arrow-right fa-lg"></i></span>
			</a>
		</div>
	<?php } ?>
	</div>
	
</section>

<?php }  ?>

