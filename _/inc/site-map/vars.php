<?php 
$for_you_pg = get_field('for_you_pg', 'options');
$for_biz_pg = get_field('for_biz_pg', 'options');

$services_for_you_pg = get_page($for_you_pg);
$for_you_page_icon = get_field('page_icon', $services_for_you_pg->ID);
$services_for_you_pgs = get_field('services_for_you', 'options');
//echo '<pre>';print_r($services_for_you_pgs);echo '</pre>';

$services_for_biz_pg = get_page($for_biz_pg);
$for_biz_page_icon = get_field('page_icon', $services_for_biz_pg->ID);
$services_for_biz_pgs = get_field('services_for_biz', 'options');

$for_u_args = array(
'post_type'		=> 'page',
'orderby'		=> 'menu_order',
'include'		=> $services_for_you_pgs,
'order'			=> 'ASC'
);

$services_for_you = get_posts($for_u_args);

$for_biz_args = array(
'post_type'		=> 'page',
'orderby'		=> 'menu_order',
'include'		=> $services_for_biz_pgs,
'order'			=> 'ASC'
);

$services_for_biz = get_posts($for_biz_args);
//echo '<pre>';print_r($services_for_biz);echo '</pre>';

//echo '<pre>';print_r($practices);echo '</pre>';
$company_page = get_post(12);
$company_page_icon = get_field('page_icon', $company_page->ID);

$company_args = array(
'post_type'		=> 'page',
'orderby'		=> 'menu_order',
'post_parent'	=> $company_page->ID,
'order'			=> 'ASC',
'posts_per_page' => -1,
);

$company_pages = get_posts($company_args);

$rescources_args = array(
'post_type'		=> 'page',
'orderby'		=> 'title',
'include'		=> array(10, 95),
'order'			=> 'ASC'
);

$rescources_pages = get_posts($rescources_args);

$legal_page = get_page_by_title('Legal Notices');
$legal_page_icon = get_field('page_icon', $legal_page->ID);

$legal_args = array(
'post_type'		=> 'page',
'orderby'		=> 'menu_order',
'post_parent'	=> $legal_page->ID,
'order'			=> 'ASC'
);

$legal_pages = get_posts($legal_args);

$news_page_ID = get_option('page_for_posts');
$news_page = get_page($news_page_ID);
$news_page_icon = get_field('page_icon', $news_page->ID);

$topics_args = array(
	'type'			=> 'post',
	'hide_empty'	=> 0,
	'hierarchical'       => 0,
	'orderby'		=> 'meta_value',
	'order'			=> 'desc'
); 
$topics = get_categories($topics_args);

$subjects_args = array(
	'type'			=> 'post',
	'hide_empty'	=> 0,
	'parent'		=> 0,
	'orderby'		=> 'meta_value',
	'order'			=> 'ASC'
); 
$subjects = get_tags($subjects_args);

//echo '<pre>';print_r($topics);echo '</pre>';

 ?>