<?php include (STYLESHEETPATH . '/_/inc/landing-page/head-html.inc'); ?>	

<body id="landing-page" <?php body_class('loading atfc-tablet-css'); ?>>
<?php if ($_SERVER['SERVER_NAME']=='tlwsolicitors.staging.wpengine.com') { ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PDNR9J"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php } ?>
<?php if ($_SERVER['SERVER_NAME']=='www.tlwsolicitors.co.uk') { ?>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PLBR4F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager -->
<?php } ?>

<?php 
$color = get_field('page_colour', $post->ID);
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$bg_img = wp_get_attachment_image_src($post_thumbnail_id, 'full' );
$bg_img_url = $bg_img[0];
$tag_line = get_field('tag_line', 'options');
?>
	
<div class="tlw-wrapper">
	<div class="lp-bg-img" style="background-image: url(<?php echo $bg_img_url; ?>)"></div>
	<div class="col-overlay"></div>
	<div class="striped-overlay"></div>
	
	<!-- HEADER LOGO AND NAVIGATION -->
	<header class="header abs-header" role="banner">

		<div class="header-inner">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
					<div class="col-xs-6">
						<p class="text-hide logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
					</div>
					<div class="col-xs-6">
					<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
					</div>
				</div>
					</div>
				</div>
			</div>
		</div>
				
	</header>