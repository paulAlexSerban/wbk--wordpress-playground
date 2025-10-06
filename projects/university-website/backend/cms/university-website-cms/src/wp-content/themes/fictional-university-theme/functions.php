<?php

function university_features()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'university_features');






function vendor_assets()
{
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font_awsome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}



function root_styles()
{
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/ui/dist/style.css'), [], '');
    wp_enqueue_script('university_main_scripts', get_theme_file_uri('/ui/dist/index.js'), [], '', true);
}


add_action('wp_enqueue_scripts', 'vendor_assets');
add_action('wp_enqueue_scripts', 'root_styles');

