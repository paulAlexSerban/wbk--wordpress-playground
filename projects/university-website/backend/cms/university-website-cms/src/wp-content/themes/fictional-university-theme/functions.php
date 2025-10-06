<?php 

function root_styles(): void {
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/ui/dist/style.css'), [], '');
    wp_enqueue_style('university_main_scripts', get_theme_file_uri('/ui/dist/index.js'), [], '');
}
add_action('wp_enqueue_scripts', 'root_styles');