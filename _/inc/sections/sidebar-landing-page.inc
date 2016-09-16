<?php
global $form_active;
global $all_forms_active;
global $color;
$sb_plug_text_active = get_field('sb_plug_text_active');
$sb_plug_txt = get_field('sb_plug_txt');
?>
<div class="row">
<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
	<aside class="scroll-sidebar sidebar lp-sidebar">
		
		<?php if ($sb_plug_text_active) { 
		$sb_plug_txt = get_field('sb_plug_txt');	
		?>
		<div class="sb-plug text-center font-slab-serif bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>-dk">
			<?php echo $sb_plug_txt; ?>
		</div>
		<?php } ?>
		
		<?php if ($form_active && $all_forms_active) { ?>
		<div class="sb-plug-btn">
			<div class="plug-label">Fill in our simple form</div>
			<button type="button" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#contact-form-modal"><i class="fa fa-check-square fa-lg"></i> Claim Today</button>
		</div>
		<?php } ?>
		
	</aside>
</div>
</div>
