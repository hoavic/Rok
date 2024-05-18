<?php
/**
 * @version 1.0.1
 */
/*
Plugin Name: Game App
Plugin URI: #
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.0.1
Author URI: #
*/

$plugin_path = plugin_dir_path(__FILE__);

//require_once $plugin_path . 'commander/commander-manager.php';
require_once $plugin_path . 'includes/functions.php';


function hoavic_register_post_type() {
    hoavic_add_post_type('commander', 'Chỉ huy', 'Chỉ huy', 'chi_huy');
    hoavic_add_post_type('item', 'Đạo cụ', 'Đạo cụ', 'dao_cu', true, false);
    hoavic_add_post_type('troop', 'Lính', 'Lính', 'linh');
}
add_action('init', 'hoavic_register_post_type');

function hoavic_register_taxonomy() {
    hoavic_add_tax('civilization', ['commander'], 'Nền văn minh', 'Nền văn minh', 'nen_van_minh');
    hoavic_add_tax('rarity', ['commander'], 'Độ hiếm', 'Độ hiếm', 'do_hiem');
    hoavic_add_tax('unit_troop', ['commander'], 'Loại đơn vị', 'Loại đơn vị', 'loai_don_vi');
    hoavic_add_tax('background', ['commander'], 'Bối cảnh', 'Bối cảnh', 'boi_canh');

    hoavic_add_tax('item_type', ['item'], 'Loại Đạo cụ', 'Loại Đạo cụ', 'loai_dao_cu');
}

add_action('init', 'hoavic_register_taxonomy');


function gameapp_style_enqueue() {
    wp_register_style( 'gameapp-style', plugin_dir_url(__FILE__) . 'gameapp.css' );
	wp_enqueue_style( 'gameapp-style' );
}
add_action( 'admin_enqueue_scripts', 'gameapp_style_enqueue' );