<?php
global $form_active; 
global $form;
global $number_pos;
global $color;
global $freephone_num;
?>

<aside class="sidebar lp-sidebar">
	<?php if ($form_active) : ?>
	<div class="lp-form lp-form-<?php echo (!empty($color)) ? $color : 'red'; ?>">

 	<h3>Make your claim today <i class="fa fa-arrow-circle-down fa-lg"></i></h3>

 	<?php gravity_form($form->id, false, true, false, null, true); ?>
	
	</div>	
<?php endif; ?>
	<?php if ($number_pos == 'sidebar') { ?>
	<p class="tel-num tel-num-<?php echo (!empty($color)) ? $color : 'red'; ?>">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
<?php } ?>
</aside>
