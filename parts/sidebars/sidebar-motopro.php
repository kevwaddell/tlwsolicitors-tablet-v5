<?php 
$mp_tel = get_field('mp_tel');
$mp_web = get_field('mp_website');
$mp_email = get_field('mp_email'); 
?>

<aside class="sidebar col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
	<div class="mp-info">
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3 col-md-12 col-md-offset-0">
				<div class="logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/_/css/img/motopro-logo.png" alt="MotoPro - Motoring Law Experts"></div>
			</div>
			<div class="col-xs-12">
				<div class="mp-ff-tel">
					<span>Freephone:</span>
					<?php echo $mp_tel; ?>	
				</div>
			</div>
		</div>
		<div class="mp-links row">
			<div class="col-xs-6 col-md-12">
				<a href="http://<?php echo $mp_web; ?>" title="Visit MotoPro Website" class="icon-btn">
				<i class="fa fa-info-circle fa-lg icon"></i>
				<?php echo $mp_web; ?>
				</a>
			</div>
			<div class="col-xs-6 col-md-12">
				<a href="mailto:<?php echo $mp_email; ?>" title="Email MotoPro" class="icon-btn">
				<i class="fa fa-envelope fa-lg icon"></i>
				<?php echo $mp_email; ?>
				</a>
			</div>
		</div>
	</div>
</aside>