<?php

function hoavic_add_post_type($post_type, $name, $singular_name, $rewrite = '', $public = true, $has_archive = true) {

    
    if($name === '' || !$name) {$name = $post_type;}
    if($singular_name === '' || !$singular_name) {$singular_name = $name;}
    if($rewrite === '' || !$rewrite) {$rewrite = $post_type;}

    $args = array(
        'labels'      => array(
            'name'          => __($name, 'hoavic'),
            'singular_name' => __($singular_name, 'hoavic'),
        ),
        'public'      => $public,
        'has_archive' => $has_archive,
        'rewrite'      => array('slug' => $rewrite)
    );

    register_post_type($post_type, $args);

}


function hoavic_add_tax($tax, array $post_types, $name, $singular_name, $rewrite = '', $query_var = true, $show_ui = true, $show_admin_column = true) {

    if($name === '' || !$name) {$name = $tax;}
    if($singular_name === '' || !$singular_name) {$singular_name = $name;}
    if($rewrite === '' || !$rewrite) {$rewrite = $tax;}

    $labels = array(
        'name'              => _x( $name, 'gameapp' ),
        'singular_name'     => _x( $singular_name, 'gameapp' ),
    );

    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => $show_ui,
        'show_admin_column' => $show_admin_column,
        'query_var'         => $query_var,
        'rewrite'           => [ 'slug' => $rewrite ],
    );
    register_taxonomy($tax, $post_types, $args);
}