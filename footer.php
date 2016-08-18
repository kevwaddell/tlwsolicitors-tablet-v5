	
		<!-- FOOTER START -->
		<section id="footer-info">
		
			<footer class="container-fluid">
					
				<?php wp_nav_menu(array( 'container_class' => 'social-links clearfix', 'theme_location' => 'social_links_menu', 'fallback_cb' => false ) ); ?>
				
				<?php 
				$lexcel_active = get_field('lexcel_active', 'options');	
				
				if ($lexcel_active) { 
				$lexcel_logo = get_field('lexcel_logo', 'options');	
				$lexcel_url = get_field('lexcel_url', 'options');
				?>
				<div class="lexcel-logo" style="background-image: url(<?php echo $lexcel_logo; ?>);">
					<a href="<?php echo $lexcel_url; ?>" target="_blank" rel="nofollow" title="Lexcel - Law Society Accredited">
					Lexcel - Practice management Standard - Law Society Accredited	
					</a>
				</div>
				<?php } ?>
				
				<?php 
				$hw_box_active = get_field('hw_box_active', 'options');	
				
				if ($hw_box_active) { 
				$hw_logo = get_field('hw_logo', 'options');	
				$hw_link = get_field('hw_link', 'options');
				?>
				<div class="headway-logo" style="background-image: url(<?php echo $hw_logo[url]; ?>);">
					<a href="<?php echo $hw_link; ?>" target="_blank" rel="nofollow" title="Headway The Brain Injury Association">
					Headway The Brain Injury Association	
					</a>
				</div>
				<?php } ?>
				
				<div class="compliance-notice">
					<?php $compliance_notice = get_field('compliance_notice', 'option');?>
					<?php if (isset($compliance_notice)) { ?>
					<?php echo $compliance_notice; ?>
					<?php }  ?>
				</div>
				
				<div class="copyright">
					<p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. <br>All rights reserved.</p>
				</div>
				
			</footer>
			
		</section>
		
		<div class="nav-overlay"></div>
		
</div><!-- MAIN WRAPPER END -->
		
		<button id="back-2-top" class="hidden"><i class="fa fa-chevron-circle-up fa-2x"></i><span class="sr-only">Back to top</span></button>	
				
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('User actions') ) : ?><?php endif; ?>
		
		<?php include (STYLESHEETPATH . '/_/inc/global/no-script.php'); ?>
		
		<?php include (STYLESHEETPATH . '/_/inc/xmas/pop-up.php'); ?>
				
		<?php wp_footer(); ?>

	</body>
</html>