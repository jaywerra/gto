<?php
/**
 * Scripts and Styles
 *
 * @package gto
 */

function gto_scripts() {
	// STYLES
	wp_enqueue_style( 'gto-style', get_template_directory_uri() . '/assets/dist/css/style.min.css' );
	

	// SCRIPTS
	
	
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'jquery-migrate' );
	
	// wp_register_script( 'mpl-js-ajax-list', '//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js', [], false, true );


	wp_register_script( 'gto-js', get_template_directory_uri() . '/assets/dist/js/main.min.js', [], false, true );
	// wp_register_script( 'gfb-js-jquery', 'https://code.jquery.com/jquery-3.2.1.min.js' );
	
//   // Pass url for AJAX calls
// 	wp_localize_script( 'gfb-js', 'gfb_ajax', array(
// 		'ajaxurl' => admin_url('admin-ajax.php'),
//   	));

	// wp_enqueue_script( 'mpl-js-ajax-list' );
	wp_enqueue_script( 'gto-js' );
	// wp_enqueue_script( 'gfb-js-jquery' );
}
add_action( 'wp_enqueue_scripts', 'gto_scripts' );