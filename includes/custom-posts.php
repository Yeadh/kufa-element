<?php

if ( ! function_exists('kufa_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function kufa_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'kufa' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'kufa' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'kufa' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'kufa' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'kufa' ),
                'add_new_item'       => __( 'Add New Portfolio', 'kufa' ),
                'new_item'           => __( 'New Portfolio', 'kufa' ),
                'edit_item'          => __( 'Edit Portfolio', 'kufa' ),
                'view_item'          => __( 'View Portfolio', 'kufa' ),
                'all_items'          => __( 'All Portfolio', 'kufa' ),
                'search_items'       => __( 'Search Portfolio', 'kufa' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'kufa' ),
                'not_found'          => __( 'No Portfolio found.', 'kufa' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'kufa' )
            ),

            'description'        => __( 'Description.', 'kufa' ),
            'menu_icon'          => 'dashicons-layout',
            'public'             => true,
            'show_in_menu'       => true,
            'has_archive'        => false,
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        ));
    }

    add_action( 'init', 'kufa_custom_post_type' );

}

function kufa_add_tags_categories() {
    register_taxonomy_for_object_type('category', 'portfolio');
    register_taxonomy_for_object_type('post_tag', 'portfolio');
}
add_action('init', 'kufa_add_tags_categories');