<?php
/*
Plugin Name: Word-count
Text Domain: word-count
Domain Path: /languages/
*/

// register_activation_hook(__FILE__,"wordcount")
function wordcount_load_textdomain(){
    load_plugin_textdomain('word-count',false,dirname(__FILE__)."/languages");
}

add_action("plugin_loaded","wordcount_load_textdomain");
add_filter('the_content','wordcount_count_words')


