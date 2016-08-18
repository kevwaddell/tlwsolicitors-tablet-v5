<a id="contact-us-today" name="contact-us-today"></a>	
<section class="contact-panel landing-pg-form">
	
	<header class="panel-header">
		<div class="container-fluid">
			<h3 class="icon-header">Contact us Today <i class="fa fa-life-ring fa-2x"></i></h3>
		</div>
	</header>
	
	<div class="container-fluid">
	
		<div class="row">
		
		<aside class="sidebar single col-xs-4">
		
			<?php if ($location) { ?>
	
				<?php include (STYLESHEETPATH . '/_/inc/landing-page/map-sml.php'); ?>
		
			<?php } ?>
				
			<button class="icon-header dropdown-head" data-toggle="collapse" data-target="#address"><i class="icon fa fa-map-marker fa-lg fleft"></i> Location <i class="fa fa-angle-down fa-lg fright"></i></button>
			<?php if ($address) { ?>
			<div id="address" class="sidebar-block-inner collapse in">
				<?php echo $address; ?>
			</div>
			<?php } ?>
			
			<button class="icon-header dropdown-head" data-toggle="collapse" data-target="#control"><i class="icon fa fa-globe fa-lg fleft"></i> Route finder <i class="fa fa-angle-down fa-lg fright"></i></button>
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
	
			
			<ul class="contact-list list-unstyled">
				
				<?php if (isset($office_tel)) { ?>
				<li><i class="fa fa-phone fa-lg"></i> Office Tel: <?php echo $office_tel; ?></li>
				<?php } ?>
				
				<?php if (isset($fax)) { ?>
				<li><i class="fa fa-print fa-lg"></i> Fax: <?php echo $fax; ?></li>
				<?php } ?>
				
				<?php if (isset($email)) { ?>
				<li><a href="mailto:<?php echo $email; ?>" title="Email TLW"><i class="fa fa-envelope fa-lg"></i> <?php echo $email; ?></a></li>
				<?php } ?>
				
			</ul>
	
		</aside>
					
		<div class="col-xs-8">
			<?php if ($form_active) { 
			$form = get_field('form');	
			?>			
			<div class="contact-form col-bg">
			
			<?php gravity_form($form->id, false, true, false, null, true); ?>
			
			</div>
			<?php }  ?>
		</div>
		
		</div>
	
	</div>

</section>
