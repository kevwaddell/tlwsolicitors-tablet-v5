<?php 

/*
update_option('siteurl','http://tlwsolicitors.dev');
update_option('home','http://tlwsolicitors.dev');
*/

add_action( 'after_setup_theme', 'editor_styles' );

function editor_styles() {
add_editor_style();	
}
if (!is_admin()) {
function tlw_scripts() {
	// Load stylesheets.
	//wp_enqueue_style( 'styles', get_stylesheet_directory_uri().'/_/css/styles.css', array('twitter-bootstrap'), filemtime( get_stylesheet_directory().'/_/css/styles.css' ), 'screen' );
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri().'/_/css/styles.css', null, filemtime( get_stylesheet_directory().'/_/css/styles.css' ), 'screen' );
	
	if (is_page() || is_single()) {
	wp_dequeue_style('wprssmi_template_styles');	
	}
	
	if( !has_shortcode( $post->post_content, 'theme-my-login') ) {
	wp_dequeue_style('theme-my-login');
	}
	
	if ( isset($_COOKIE['catAccCookies']) ) {
	wp_dequeue_style('cookie-consent-style');
	}
	
	// Load JS
	$functions_dep = array(
	'jquery',
	'bootstrap-select', 
	'jquery-cookie', 
	'slim-scroll'
	);
	//wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'jquery-ui-core' );
	wp_deregister_script('jquery-core');
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js', array(), '3.0.0', true);
	wp_enqueue_script( 'modernizr-min', get_stylesheet_directory_uri() . '/_/js/modernizr-min.js', array(), '2.8.3', true );
	wp_enqueue_script( 'bootstrap-min', get_stylesheet_directory_uri() . '/_/js/bootstrap-min.js', array('jquery'), '2.8.3', true );
	wp_enqueue_script( 'jquery-cookie', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js', array('jquery'), '1.4.1', true );
	wp_enqueue_script( 'slim-scroll', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.min.js', array('jquery'), '1.3.6', true );
	wp_enqueue_script( 'bootstrap-select', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.3/js/bootstrap-select.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'functions', get_stylesheet_directory_uri() . '/_/js/functions-min.js', $functions_dep, filemtime( get_stylesheet_directory().'/_/js/functions.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'tlw_scripts' );
}

if(!is_admin()) {
	
	add_action('wp_print_styles', 'show_all_styles');
	function show_all_styles() {
		// use global to call variable outside function
		
		global $wp_styles;
		
		// arrange the queue based on its dependency
		$wp_styles->all_deps($wp_styles->queue);	
		
		// The result
		$handles = $wp_styles->to_do;
		
		$css_code = '';
	
		// New file location: E:xampp\htdocs\wordpress\wp-content\theme\wdc\merged-style.css
		$merged_file_location = get_stylesheet_directory() .'/_/css/merged-style.css';
		$merged_file = file_get_contents($merged_file_location);
		//echo '<pre>';print_r($wp_styles->queue);echo '</pre>';
		// loop all styles
		foreach ($handles as $handle)
		{
			/*
				Clean up the url, for example: wp-content/themes/wdc/style.min.css?v=4.6
				become wp-content/themes/wdc/style.min.css
			*/
			$src = strtok($wp_styles->registered[$handle]->src, '?');
			
			// #1. Combine CSS File.
			// If the src is url		
			if (strpos($src, 'http') !== false  || strpos($src, 'https') !== false) {
				// Get thr site url, e.g. http://webdevzoom.com/wordpress
				$site_url = site_url();
			
				/*
					If the css file come from local server, change the full url into relative path
					For example: http://webdevzoom.com/wordpress/wp-content/plugins/wpnewsman/css/menuicon.css
					Become: /wp-content/plugins/wpnewsman/css/menuicon.css
					
					Otherwise, leave it as is, e.g: https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css
				*/
				if (strpos($src, $site_url) !== false)
					$css_file_path = str_replace($site_url, '', $src);
				else
					$css_file_path = $src;
				
				/*
					In order to be able to use file_get_contents function, we need to remove preceding slash,
					For example: /wp-content/plugins/wpnewsman/css/menuicon.css
					Become: wp-content/plugins/wpnewsman/css/menuicon.css
				*/
				$css_file_path = ltrim($css_file_path, '/');
			} else {			
				$css_file_path = ltrim($src, '/');
			}
			
			// Check wether file exists then merge
			if  (file_exists($css_file_path)) {
				$css_code .=  file_get_contents($css_file_path);
			}
		}
	
		// write the merged styles into current theme directory
		if ($merged_file != $css_code) {
		file_put_contents ($merged_file_location , $css_code);
		}
		
		// #2. Load the URL of merged file
		wp_enqueue_style('merged-style',  get_stylesheet_directory_uri() . '/_/css/merged-style.css', array(), filemtime( get_stylesheet_directory().'/_/css/merged-style.css' ), 'all' );
		
		// #3. Deregister all handles
		foreach ($handles as $handle)
		{
			wp_deregister_style($handle);
		}
	}
}

if(!is_admin()) {
add_filter( 'gform_init_scripts_footer', '__return_true' );

remove_filter( 'the_content', 'amtsp_make_phone_clickable', 20);

	function custom_dequeue() {
		
		if (!is_admin()) {
	    wp_dequeue_style('autoptimize-toolbar');
	    wp_deregister_style('autoptimize-toolbar');
	    wp_dequeue_script('autoptimize-toolbar');
	    wp_deregister_script('autoptimize-toolbar');
	    }
	}
	
	add_action( 'wp_enqueue_scripts', 'custom_dequeue', 9999 );
	add_action( 'wp_head', 'custom_dequeue', 9999 );

function add_async_attribute($tag, $handle) {
   // add script handles to the array below
  
   return str_replace(' src', ' defer src', $tag);
}
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
}

add_filter('style_loader_tag', 'link_to_loadCSS_script',10,3);
	if(!is_admin()) {
	function link_to_loadCSS_script($html, $handle, $href ) {
		//echo '<pre>';print_r($handle);echo '</pre>';
	   if ($handle == 'merged-style') {
		$dom = new DOMDocument();
	    $dom->loadHTML($html);
	    $a = $dom->getElementById($handle.'-css');	
		return "<noscript id=\"deferred-styles\"><link rel=\"". $a->getAttribute('rel') ."\" type=\"text/css\" href=\"".$a->getAttribute('href')."\" media=\"none\" onload=\"if(media!='all')media='all'\"/></noscript>";
		}
	}
}

if ($_SERVER['SERVER_NAME']=='www.tlwsolicitors.co.uk') {
function ewp_remove_script_version( $src ){
	return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'ewp_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'ewp_remove_script_version', 15, 1 );
}

add_theme_support('html5', array('search-form'));

if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array(
			  'legal_links_menu' => 'Legal Menu',
			  'social_links_menu' => 'Footer Social Links',
			  'footer_menu_business' => 'Footer Menu Business',
			  'footer_menu_general' => 'Footer Menu General'
			)
		);
}

if ( function_exists( 'register_sidebar' ) ) {
	
	$login_sb_args = array(
	'name'          => "User actions",
	'id'            => "user-actions",
	'description'   => 'Area for logged in user widget',
	'class'         => 'user-links',
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '',
	'after_title'   => '' 
	);
		
	$newsletter_sb_args = array(
	'name'          => "Newsletter Sign-up Form",
	'id'            => "newsletter-signup-form",
	'description'   => 'Newsletter signup widget',
	'class'         => 'contact-form',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>' 
	);
	
	
	register_sidebar( $login_sb_args );
	register_sidebar( $newsletter_sb_args );
}


add_theme_support( 'post-thumbnails', array( 'page', 'post', 'tlw_landing_page' ) );
add_post_type_support( 'page', 'excerpt' );

$custom_header_args = array(
	'width'         => 1500,
	'flex-height' => true,
	'height'        => 600,
	'default-image' => get_stylesheet_directory_uri() . '/_/img/header.jpg',
	'uploads'       => true,
	'default-text-color' => '#fff',
	'header-text' => false
);
add_theme_support( 'custom-header', $custom_header_args );

/* POST THUMBNAIL FUNCTIONS */

function add_toolkit_banner_img( $post ) {	
		
	$post_thumbnail_id = get_post_thumbnail_id( $post );
	$banner_feat_img = wp_get_attachment_image_src($post_thumbnail_id, 'full' );
	
	echo $banner_feat_img[0];
	
	//echo '<pre>';print_r( $wide_banner_img[0] );echo '</pre>';
	
}

function add_feat_img ( $post ) {	
	
	if (has_post_thumbnail($post->ID)) {
		
		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
		$attachment = get_post( $post_thumbnail_id );
		$alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
		
		//echo '<pre>';print_r($attachment->post_excerpt);echo '</pre>';
		
		
		$img_atts = array(
		'class'	=> "img-responsive"
		);
		
		if (!empty($alt)){
		$img_atts['alt'] = 	trim(strip_tags( $alt ));
		}
		
		if (!empty($attachment->post_title)){
		$img_atts['title'] = 	trim(strip_tags( $attachment->post_title ));
		}
		
		echo get_the_post_thumbnail($post->ID ,'feat-img', $img_atts );
	
	} else {
		
		echo '<img src="'.get_stylesheet_directory_uri().'/_/img/default-featured-img.jpg" title="TLW Solicitors" alt="TLW Solicitors" class="img-responsive">';
		
	}
	
}

function add_wide_feat_img ( $post, $classes = "" ) {	
		
	$post_thumbnail_id = get_post_thumbnail_id( $post);
	$attachment = get_post( $post_thumbnail_id );
	$alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
	
	$wide_banner_img = wp_get_attachment_image_src($post_thumbnail_id, 'wide-banner-img' );
	
	echo '<div class="wide-feat-img-wrap" style="background-image: url('.$wide_banner_img[0].')"></div>';
	
}

function add_banner_feat_img( $post ) {	
		
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$wide_banner_img = wp_get_attachment_image_src($post_thumbnail_id, 'wide-banner-img' );
	
	echo $wide_banner_img[0];
	
	//echo '<pre>';print_r( $wide_banner_img[0] );echo '</pre>';
	
}

function add_full_page_banner_img( $post ) {	
		
	$post_thumbnail_id = get_post_thumbnail_id( $post );
	$banner_feat_img = wp_get_attachment_image_src($post_thumbnail_id, 'full' );
	
	echo $banner_feat_img[0];
	
	//echo '<pre>';print_r( $wide_banner_img[0] );echo '</pre>';
	
}



// Get the id of a page by its name
function get_page_id($page_name){
	global $wpdb;
	$page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return $page_name;
}

function add_gravityforms_style() {
	global $post;
	$form = get_field('form', $post->ID);
	
	if (!empty($form)) {
		wp_enqueue_style("gforms_css", GFCommon::get_base_url() . "/css/forms.css", null, GFCommon::$version);
	}
	
}
add_action('wp_print_styles', 'add_gravityforms_style');

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/* REGISTER FEEDBACK CPT */
include (STYLESHEETPATH . '/_/functions/tlw_feedback_cpt.php');

/* REGISTER TEAMS CPT */
include (STYLESHEETPATH . '/_/functions/tlw_team_cpt.php');

/* REGISTER LANDING PAGE CPT */
include (STYLESHEETPATH . '/_/functions/tlw_landing_pages_cpt.php');

/* REGISTER HOW IT WORKS */
include (STYLESHEETPATH . '/_/functions/tlw_how_it_works_cpt.php');

/* REGISTER POSITIONS TAX */
include (STYLESHEETPATH . '/_/functions/tlw_positions_tax.php');

/* REGISTER Vacancies CPT */
include (STYLESHEETPATH . '/_/functions/tlw_jobs_cpt.php');

/* TAXONMY ORDERING */
include (STYLESHEETPATH . '/_/functions/tax_order.php');

/* AFC OPTIONS FUNCTIONS */
include (STYLESHEETPATH . '/_/functions/afc_options_functions.php');

/* FORM ACTIONS */
include (STYLESHEETPATH . '/_/functions/gform_functions.php');

/* AFC SAVE FUNCTIONS */
include (STYLESHEETPATH . '/_/functions/afc_save_post.php');

/* SEND NEWSLETTER TO DOTMAILER */
include (STYLESHEETPATH . '/_/functions/submit_newsletter.php');

function add_gf_cap() {	
   $id = 2;
   $role = new WP_User( $id );
   $role->add_cap( 'gravityforms_edit_forms' );
   $role->add_cap( 'gravityforms_view_entries' );
   $role->add_cap( 'gravityforms_edit_entries' );
   $role->add_cap( 'gravityforms_export_entries' );
   $role->add_cap( 'gravityforms_view_entry_notes' );
   $role->add_cap( 'gravityforms_edit_entry_notes' );
}
 
add_action( 'admin_init', 'add_gf_cap' );

function truncate($string,$length=100,$append="&hellip;") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}

function adjust_my_breadcrumbs( $linksarray ) {
	if( is_array( $linksarray ) && count( $linksarray ) > 0 && is_single() ) {
		array_pop( $linksarray );
	}
	return $linksarray;
}
add_filter( 'wpseo_breadcrumb_links', 'adjust_my_breadcrumbs' );

/*
*  AFC Options Page
*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
	//echo '<pre>';print_r($buttons);echo '</pre>';
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(
    	array(
    		'title' => 'Intro',
    		'selector' => 'p',
    		'classes' => 'intro bold'
    	),
    	
    	array(
    		'title' => 'Large Intro',
    		'selector' => 'p',
    		'classes' => 'intro lrg'
    	),
    	
    	array(
    		'title' => 'H2 Caps',
    		'selector' => 'h2',
    		'classes' => 'caps'
    	),
    	array(
    		'title' => 'Colour Link',
    		'selector' => 'a',
    		'classes' => 'col-link'
    	),
        array(
        	'title' => 'Red Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#C60751'
        	)
        ),
        array(
        	'title' => 'Aqua Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#8BC2BD'
        	)
        ),
        array(
        	'title' => 'Purple Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#B975DA'
        	)
        ),
        array(
        	'title' => 'Orange Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#FFAF4E'
        	)
        ),
        array(
        	'title' => 'Pink Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#EA5777'
        	)
        ),
        array(
        	'title' => 'Blue Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#2D80A9'
        	)
        )

    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
    
    add_editor_style();

}

function tlw_theme_get_archives_link ( $link_html ) {
    global $wp;
    static $current_url;
    if ( empty( $current_url ) ) {
        $current_url = add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) );
    }
    if ( stristr( $link_html, $current_url ) !== false ) {
        $link_html = preg_replace( '/(<[^\s>]+)/', '\1 class="active"', $link_html, 1 );
    }
    return $link_html;
}
add_filter('get_archives_link', 'tlw_theme_get_archives_link');

/*
function wpse126301_dashboard_columns() {
    add_screen_option(
        'layout_columns',
        array(
            'max'     => 2,
            'default' => 1
        )
    );
}
add_action( 'admin_head-index.php', 'wpse126301_dashboard_columns' );
*/

 ?>