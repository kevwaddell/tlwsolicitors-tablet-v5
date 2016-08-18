<?php 
add_action( 'init', 'register_cpt_tlw_how_it_works_cpt' );

function register_cpt_tlw_how_it_works_cpt() {

    $labels = array( 
        'name' => _x( 'How it works', 'tlw_how_it_works_cpt' ),
        'singular_name' => _x( 'Proccess', 'tlw_how_it_works_cpt' ),
        'add_new' => _x( 'Add New', 'tlw_how_it_works_cpt' ),
        'add_new_item' => _x( 'Add New Proccess', 'tlw_how_it_works_cpt' ),
        'edit_item' => _x( 'Edit Proccess', 'tlw_how_it_works_cpt' ),
        'new_item' => _x( 'New Proccess', 'tlw_how_it_works_cpt' ),
        'view_item' => _x( 'View Proccess', 'tlw_how_it_works_cpt' ),
        'search_items' => _x( 'Search How it works', 'tlw_how_it_works_cpt' ),
        'not_found' => _x( 'No how it works found', 'tlw_how_it_works_cpt' ),
        'not_found_in_trash' => _x( 'No how it works found in Trash', 'tlw_how_it_works_cpt' ),
        'parent_item_colon' => _x( 'Parent Proccess:', 'tlw_how_it_works_cpt' ),
        'menu_name' => _x( 'How it works', 'tlw_how_it_works_cpt' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'How it works CPT for service processes.',
        'supports' => array( 'title', 'page-attributes' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-hammer',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 
            'slug' => 'how-it-works', 
            'with_front' => false,
            'feeds' => false,
            'pages' => true
        ),
        'capability_type' => 'post'
    );

    register_post_type( 'tlw_how_it_works_cpt', $args );
}		
?>