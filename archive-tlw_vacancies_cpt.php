<?php get_header(); ?>

<?php
$jobs_pg = get_page_by_title( "Vacancies" );
$content = apply_filters( 'the_content', $jobs_pg->post_content );

	
	if ( has_post_thumbnail($jobs_pg->ID) ) {
	$img_post = $jobs_pg;
	}
?>

<!-- MAIN CONTENT START -->
<main class="page-col-red">
	
	<?php include (STYLESHEETPATH . '/_/inc/global/awards-strip.inc'); ?>	
	
	<?php include (STYLESHEETPATH . '/_/inc/global/breadcrumbs.php'); ?>
	
	<?php if (has_post_thumbnail($jobs_pg->ID)) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/vacancies/img-banner-slim.inc'); ?>			
	<?php } ?>	
		
	<article <?php post_class("content-section"); ?>>		
	
	<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.inc'); ?>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="entry wide-entry">
						<div class="main-txt">
							<?php echo $content; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</article>
	
	<?php include (STYLESHEETPATH . '/_/inc/vacancies/vacancy-post-list.inc'); ?>	
	
	<?php include (STYLESHEETPATH . '/_/inc/vacancies/sections/send-us-cv.inc'); ?>

</main>
<!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
