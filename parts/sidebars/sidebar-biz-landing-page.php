<?php
global $page_icon;
global $page_links;
global $color;
global $feedback_active;
global $how_it_works_active;
global $freephone_num;

if ($post->post_parent == 0) {
$post_ID = $post->ID;
} else {
$post_ID = $post->post_parent;	
}	

if ($feedback_active) {
	$feedback_id = get_field('client_feedback');
} else {
	$feedback_args = array(
	'posts_per_page'   => 1,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
	'meta_key'	=> 'area',
	'meta_value'	=> 'business'
	); 
	$feedback_quote = get_posts($feedback_args); 	
	
	$feedback_id = $feedback_quote[0]->ID;
}

$quote_txt = get_field('quote', $feedback_id);
$client_name = get_field('client_name', $feedback_id);
$location = get_field('location', $feedback_id);
$company = get_field('company', $feedback_id);

$child_args = array(
'sort_column' => 'menu_order',
'parent'	=> $post_ID
); 

$children = get_pages($child_args);
?>
<aside class="sidebar col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
	
	<?php if ($feedback_id) { ?>
	<div class="sb-quote">
		<blockquote><?php echo $quote_txt; ?></blockquote>
		<p class="text-center quote-name"><?php echo $client_name; ?><?php echo($company) ? '<br>'.$company:''; ?> - <?php echo $location; ?></p>
	</div>
	<?php } ?>
		
	<p class="tel-num tel-num-<?php echo (!empty($color)) ? $color : 'red'; ?> hidden-sm">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
	
	<?php if ($how_it_works_active) { ?>	
	<div class="how-it-works-link">
		<a href="#how-it-works" class="hiw-link">
			<span class="txt-mid">The Claims Process</span>
			<span class="txt-lg">How it Works</span>
			<span class="txt-sml">Click here for more information</span>
		</a>
	</div>
	<?php } ?>
	
	<?php if (!empty($children)) { ?>
	<div class="menu-collapse closed">
	<a name="sb-menu-collapse" id="sb-menu-collapse"></a>
	<button class="sb-menu-btn btn btn-default btn-block">Services Menu</button>
		<ul class="list-unstyled menu-links">
			
			<?php foreach ($children as $child) { 
			$g_child_args = array(
			'sort_column' => 'menu_order',
			'parent'	=> $child->ID
			); 

			$g_children = get_pages($g_child_args);
			?>
			<li class="page_item page-item-<?php echo $child->ID; ?><?php echo ($post->ID == $child->ID) ? ' current_page_item':''; ?><?php echo (!empty($g_children)) ? ' page_item_has_children hide-children':''; ?>">
				<a href="<?php echo get_permalink($child->ID); ?>"><?php echo get_the_title($child->ID); ?></a>
				
				<?php if (!empty($g_children)) { ?>
					<ul class="children">
						<li class="page_item page-item-<?php echo $child->ID; ?>"><a href="<?php echo get_permalink($child->ID); ?>">Overview</a></li>
						<?php foreach ($g_children as $g_child) { ?>
						<li class="page_item page-item-<?php echo $g_child->ID; ?>"><a href="<?php echo get_permalink($g_child->ID); ?>"><?php echo get_the_title($g_child->ID); ?></a></li>
						<?php } ?>
					</ul>
				<?php } ?>
			</li>
			<?php } ?>	
			
		
		</ul>
	
	</div>
	<?php } ?>	
		
</aside>