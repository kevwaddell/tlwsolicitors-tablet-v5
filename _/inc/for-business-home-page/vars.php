<?php 
$contact_page = get_page_by_title('Contact us');
$services_for_biz_pgs = get_field('services_for_biz', 'options');
$for_biz_pg = get_field('for_biz_pg', 'options');
$services_for_biz_pg = get_page($for_biz_pg);


$services_selects_args = array(
'sort_column' => 'menu_order',
'include'	=> $services_for_biz_pgs,
'post_type' => 'page'
);

$services_selects = get_pages($services_selects_args);
//echo '<pre>';print_r($services_for_biz_pgs);echo '</pre>';

$feedback_active = get_field('hp_feedback_active', 'options');

$feedback_args = array(
	'posts_per_page'   => 5,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
); 
$feedback_quotes = get_posts($feedback_args); 

$campaigns_active = get_field('campaigns_active', 'options');

//echo '<pre>';print_r($feedback_quotes);echo '</pre>';

?>
