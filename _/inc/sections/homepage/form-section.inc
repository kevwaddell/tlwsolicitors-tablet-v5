<?php
$all_forms_active = get_field('all_forms_active', 'option');
$form_active = $section['form_active'];
?>
<?php if ($form_active && $all_forms_active) {

$form = $section['form'];	
$section_title = $section['section_title'];	

if (empty($section_title)) {
$section_title = $form->title;
}

?>

<section id="<?php echo $section['acf_fc_layout']; ?>" class="pg-section with-header">
<a name="request-a-callback" id="request-a-callback" class="section-target"></a>
	<div class="container-fluid">
		<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php gravity_form($form->id, false, true, false, '', false); ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>