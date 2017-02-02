<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" prefix="og: http://ogp.me/ns#">
<head id="www-tlwsolicitors-co-uk" data-template-set="tlw-solicitors-theme">
	
	<?php if ($_SERVER['SERVER_NAME']=='tlwsolicitors.staging.wpengine.com') { ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PDNR9J');</script>
	<!-- End Google Tag Manager -->
	<?php } ?>
	<?php if ($_SERVER['SERVER_NAME']=='www.tlwsolicitors.co.uk') { ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PLBR4F');</script>
	<!-- End Google Tag Manager -->
	<?php } ?>
	
	<meta charset="<?php bloginfo('charset'); ?>">

	<meta name="viewport" content="user-scalable=no,initial-scale=1,minimum-scale=1,maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=yes">
		   
	<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/_/img/touch-icon-iphone.png" /> 
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/_/img/touch-icon-ipad.png" /> 
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/_/img/touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/_/img/touch-icon-ipad-retina.png" />
	<link rel="apple-touch-startup-image" href="<?php bloginfo('template_directory'); ?>/_/img/apple-start-up-img.png" />
	
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/_/img/favicon.ico">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<style><?php readfile(get_stylesheet_directory() . '/_/css/criticalCSS.css'); ?></style>
	
	<?php
	$sections_active = get_field('sections_active'); 
	$all_forms_active = get_field('all_forms_active', 'option');
	$form_active = get_field('add_form');	
	
	if ($sections_active && $all_forms_active) {
	$sections = get_field('sections'); 
		foreach ($sections as $section) {
			if ($section['acf_fc_layout'] == 'form-section') {
			
			$form_active = $section['form_activated'];
			$form = $section['form'];
				if ($form_active) {
				gravity_form_enqueue_scripts( $form->id );	
				}		
			}
		}
	}
	
	if ($form_active && $all_forms_active) {
		$form = get_field('form');
		gravity_form_enqueue_scripts( $form->id );		
	}
	
	if (is_front_page() && $all_forms_active) {
	$hp_sections = get_field('hp_sections', 'option');
		foreach ($hp_sections as $section) {
			if ($section['acf_fc_layout'] == 'form-section') {
			
			$form_active = $section['form_active'];
			$form = $section['form'];
				if ($form_active) {
				gravity_form_enqueue_scripts( $form->id );	
				}		
			}
		}
	}
	?>
	
	<?php wp_head(); ?>
	
	<script>
      var loadDeferredStyles = function() {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
		document.body.appendChild(replacement);
        addStylesNode.parentElement.removeChild(addStylesNode);
       document.body.classList.remove("atfc-tablet-css");
      };
      var raf = requestAnimationFrame || mozRequestAnimationFrame || webkitRequestAnimationFrame || msRequestAnimationFrame;
      if (raf) { 
	      raf(function() { window.setTimeout(loadDeferredStyles, 0);});
     } else { window.addEventListener('load', loadDeferredStyles); }
	</script>
	
	<!-- Adwords Call tracking -->
	<script type="text/javascript">
	(function(a,e,c,f,g,h,b,d){var k={ak:"966769174",cl:"lASLCOjY32sQlvT-zAM",autoreplace:"08001695925"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[g]|| (a[g]=k.ak);b=e.createElement(h);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(h)[0];d.parentNode.insertBefore(b,d);a[f]=function(b,d,e){a[c](2,b,k,d,null,new Date,e)};a[f]()})(window,document,"_googWcmImpl","_googWcmGet","_googWcmAk","script");
	</script>
	<!-- Adwords Call tracking -->
	
	<?php 
	if ( isset($_GET['src']) && $_GET['src'] == "mis-sold-solar-co-uk" ) {
	setcookie("src",$_GET['src'] , strtotime( '+6 months' ), "/financial-mis-selling/solar-panel-mis-selling" );
	}
	?>
</head>