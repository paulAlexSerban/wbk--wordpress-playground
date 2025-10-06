<?php
/**
 * WordPress Full Site Editing Practice Theme Functions
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue theme styles
 */
function wp_fse_practice_enqueue_styles() {
    // Enqueue parent theme stylesheet
    wp_enqueue_style(
        'twentytwentyfive-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get('Version')
    );

    // Enqueue child theme stylesheet
    wp_enqueue_style(
        'wp-fse-practice-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('twentytwentyfive-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'wp_fse_practice_enqueue_styles');

/**
 * Theme setup function
 */
if (!function_exists('wp_fse_practice_setup')) {
    function wp_fse_practice_setup() {
        // Add theme support for block styles
        add_theme_support('wp-block-styles');
        
        // Add support for custom line height
        add_theme_support('custom-line-height');
        
        // Add support for custom units
        add_theme_support('custom-units');
        
        // Add support for responsive embeds
        add_theme_support('responsive-embeds');
        
        // Add support for experimental link color
        add_theme_support('experimental-link-color');
        
        // Add support for post thumbnails
        add_theme_support('post-thumbnails');
        
        // Set featured image sizes
        set_post_thumbnail_size(1200, 630, true);
        add_image_size('fse-practice-medium', 600, 400, true);
        add_image_size('fse-practice-small', 300, 200, true);
    }
}
add_action('after_setup_theme', 'wp_fse_practice_setup');

/**
 * Register pattern categories
 */
function wp_fse_practice_pattern_categories() {
    register_block_pattern_category(
        'wp-fse-practice',
        array(
            'label'       => __('FSE Practice', 'wp-fse-practice'),
            'description' => __('Custom patterns for FSE Practice theme.', 'wp-fse-practice'),
        )
    );
}
add_action('init', 'wp_fse_practice_pattern_categories');

/**
 * Customize excerpt length
 */
function wp_fse_practice_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'wp_fse_practice_excerpt_length');

/**
 * Customize excerpt more text
 */
function wp_fse_practice_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'wp_fse_practice_excerpt_more');

/**
 * Add custom body classes
 */
function wp_fse_practice_body_classes($classes) {
    $classes[] = 'fse-practice-theme';
    
    if (is_page_template('custom-home.html')) {
        $classes[] = 'custom-home-template';
    }
    
    return $classes;
}
add_filter('body_class', 'wp_fse_practice_body_classes');