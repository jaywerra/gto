<?php
/**
 * Set up custom post types
 *
 * @package gto
 */

/**
 * Set up custom post types
 */
function gto_register_post_types() {

    // News & Media
    register_post_type('media-posts',
      array(
        'labels' => array(
          'name' => __( 'News & Media Posts' ),
          'singular_name' => __( 'News & Media Post' ),
          'add_new' => __( 'Add New' ),
          'add_new_item' => __( 'Add new News & Media post' ),
          'edit_item' => 'Edit News & Media post',
          'new_item' => __('New News & Media post'),
          'view_item' => __('View News & Media post'),
          'search_items' => __('Search News & Media post'),
          'not_found' =>  __('No News & Media post found'),
          'not_found_in_trash' => __('No News & Media post found in Trash'),
        ),
        'public' => true,
        'has_archive' => false,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-media-text',
        'rewrite' => array('slug' => 'news-media', 'with_front' => false),
        'show_in_nav_menus' => true,
        'supports' => array('title', 'thumbnail', 'author', 'excerpt')
      )
    );
  
    flush_rewrite_rules();
  }
  add_action( 'init', 'gto_register_post_types', 0 );