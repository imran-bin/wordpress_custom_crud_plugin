<?php
/*
  
Plugin Name: Prince-Imran 
 
*/

function custom_document_title($title) {
    // Set your custom title
    $custom_title = "Prince_Imran";
    
    return $custom_title;
}

add_filter('pre_get_document_title', 'custom_document_title');
