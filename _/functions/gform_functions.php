<?php
add_filter( 'gform_ajax_spinner_url', 'tgm_io_custom_gforms_spinner' );

function tgm_io_custom_gforms_spinner( $src ) {

    return get_stylesheet_directory_uri() . '/_/img/ajax-loader.gif';
    
}
?>