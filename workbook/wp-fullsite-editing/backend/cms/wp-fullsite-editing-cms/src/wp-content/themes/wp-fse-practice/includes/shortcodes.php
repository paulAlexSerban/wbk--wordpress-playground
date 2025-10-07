<?php
/**
 * Services Shortcodes
 * 
 * @package Phoenix_Art_School
 */

// Prevent direct access
if (!defined(constant_name: 'ABSPATH')) {
    exit;
}

// /**
//  * Shortcode to display service fields
//  * Usage: [service_fields]
//  */
// function phoenix_service_fields_shortcode(): string {
//     global $post;
//     if (!$post || get_post_type($post) !== 'services') {
//         return '';
//     }
    
//     $output = '';
//     $fields = array(
//         'service_price' => 'Price', 
//     );
    
//     foreach ($fields as $field => $label) {
//         $value = get_post_meta($post->ID, $field, true);
//         if (!empty($value)) {
//             $formatted_value = phoenix_format_custom_field_value(field_name: $field, value: $value);
//             $output .= '<p><strong>' . $label . ':</strong> ' . esc_html($formatted_value) . '</p>';
//         }
//     }
    
//     return $output;
// }
// add_shortcode('service_fields', 'phoenix_service_fields_shortcode');