<?php if ($download_active) { 
$extra_txt = get_field('download_extra_txt');	
$btn_title = get_field('btn_title');
$file_type = get_field('file_type');
$dwnload_hide = get_field('dwnload_hide');

if ($file_type === "file") {
$file = get_field('download_file');		
}

if ($file_type === "img") {
$img_data = get_field('download_img');		
$img = $img_data['sizes']['full'];
}
?>

<?php if (!empty($extra_txt)) { ?>
<div class="main-text">
	<?php echo $extra_txt; ?>
</div>
<?php } ?>

<?php if ($dwnload_hide == 'yes') { ?>
<button id="file-download-btn" class="btn btn-default btn-block icon-btn icon-btn-lg btn-col-<?php echo (!empty($color)) ? $color : 'red'; ?>"><?php echo $btn_title; ?><i class="fa fa-arrow-circle-down fa-lg"></i></button>
<section id="booklet-download" class="form-closed">
	<div class="form-wrap">
		<div class="contact-form">
			<?php gravity_form(20, false, false, false, false, true); ?>
			<div id="hidden-download" class="hidden">
				
				<?php if ($file_type === "file") { ?>
				<a href="<?php echo $file; ?>" id="download-file-btn" class="icon-btn btn btn-default btn-block big-btn caps download-btn">Your download is ready</a>
				<?php } ?>
				
				<?php if ($file_type === "img") { ?>
				<img src="<?php echo $img; ?>" class="img-responsive">
				<?php } ?>
				
			</div>

		</div>
	</div>
</section>
<?php } ?>

<?php if ($dwnload_hide == 'no') { ?>
<?php if ($file_type === "file") { ?>
<a href="<?php echo $file; ?>" class="btn btn-default btn-block icon-btn-lg download-btn btn-col-<?php echo (!empty($color)) ? $color : 'red'; ?>"><?php echo $btn_title; ?><i class="fa fa-arrow-circle-down fa-lg"></i></a>
<?php } ?>
<?php if ($file_type === "img") { ?>
<a href="<?php echo $img; ?>" class="btn btn-default btn-block icon-btn-lg download-btn btn-col-<?php echo (!empty($color)) ? $color : 'red'; ?>"><?php echo $btn_title; ?></a>
<?php } ?>
<?php } ?>

<?php } ?>