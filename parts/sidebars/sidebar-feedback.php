<?php
if ($post->post_parent == 0) {
$post_ID = $post->ID;
} else {
$post_ID = $post->post_parent;	
}	

$child_args = array(
'sort_column' => 'menu_order',
'echo' => 0,
'child_of'	=> $post_ID,
'title_li'	=> ''
); 
$children = wp_list_pages($child_args);	
?>

<aside class="sidebar">

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
	
</aside>