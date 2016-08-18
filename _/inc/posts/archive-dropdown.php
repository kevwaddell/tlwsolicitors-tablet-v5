<?php 
$archives_args = array(
	'type'          => 'monthly',
	'limit'         => '12',
	'format'        => 'option',
	'echo'			=> 0
);
	
$archives = wp_get_archives($archives_args);

//echo '<pre>';print_r($archives);echo '</pre>';
?>
<?php if ($archives) { ?>
<div class="cats-dropdown">
	
	<select id="archive-dd" class="selectpicker" data-width="100%">
		<option value="0" data-hidden="true">Blog Archives</option>
		<?php echo $archives; ?>
	</select>
	
</div>
<script type="text/javascript">
	<!--
	var dropdown = document.getElementById("archive-dd");
	function onArchiveChange() {
		if ( dropdown.options[dropdown.selectedIndex].value != 0 ) {
			location.href = dropdown.options[dropdown.selectedIndex].value;
		}
	}
	dropdown.onchange = onArchiveChange;
	-->
</script>
<?php } ?>
