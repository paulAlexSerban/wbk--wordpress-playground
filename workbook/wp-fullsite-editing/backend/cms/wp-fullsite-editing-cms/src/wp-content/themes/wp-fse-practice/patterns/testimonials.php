<?php
/**
 * Title: Customer Testimonials
 * Slug: wp-fse-practice/testimonials
 * Categories: wp-fse-practice
 * Description: Three customer testimonials in a responsive grid layout
 * Keywords: testimonials, reviews, customers, grid
 *
 * @package wp-fse-practice
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"backgroundColor":"base-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-2-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">
    <!-- wp:heading {"textAlign":"center","fontSize":"x-large","textColor":"primary","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|large"}}}} -->
    <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--large)">What Our Clients Say</h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
                <!-- wp:paragraph {"fontSize":"medium"} -->
                <p class="has-medium-font-size">"The Full Site Editing capabilities are incredible. Building custom layouts has never been easier!"</p>
                <!-- /wp:paragraph -->

                <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"backgroundColor":"primary"} -->
                <hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"/>
                <!-- /wp:separator -->

                <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"textColor":"primary"} -->
                <p class="has-primary-color has-text-color" style="font-weight:600">Sarah Johnson</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"small","textColor":"contrast"} -->
                <p class="has-contrast-color has-text-color has-small-font-size">Web Designer</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
                <!-- wp:paragraph {"fontSize":"medium"} -->
                <p class="has-medium-font-size">"Block patterns and template parts make creating consistent designs so much faster."</p>
                <!-- /wp:paragraph -->

                <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"backgroundColor":"primary"} -->
                <hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"/>
                <!-- /wp:separator -->

                <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"textColor":"primary"} -->
                <p class="has-primary-color has-text-color" style="font-weight:600">Mike Chen</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"small","textColor":"contrast"} -->
                <p class="has-contrast-color has-text-color has-small-font-size">Developer</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
                <!-- wp:paragraph {"fontSize":"medium"} -->
                <p class="has-medium-font-size">"The theme inheritance from Twenty Twenty-Five gives us a solid foundation to build upon."</p>
                <!-- /wp:paragraph -->

                <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"backgroundColor":"primary"} -->
                <hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small)"/>
                <!-- /wp:separator -->

                <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"textColor":"primary"} -->
                <p class="has-primary-color has-text-color" style="font-weight:600">Emma Davis</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"small","textColor":"contrast"} -->
                <p class="has-contrast-color has-text-color has-small-font-size">Content Creator</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->