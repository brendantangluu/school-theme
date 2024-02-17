<?php
function school_register_custom_post_types(){
    
    // Register Staff CPT

    $labels = array(
        'name'               => _x( 'Staff', 'post type general name'  ),
        'singular_name'      => _x( 'Staff', 'post type singular name'  ),
        'menu_name'          => _x( 'Staff', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Staff' ),
        'add_new_item'       => __( 'Add New Staff' ),
        'new_item'           => __( 'New Staff' ),
        'edit_item'          => __( 'Edit Staff' ),
        'view_item'          => __( 'View Staff'  ),
        'all_items'          => __( 'All Staff' ),
        'search_items'       => __( 'Search Staff' ),
        'parent_item_colon'  => __( 'Parent Staff:' ),
        'not_found'          => __( 'No Staff found.' ),
        'not_found_in_trash' => __( 'No Staff found in Trash.' ),
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array( 'title' ),
        'template'           => array( array( 'core/quote' ) ),
        'template_lock'      => 'all'
    );

    register_post_type( 'school-student', $args );

    // Register Student CPT

    $labels = array(
        'name'               => _x( 'Student', 'post type general name'  ),
        'singular_name'      => _x( 'Student', 'post type singular name'  ),
        'menu_name'          => _x( 'Student', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Student', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Student' ),
        'add_new_item'       => __( 'Add New Student' ),
        'new_item'           => __( 'New Student' ),
        'edit_item'          => __( 'Edit Student' ),
        'view_item'          => __( 'View Student'  ),
        'all_items'          => __( 'All Student' ),
        'search_items'       => __( 'Search Student' ),
        'parent_item_colon'  => __( 'Parent Student:' ),
        'not_found'          => __( 'No Student found.' ),
        'not_found_in_trash' => __( 'No Student found in Trash.' ),
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'student' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'show_in_rest'       => true,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-admin-users',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'template'           => array( 
            array( 'core/paragraph', array(
                'placeholder' => 'Add Biography',
            ) ),
            array( 'core/buttons', array(
                'placeholder' => 'Add Link to Portfolio',
            ) ),  
        ),
        'template_lock'      => 'all'
    );

    register_post_type( 'school-student', $args );
}
add_action('init', 'school_register_custom_post_types');

function school_register_taxonomies(){
    $labels = array(
        'name'              => _x( 'Staff Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff Categories' ),
        'all_items'         => __( 'All Staff Category' ),
        'parent_item'       => __( 'Parent Staff Category' ),
        'parent_item_colon' => __( 'Parent Staff Category:' ),
        'edit_item'         => __( 'Edit Staff Category' ),
        'view_item'         => __( 'Vview Staff Category' ),
        'update_item'       => __( 'Update Staff Category' ),
        'add_new_item'      => __( 'Add New Staff Category' ),
        'new_item_name'     => __( 'New Staff Category Name' ),
        'menu_name'         => __( 'Staff Category' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-categories' ),
    );
    register_taxonomy( 'school-staff-category', array( 'school-staff' ), $args );
}
add_action('init', 'school_register_taxonomies' );