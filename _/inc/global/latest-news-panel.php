<?php if ($latest_news_active) { 
$panel_title = get_field('panel_title');
if (empty($panel_title)) {
$panel_title = "Latest News";	
}
$cats = get_field('news_cat');
$number_of_posts = get_field('number_of_posts');
$latest_news_args = array(
'posts_per_page'   => $number_of_posts,	
'category__in'	=> 	$cats
);
$latest_news = get_posts($latest_news_args);
//echo '<pre>';print_r($latest_news);echo '</pre>';
?>
<section class="latest-news">
	<h3 class="icon-header red"><?php echo $panel_title; ?> <i class="fa fa-newspaper-o fa-lg"></i></h3>
	
	<div class="ln-articles<?php echo ($number_of_posts > 1) ? ' multiple':' single'; ?>">
		<?php if ($number_of_posts > 1) { ?>
		<div class="row">
		<?php } ?>
		
			<?php foreach ($latest_news as $article) { ?>
			
			<?php if ($number_of_posts > 1) { ?>
			<div class="col-xs-<?php echo ($number_of_posts == 2) ? '6':'4'; ?>">
			<?php } ?>
			<article class="ln-article">
			
			<a href="<?php echo get_permalink($article->ID); ?>">
				<?php if ($number_of_posts == 2) { ?>
				<span class="img"><?php add_wide_feat_img ($article); ?></span>
				<?php } else { ?>
				<span class="img"><?php add_feat_img ($article); ?></span>
				<?php } ?>
				
				<span class="title"><?php echo get_the_title($article->ID); ?></span>
			</a>
			
			</article>
			<?php if ($number_of_posts > 1) { ?>
			</div>
			<?php } ?>
			
			<?php } ?>
		
		<?php if ($number_of_posts > 1) { ?>
		</div>
		<?php } ?>
	</div>
	
	<?php if (count($cats) == 1) { ?>
	<a href="" title="" class="btn btn-default btn-block icon-btn">View More</a>
	<?php } ?>
	
</section>
<?php } ?>
