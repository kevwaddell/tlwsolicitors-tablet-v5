<div class="banner-img banner-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">

	<figure class="banner-img-wide" style="background-image: url(<?php add_banner_feat_img($post);?>)">
		<div class="col-overlay"></div><div class="striped-overlay"></div>
	</figure>	

<?php if ($main_title) { ?>
	<div class="lp-title">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					<?php if ($page_icon) { ?>
					<span class="pg-icon"><i class="fa <?php echo $page_icon; ?> fa-2x"></i></span>
					<?php } ?>
					<h1><?php echo $main_title; ?></h1>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	
	<div class="banner-form hidden-sm">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-md-offset-8">
					<?php if ($form_active) : 
					$form = get_field('form');	
					?>
					<a name="banner-form" id="banner-form"></a>
					<div class="contact-form">
						<h3 class="icon-header">Request a callback <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
						
						<?php gravity_form($form->id, false, true, false, $form_array, true); ?>
									
					</div>	
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	
</div>
