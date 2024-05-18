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

require_once $plugin_path . 'commander/commander-manager.php';

function gameapp_style_enqueue() {
    wp_register_style( 'gameapp-style', plugin_dir_url(__FILE__) . 'gameapp.css' );
	wp_enqueue_style( 'gameapp-style' );
}
add_action( 'admin_enqueue_scripts', 'gameapp_style_enqueue' );