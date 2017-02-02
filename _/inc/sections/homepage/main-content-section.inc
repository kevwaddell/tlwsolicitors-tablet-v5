<?php  
global $post;
$about_pg = get_page_by_title('About TLW Solicitors');
$about_pg_icon = get_field('page_icon', $about_pg->ID);
$team_pg = get_page_by_title('Our Team');
$team_pg_icon = get_field('page_icon', $team_pg->ID);
$feedback_pg = get_page_by_title('Why Choose TLW');
$feedback_pg_icon = get_field('page_icon', $feedback_pg->ID);

$section_title = "TLW introduction";	
?>
<article <?php post_class("content-section"); ?>>
	<a name="service-info-txt" id="service-info-txt" class="section-target"></a>
					
	<?php include (STYLESHEETPATH . '/_/inc/sections/global-telephone-number.inc'); ?>	
	
	<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.inc'); ?>		
	
	<div class="container-fluid">
		
		<div class="row">
			
			<div class="col-xs-10 col-xs-offset-1">	
		
				<div class="entry wide-entry">
			<div class="main-txt home">
			<?php the_content(); ?>
			</div>	
			
			<div class="info-links">
				<a href="<?php echo get_permalink($about_pg->ID); ?>" class="btn btn-default btn-block"><i class="fa <?php echo $about_pg_icon; ?> fa-lg"></i> About us</a>	

				<a href="<?php echo get_permalink($team_pg->ID); ?>" class="btn btn-default btn-block"><i class="fa <?php echo $team_pg_icon; ?> fa-lg"></i> Our Team</a>	

				<a href="<?php echo get_permalink($feedback_pg->ID); ?>" class="btn btn-default btn-block"><i class="fa <?php echo $feedback_pg_icon; ?> fa-lg"></i> Client Feedback</a>	
			</div>
												
		</div>
		
			</div>
			
		</div>
	
	</div>
	
</article>