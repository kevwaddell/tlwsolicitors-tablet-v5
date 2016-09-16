	
		<!-- FOOTER START -->
		<section id="footer-info">
		
			<footer class="container-fluid">
						
				<div class="row">
					
					<div class="col-xs-3">
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
					</div>
					
					<div class="col-xs-6">
										
						<div class="notices">
							<span>Authorised and regulated by the <a title="Solicitors Regulation Authority" href="http://www.sra.org.uk" target="_blank">Solicitors Regulation Authority</a>.<br /> 
							&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</span>
						</div>
						
						<?php wp_nav_menu(array( 'container_class' => 'social-links clearfix', 'theme_location' => 'social_links_menu', 'fallback_cb' => false ) ); ?>
					</div>
					
					<div class="col-xs-3">
						<?php 
						$hw_active = get_field('headway_active', 'options');
						if ($hw_active) { 
						$hw_logo = get_field('headway_logo', 'options');	
						$hw_link = get_field('headway_website', 'options');
						?>
						<div class="headway-logo" style="background-image: url(<?php echo $hw_logo; ?>);">
							<a href="<?php echo $hw_link; ?>" target="_blank" rel="nofollow" title="Headway The Brain Injury Association">
							Headway The Brain Injury Association	
							</a>
						</div>
						<?php } ?>
					</div>
				
				</div>	
				
			</footer>
			
		</section>
		
</div><!-- MAIN WRAPPER END -->
		
		<?php include (STYLESHEETPATH . '/_/inc/global/no-script.php'); ?>
		
		<?php include (STYLESHEETPATH . '/_/inc/global/search-pop-up.inc'); ?>
		
		<?php include (STYLESHEETPATH . '/_/inc/contact-us/route-finder-modal.inc'); ?>
		
		<?php include (STYLESHEETPATH . '/_/inc/xmas/pop-up.inc'); ?>
				
		<?php wp_footer(); ?>

	</body>
</html>