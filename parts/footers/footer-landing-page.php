	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('User actions') ) : ?><?php endif; ?>
		
		<noscript>
		
		<?php $no_script_notice = get_field('no_script_notice', 'option'); ?>
		
			<div class="no-script-wrap">
				<div class="no-script-inner-wrap">
			
					<div class="no-script-inner">
						<?php echo $no_script_notice; ?>
						<a href="<?php echo get_option('home'); ?>" title="refresh" class="btn btn-default btn-lg btn-block"><i class="fa fa-refresh fa-lg"></i> Refresh</a>
					</div>
				
				</div>
			</div>
			
		</noscript>
		
		<?php wp_footer(); ?>
		
	</body>
</html>