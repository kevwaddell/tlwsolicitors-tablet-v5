<?php
$videos_active = $section['videos_active'];
?>
<?php if ($videos_active) { ?>

<?php 
$section_title = $section['section_title'];	
$videos = $section['videos'];

if (empty($color)) {
$color = "red";	
}
?>
<section id="<?php echo $section['acf_fc_layout']; ?>" class="pg-section with-icon-logo bg-col-<?php echo $color; ?>">
	<div class="overlay"></div>
	<div class="container">
		<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
	</div>		
	<div class="container">
		<div class="row">		
			<?php foreach ($videos as $video) { ?>
			<div class="col-xs-<?php echo (count($videos) > 1) ? '6':'6 col-xs-offset-3'; ?>">
				<div class="video-wrap">
					<?php echo str_replace(' width="800" height="450"','', $video['video']); ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
		
</section>
<?php } ?>