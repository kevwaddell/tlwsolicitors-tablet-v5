<?php
 
function my_acf_save_post( $post_id )
{
	global $current_screen;
	// vars
	
	if ($current_screen->id == 'tlw_testimonial_cpt') {
		
		//echo '<pre>';print_r($_POST['acf']);echo '</pre>';	
		
		 $name = $_POST['acf']['field_52e8d46ec7946'];
		 $name_slug = sanitize_title($name);
		 
		 $location = $_POST['acf']['field_52e8d48ac7947'];
		 $location_slug = sanitize_title($location);
		 
		 $slug = $name_slug."-".$location_slug;
		 $title = wp_strip_all_tags($name." - ".$location);
		 
		//echo '<pre>';print_r($slug);echo '</pre>';
		//echo '<pre>';print_r($title);echo '</pre>';
		
		wp_update_post( array( 'ID' => $post_id, 'post_title' => $title, 'post_name' => $slug) );
		 
	}	
	
	if ($current_screen->id == 'page') {
		
		//echo '<pre>';print_r($_POST['fields']);echo '</pre>';
		
		if (!empty($_POST['fields']['field_52e7b4aab5b09']) ) {
		$into = $_POST['fields']['field_52e7b4aab5b09'];
		
		wp_update_post( array( 'ID' => $post_id, 'post_excerpt' => $into ) );
		}	
		 
	}	

	
}
 
// run before ACF saves the $_POST['fields'] data
add_action('acf/save_post', 'my_acf_save_post', 1);
 
?>