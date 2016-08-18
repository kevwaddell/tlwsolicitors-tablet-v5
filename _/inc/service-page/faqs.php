<?php
$faqs_active = get_field('faqs_active');	

if ($faqs_active) { ?>

<?php 
$faqs_id = get_field('faqs');
$faq_post = get_post($faqs_id);
$faq_qestions = get_field('faq_qestions',$faq_post->ID);
$faqs_total = count($faq_qestions);
$faqs_counter = 0;
//echo '<pre>';print_r($faq_qestions);echo '</pre>';
?>
<section id="faqs" class="col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
	<h3 class="icon-header">FAQ's <i class="fa fa-comments fa-lg"></i></h3>
	
	<?php foreach ($faq_qestions as $q) { 
	$faqs_counter++;
	?>
	<div class="faq-item item-closed<?php echo ($faqs_counter === $faqs_total) ? " last-item" : ''; ?>">
		<div class="faq-question"><?php echo $q['faq_question']; ?></div>
		<div class="faq-answer">
			<?php echo $q['faq_answer']; ?>
		</div>
	</div>
	<?php } ?>
	
</section>
	
<?php } ?>