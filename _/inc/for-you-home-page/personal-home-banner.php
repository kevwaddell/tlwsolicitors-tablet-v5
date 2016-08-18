<?php 
$hp_banner_active = get_field('hp_banner_active', 'option');	
$banner_links = get_field('banner_links', 'option');	
?>

<?php if ($hp_banner_active && !empty($banner_links)) { ?>

<section id="home-banner">
	<?php foreach ($banner_links as $link) { 
	$pg_id = $link['page_link'];
	$pg_title = $link['link_title'];
	$pg = get_post($pg_id);
	$col = get_field('page_colour', $pg_id);
	$icon = get_field('page_icon', $pg_id);
	$img = get_bloginfo('stylesheet_directory')."/_/img/banner-img-" .$pg->post_name. ".png";
	//echo '<pre>';print_r($icon);echo '</pre>';
	?>
		<div class="banner-item col-<?php echo $col; ?>">
			<a href="<?php echo get_permalink($pg_id); ?>" title="<?php echo $pg->post_title; ?>">
				<span class="img" style="background-image: url(<?php echo $img; ?>)"><span class="col-overlay"></span><span class="img-overlay"></span></span>
				<span class="icon"><i class="fa <?php echo $icon; ?> fa-2x"></i></span>
				<span class="title"><?php echo $pg_title; ?></span>
			</a>
		</div>
	<?php } ?>
</section>

<?php }  ?>

