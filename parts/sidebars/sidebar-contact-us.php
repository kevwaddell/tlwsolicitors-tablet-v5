<?php 
	$map_url = "https://www.google.co.uk/maps/place/TLW+Solicitors/";
	$address = get_field('global_address', 'options');
	$office_tel = get_field('office_num', 'options');
	$fax = get_field('main_fax', 'options');
	$email = get_field('main_email', 'options');
	//echo '<pre>';print_r($_GET);echo '</pre>';
 ?>	
<aside class="sidebar sb-contact col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
	<div class="row">
		<div class="col-xs-6 col-md-12">
			
			<?php if ($address) { ?>	
			<button class="icon-header dropdown-head" data-toggle="collapse" data-target="#address"><i class="fa fa-map-marker fa-lg fleft"></i> Location <i class="fa fa-angle-down fa-lg fright"></i></button>
			<div id="address" class="sidebar-block-inner collapse">
				<?php echo $address; ?>
				<a href="<?php echo $map_url; ?>" class="btn btn-default btn-block" target="_blank">View map</a>
			</div>
			<?php } ?>
			
			<button class="icon-header dropdown-head" data-toggle="collapse" data-target="#control"><i class="fa fa-globe fa-lg fleft"></i> Route finder <i class="fa fa-angle-down fa-lg fright"></i></button>
			<div id="control" class="sidebar-block-inner collapse">
					
				<!-- <form action="http://maps.google.com/maps/" method="get" target="_blank"> -->
				<form action="http://maps.google.com/maps" method="get" target="_blank" class="route-finder">
					<div class="form-group">
						<label for="saddr">Enter Your Post code:</label>
						<input type="hidden" name="daddr" value="NE29 7ST">
						<input type="text" class="form-control" name="saddr" maxlength="9" id="start">
					</div>
					<p class="submit"><input type="submit" class="btn btn-default btn-block" value="Get directions"></p>
					
				</form>
				
			</div>

		</div>
		<div class="col-xs-6 col-md-12">	
			<ul class="contact-list list-unstyled">
				
				<?php if (isset($office_tel)) { ?>
				<li><i class="fa fa-phone fa-lg"></i> Office Tel: <?php echo $office_tel; ?></li>
				<?php } ?>
				
				<?php if (isset($fax)) { ?>
				<li><i class="fa fa-print fa-lg"></i> Fax: <?php echo $fax; ?></li>
				<?php } ?>
				
				<?php if (isset($email)) { ?>
				<li><a href="mailto:<?php echo $email; ?>" onclick="ga('send', 'event', 'Email', 'click to email', 'contact page');" title="Email TLW"><i class="fa fa-envelope fa-lg"></i> <?php echo $email; ?></a></li>
				<?php } ?>
				
			</ul>
		</div>
	</div>
</aside>
