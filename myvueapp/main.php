<?php
/*
Plugin Name: A Vue Plugin
Description: Testing vue.js in a WordPress environment.
Version: 2.0
Author: Shoive
*/

if (!defined('ABSPATH')) {
    exit;
}

function vueAdminMenuPage()
{
    add_menu_page(
        __('Vue Data'),             // Page title
        __('Staking Rewards'),      // Menu title
        'manage_options',           // Capability required to access
        'verus-vue',                // Menu slug
        'verus_vue_render_content', // Callback function to render content
        'dashicons-admin-plugins',  // Icon URL or dashicon class
        10
    );
}
add_action('admin_menu', 'vueAdminMenuPage');

function verus_vue_render_content()
{
    ?>
    <h1>Verus Blocks</h1>
    <div id=""></div>
    <?php
}

function admin_enqueue_vue_scripts($hook)
{
    if ('toplevel_page_verus-vue' === $hook) {
        wp_enqueue_script('app-script', plugins_url('/verusapi/dist/assets/index-DlL3kdpF.js', __FILE__), array(), null, true);
        wp_enqueue_style('app-style', plugins_url('/verusapi/dist/assets/index-DShP3oHr.css', __FILE__));
    }
}
add_action('admin_enqueue_scripts', 'admin_enqueue_vue_scripts');

function verus_vue_render_frontend()
{
    return '<div id="plugin-verusvueapp"></div>';
}

add_shortcode('verus-vue', 'verus_vue_render_frontend');

function front_enqueue_vue_scripts()
{
    wp_enqueue_script('app-script', plugins_url('/dist/assets/index-DlL3kdpF.js', __FILE__), array(), null, true);
    wp_enqueue_style('app-style', plugins_url('/dist/assets/index-DShP3oHr.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'front_enqueue_vue_scripts');
