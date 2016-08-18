<?php 
$exclude = array();
$sticky = get_option( 'sticky_posts' );
$posts_per_page = (count($sticky) > 5) ? 5:count($sticky); 
$ts_args = array(
'posts_per_page' => 5,
'order'	=> 'DESC',
'paged'	=> 0
);

if (!empty($sticky)) {
$exclude = $sticky;
$ts_args['post__in'] = $sticky;
}

$ts_query = new WP_Query( $ts_args );
$ts_post_counter = 0;
$ts_post_total = $ts_query->post_count; 

if (empty($sticky)) {
	
	foreach ($posts as $p) {
	//echo '<pre>';print_r($p->ID);echo '</pre>';
	array_push($exclude, $p->ID);
	}
//$exclude = $sticky;
}

//echo '<pre>';print_r($ts_post_total);echo '</pre>';
?>
<? if ( $ts_query->have_posts() ): ?>
<section id="top-stories" class="top-posts-list">
	<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>
	
	<?php if ($ts_post_total > 1) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/posts/top-stories-carousel.php'); ?>
	<?php } else { ?>
		<?php include (STYLESHEETPATH . '/_/inc/posts/top-stories-single.php'); ?>
	<?php } ?>

	<div class="top-posts-footer"><span>Top Stories</span></div>		
</section>

<?php else: ?>
<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>
<?php endif; ?>


<?php wp_reset_query(); ?>