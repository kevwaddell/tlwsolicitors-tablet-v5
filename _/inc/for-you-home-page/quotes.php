<?php  
$feedback_qts = get_field('hp_testimonials', 'options');	
//echo '<pre>';print_r($feedback_qts);echo '</pre>';	
?>

<!-- CUSTOMER FEEDBACK -->
<div id="feedback-section">
	
	<div id="feedback-carousel" class="carousel slide">
			
		<div class="carousel-inner">
		
		<?php foreach ($feedback_qts as $quote) { 
		$feedback_counter++;
		$quote_id = $quote['hp_feedback'];
		$quote_txt = get_field('quote', $quote_id);	
		$client_name = get_field('client_name', $quote_id);		
		$location = get_field('location', $quote_id);	
		$gender = get_field('gender', $quote_id);
		$col = $quote['hp_feedback_col'];
		?>
			<div class="item bg-<?php echo $col; ?><?php echo ($feedback_counter == 1) ? " active":""; ?>">
				
				<div class="quote">
				<blockquote class="text-center"><?php echo $quote_txt; ?></blockquote>
				
				<p class="text-center"><?php echo $client_name; ?>, <?php echo $location; ?></p>
				</div>

			</div>
		<?php } ?>
	
		</div>
		
	</div>

</div>