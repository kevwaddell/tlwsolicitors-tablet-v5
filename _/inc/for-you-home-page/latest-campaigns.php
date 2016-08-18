<?php if ($campaigns_active) { 
$campaigns = get_field('campaigns', 'options');	
$radio_ads_active = get_field('radio_adverts_active', 'option');
$radio_ads_title = get_field('radio_adverts_title', 'option');	
$radio_ads = get_field('radio_adverts', 'option');	
$radio_stations = get_field('radio_stations', 'option');
$campaigns_total = count($campaigns);
$cols = 12/$campaigns_total;
//echo '<pre>';print_r(($cols%2));echo '</pre>';
?>
<!-- OUR LATEST CAMPAIGNS -->
<section id="hp-campaigns">
	
	<h3 class="text-center"><i class="fa fa-comment"></i> Our Latest Campaigns</h3>
	
	<div class="hp-campaign-links">
		<select name="latest-campaigns" id="latest-campaigns" data-width="100%" class="selectpicker btn-block text-center">
			<option data-hidden="true">Please select a Campaign</option>
			<?php foreach ($campaigns as $campaign) { ?>
			<option value="<?php echo get_permalink($campaign); ?>"><?php echo get_the_title($campaign); ?></option>
			<?php } ?>
		</select>
		<script type="text/javascript">
		<!--
		var dropdown = document.getElementById("latest-campaigns");
		function onCampChange() {
			if ( dropdown.options[dropdown.selectedIndex].value != 0 ) {
				location.href = dropdown.options[dropdown.selectedIndex].value;
			}
		}
		dropdown.onchange = onCampChange;
		-->
		</script>
	</div>
	
</section>
<?php } ?>
