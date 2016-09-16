<?php  
$banner_bg_img = get_field('hp_banner_bg_img', 'option');
$banner_tags = get_field('hp_banner_tags', 'option');
$hp_banner_quick_links = get_field('hp_banner_quick_links', 'option');	
$hp_other_service_links = get_field('hp_other_service_links', 'option');
$extra_links_cols = 4;
?>
<section id="top-banner" class="top-banner-img fixed-bg no-title" style="background-image: url(<?php echo $banner_bg_img;?>)">
	
	<div class="tag-scroller">
		<?php if (!empty($banner_tags)) { ?>
		<?php foreach ($banner_tags as $k => $tag) { ?>
		<div class="tag-scroller-txt<?php echo ($k == 0) ? ' active':'' ; ?>"><?php echo $tag['banner_tag']; ?></div>
		<?php } ?>
		<?php } ?>
	</div>	
	
	<?php if ($hp_banner_quick_links) { ?>
	<nav class ="hp-banner-links text-center">
	
				<?php foreach ($hp_banner_quick_links as $bl) { 
				$page = get_page($bl['link_page']);
				$icon = get_field( 'page_icon', $bl['link_page']);	
				$color = get_field( 'page_colour', $bl['link_page']);
				$title = $page->post_title;
				$count_sp = substr_count($title, " ");
					
					if ($count_sp === 1) {
					$title = str_replace(" ", "<br />", $page->post_title);
					}
				?>
				<a href="<?php echo get_permalink($bl['link_page']); ?>" class="services-nav-link col-<?php echo $color; ?>"><i class="fa <?php echo $icon; ?> fa-lg"></i> <?php echo $title; ?></a>
				<?php } ?>
				
				<?php if (!empty($hp_other_service_links)) { ?>
					
					<?php foreach ($hp_other_service_links as $sl) { 
					$page = get_page($sl['page']);
					$icon = get_field( 'page_icon', $sl['page']);	
					$color = get_field( 'page_colour', $sl['page']);	
					$title = $page->post_title;
					$count_sp = substr_count($title, " ");
					
					if ($count_sp === 1) {
					$title = str_replace(" ", "<br />", $page->post_title);
					}
					?>
					<a href="<?php echo get_permalink($sl['page']); ?>" class="services-extra-nav-link col-<?php echo $color; ?>"><i class="fa <?php echo $icon; ?> fa-lg"></i><?php echo $title; ?></a>
					<?php } ?>
						
		<?php } ?>
	
	</nav>

	<?php } ?>
	
	<div class="img-overlay"></div>
	<div class="top-drk-grad"></div>
</section>