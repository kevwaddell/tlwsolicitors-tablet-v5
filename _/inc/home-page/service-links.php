<h2 class="text-center">Which service do you require?</h2>
		
<?php foreach ($services as $service) { 
$icon = get_field('page_icon', $service->ID);
$color = get_field('page_colour', $service->ID);
$title_split = explode(" ", $service->post_title);
$title = implode("<br> ", $title_split);
if (count($title_split) == 3) {
$title = str_replace("<br>","" , $title);
}
?>
<a href="<?php echo get_permalink($service->ID); ?>" title="<?php echo $service->post_title; ?>" class="service-link <?php echo $color; ?>">
	<i class="fa <?php echo $icon; ?> fa-2x icon"></i>
	<?php echo $title; ?>
	<i class="fa fa-angle-right"></i>
</a>
<?php } ?>