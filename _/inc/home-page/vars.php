<?php 
$contact_page = get_page_by_title('Contact us');

$services_for_you_pgs = get_field('services_for_you', 'options');
$for_you_pg = get_field('for_you_pg', 'options');
$services_for_you_pg = get_page($for_you_pg);

$services_for_biz_pgs = get_field('services_for_biz', 'options');
$for_biz_pg = get_field('for_biz_pg', 'options');
$services_for_biz_pg = get_page($for_biz_pg);

$services_4u_args = array(
'sort_column' => 'menu_order',
'include'	=> $services_for_you_pgs,
'post_type' => 'page'
);

$services_4u = get_pages($services_4u_args);

$services_4biz_args = array(
'sort_column' => 'menu_order',
'include'	=> $services_for_biz_pgs,
'post_type' => 'page'
);

$services_4biz = get_pages($services_4biz_args);
?>
