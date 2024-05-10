<?php

abstract class Gameapp_Commander_Manager {
    
    public static function add_type() {
        $args = array(
            'labels'      => array(
				'name'          => __('Chỉ huy', 'gameapp'),
				'singular_name' => __('Chỉ huy', 'gameapp'),
			),
            'public'      => true,
            'has_archive' => true,
            'rewrite'      => array('slug' => 'chi_huy')
        );

        register_post_type('commander', $args);
    }

    public static function add_tax() {
        $labels = array(
            'name'              => _x( 'Nền văn minh', 'gameapp' ),
            'singular_name'     => _x( 'Nền văn minh', 'gameapp' ),
        );

        $args   = array(
            'hierarchical'      => true, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'nen_van_minh' ],
        );
        register_taxonomy('civilization', ['commander'], $args);
    }

}

add_action('init', ['Gameapp_Commander_Manager', 'add_type']);
add_action('init', ['Gameapp_Commander_Manager', 'add_tax']);

include_once plugin_dir_path(__FILE__) . 'commander-meta-box.php';