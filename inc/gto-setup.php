<?php
/**
 * Initial theme setup
 *
 * @package gto
 */

header("Access-Control-Allow-Origin: *");

function gto_allowed_origins($urls) {
	$urls[] = array( 
		''
	);
	return $urls;
}
add_filter('allowed_http_origins', 'gto_allowed_origins');



if ( ! function_exists( 'gto_setup' ) ) :
	function gto_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
    	add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Register Navigation Menus
		register_nav_menus(array(
            'header-primary' => esc_html__( 'Primary', 'gto' ),
            'header-utility' => esc_html__( 'Utility', 'gto' ),
			'menu-footer-practiceareas' => esc_html__( 'Footer Practice Areas', 'gto' ),
			'menu-footer-about' => esc_html__( 'Footer About Us', 'gto' ),
			'menu-footer-contact' => esc_html__( 'Footer Contact', 'gto' ),
			'menu-footer-legal' => esc_html__( 'Sub Footer', 'gto' )
        ));
	}
endif;
add_action( 'after_setup_theme', 'gto_setup' );

function yoast_seo_canonical_slash_remove( $canonical_url ) {
	return untrailingslashit( $canonical_url );
}
add_filter( 'wpseo_canonical', 'yoast_seo_canonical_slash_remove' );

function yoast_seo_sitemap_slash_remove( $get_permalink, $post ) {
	return untrailingslashit( $get_permalink );
}
add_filter( 'wpseo_xml_sitemap_post_url', 'yoast_seo_sitemap_slash_remove', 10, 2 );



function gto_rest_url( $url ) {
	if(get_home_url() != get_site_url()) {
		return str_replace(get_home_url(), get_site_url(), $url);
	} else {
		return $url;
	}
}
add_filter( 'rest_url', 'gto_rest_url' );

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

if( function_exists('acf_partners_slider_global') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Partners Slider Settings',
		'menu_title'	=> 'Partners Slider',
		'menu_slug' 	=> 'partner-slider-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
