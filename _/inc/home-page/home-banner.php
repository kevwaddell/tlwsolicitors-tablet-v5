<?php 
$main_hp_banner_active = get_field('main_hp_banner_active', 'option');	
$banner_links = get_field('main_banner_links', 'option');	
$banner_tag = get_field('main_banner_tag', 'option');	
?>

<?php if ($main_hp_banner_active && !empty($banner_links)) { 
$banner_item_counter = 0;	
$banner_items_total = count($banner_links);
?>

<section id="main-home-banner">
	<?php foreach ($banner_links as $link) { 
	$pg_id = $link['page_link'];
	$pg_title = $link['page_title'];
	$pg = get_post($pg_id);
	$col = get_field('page_colour', $pg_id);
	$icon = get_field('page_icon', $pg_id);
	$img = get_bloginfo('stylesheet_directory')."/_/img/banner-img-" .$pg->post_name. ".png";
	$banner_item_counter++;
	//echo '<pre>';print_r($icon);echo '</pre>';
	?>
		<div class="banner-item col-<?php echo $col; ?><?php echo ($banner_item_counter == $banner_items_total) ? ' last-item':''; ?>">
			<a href="<?php echo get_permalink($pg_id); ?>" title="<?php echo $pg->post_title; ?>">
				<span class="img" style="background-image: url(<?php echo $img; ?>)"><span class="col-overlay"></span><span class="img-overlay"></span></span>
				<span class="icon"><i class="fa <?php echo $icon; ?> fa-2x"></i></span>
				<span class="title"><?php echo $pg_title; ?></span>
			</a>
		</div>
	<?php } ?>
	<?php if ($banner_tag) { ?>
	<div class="banner-tag"><?php echo $banner_tag; ?></div>
	<?php }  ?>
	
</section>

<?php }  ?>

