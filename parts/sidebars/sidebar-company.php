<?php
global $page_icon;

if ($post->post_parent == 0) {
$post_ID = $post->ID;
} else {
$post_ID = $post->post_parent;	
}	

$form_active = get_field('form_activated');

$feedback_args = array(
	'posts_per_page'   => 1,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
); 
$feedback_quote = get_posts($feedback_args); 

$child_args = array(
'sort_column' => 'menu_order',
'echo' => 0,
'child_of'	=> $post_ID,
'title_li'	=> ''
); 
$children = wp_list_pages($child_args);	

$custom_sat_active = get_field('custom_sat_active', 'option');
$custom_sat_active_pgs = get_field('active_pages', 'option');
//echo '<pre>';print_r($custom_sat_active_pgs);echo '</pre>';
?>

<aside class="sidebar col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
		
	<?php if ($form_active) : 
	$form = get_field('form');	
	?>
	<div class="contact-form sb-form form-closed hidden-sm">
		<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	
		<h3 class="icon-header">Make a claim enquiry <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
		
		<?php gravity_form($form->id, false, true, false, null, true); ?>
					
	</div>	
	
	<?php endif; ?>
	
	<?php if (!empty($feedback_quote)) { ?>
	<div class="sb-quote">
		<?php foreach ($feedback_quote as $quote) { 
		$quote_txt = get_field('quote', $quote->ID);	
		$client_name = get_field('client_name', $quote->ID);
		$location = get_field('location', $quote->ID);		
		?>
		<blockquote><?php echo $quote_txt; ?></blockquote>
		<p class="text-center"><?php echo $client_name; ?>, <?php echo $location; ?></p>
		<?php } ?>
	</div>
	<?php } ?>
	
	<?php if (!empty($children)) { ?>
	<div class="menu-collapse closed">
	<a name="sb-menu-collapse" id="sb-menu-collapse"></a>
	<button class="sb-menu-btn btn btn-default btn-block">About TLW menu</button>
		<ul class="list-unstyled menu-links">
			
			<li<?php echo ($post->post_parent == 0) ? ' class="current_page_item"':''; ?>><a href="<?php echo get_permalink($post_ID); ?>"><?php echo get_the_title($post_ID); ?></a></li>
			
			<?php echo $children; ?>	
		
		</ul>
	
	</div>
	<?php } ?>
		
	<?php if ($custom_sat_active && in_array($post->ID, $custom_sat_active_pgs)) {
	$custom_sat_year = get_field('custom_sat_year', 'option');	
	$custom_sat_download = get_field('custom_sat_download', 'option');		
	?>
	<div class="striped-box hidden-sm">
		<div class="customer-sat-header">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/_/css/img/customer-satisfaction-header.png" alt="Customer satisfaction Client Care Feedback">
		</div>
		<div class="customer-sat-year">
			<?php echo $custom_sat_year; ?>
		</div>
		<a href="<?php echo $custom_sat_download; ?>" class="btn btn-default btn-block" target="_blank" title="View report"><i class="fa fa-pie-chart fa-lg"></i>View report</a>
	</div>
	<?php } ?>
	
</aside>