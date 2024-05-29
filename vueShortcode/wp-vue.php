<?php
/**
 * Plugin Name: WordPress & Vue
 * Version: 1.0
 * Author: Shovie Hossain
 * Description: A demo on how to use Vue in WordPress.
 */


//Register Scripts to use 
function func_load_vuescripts()
{
    //wp_register_script('wpvue_vuejs', plugins_url('\dist\assets\index-GTf1oZOv.js', __FILE__), array(), null, true);
    wp_register_script('wpvue_vuejs', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js');
    //wp_register_script('wpvue_vuejs', plugins_url('/assets/v2Vue.js', __FILE__));
    wp_register_script('my_vuecode', plugins_url('vuecode.js', __FILE__), array('wpvue_vuejs'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'func_load_vuescripts');


// Add shortcode

function func_wp_vue()
{
    //Add Vue.js
    wp_enqueue_script('wpvue_vuejs');
    //Add custom code
    wp_enqueue_script('my_vuecode');

    //Build String
    $str = "<div id='divwpVue'>"
        . "Message from WordPress: {{ message }}"
        . "</div>";
    return $str;
}
add_shortcode('wp-vue', 'func_wp_vue');

//End shortcode
