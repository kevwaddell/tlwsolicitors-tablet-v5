<?php if ($bk_download_active) { 
global $color;
$bk_btn_title = get_field('bk_btn_title');
$booklet_file = get_field('booklet_file');	
$booklet_txt = get_field('bk_extra_txt');	

if (empty($bk_btn_title)) {
$bk_btn_title = "Download booklet";
}
?>

<?php if (!empty($booklet_txt)) { ?>
<div class="main-text">
	<?php echo $booklet_txt; ?>
</div>
<?php } ?>

<button id="file-download-btn" class="btn btn-default btn-block icon-btn icon-btn-lg btn-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">Download our guide to services booklet<i class="fa fa-arrow-circle-down fa-lg"></i></button>
<section id="booklet-download" class="form-closed">
	<div class="form-wrap">
		<div class="contact-form">
			<?php gravity_form(19, false, true, false, false, true); ?>
			<a href="<?php echo $booklet_file; ?>" id="download-booklet-btn" class="icon-btn btn btn-default btn-block big-btn caps download-btn hidden"><?php echo $bk_btn_title; ?></a>
		</div>
	</div>
</section>
<?php } ?>