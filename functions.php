<?php 
  function quietTimes_files() {
    wp_enqueue_script('quietTimes_main_js', get_theme_file_uri('/build/scripts-bundle.js'), NULL, '1.0', true);
    wp_enqueue_style('quietTimes_main_styles', get_stylesheet_uri());
  }

  add_action('wp_enqueue_scripts', 'quietTimes_files');

  function quietTimes_features() {
    add_theme_support('title-tag');
  }

  add_action('after_setup_theme', 'quietTimes_features')
?>