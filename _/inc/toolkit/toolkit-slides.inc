<?php 
$slides_choice = get_field('tk_slides').'_tk_slides';
$slides = get_field($slides_choice, 'option');
$slides_total = count($slides);
$slides_counter = 0;
$section_title = "Toolkit";	
//echo '<pre class="debug">';print_r($slides);echo '</pre>';
?>

<section class="toolkit-txt-section">
<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.inc'); ?>	
	<?php foreach ($slides as $k => $txt) { ?>
	
	<article class="tk-txt tk-txt-<?php echo $txt['slide_color']; ?>">
		<h2 class="banner-header text-center bg-col-<?php echo $txt['slide_color']; ?>-dk caps font-slab-serif">
			<i class="tk-icon" style="background-image: url(<?php echo $txt['slide_icon']; ?>)"></i>
			<?php echo $txt['slide_title']; ?>
		</h2>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="tk-img">
						<figure class="tk-slide-img" style="background-image: url(<?php echo $txt['slide_img']; ?>)"></figure>
						<div class="overlay"></div>
					</div>
					<div class="txt">
					<?php echo $txt['slide_text']; ?>
					</div>
				</div>
			</div>
		</div>
	</article>

	<?php } ?>
</section>

