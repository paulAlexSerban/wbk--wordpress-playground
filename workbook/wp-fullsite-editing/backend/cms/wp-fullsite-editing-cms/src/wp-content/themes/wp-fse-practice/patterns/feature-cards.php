<?php
/**
 * Title: Feature Cards
 * Slug: wp-fse-practice/feature-cards
 * Categories: wp-fse-practice
 * Description: Three feature cards with icons and descriptions in a responsive layout
 * Keywords: features, cards, icons, services
 *
 * @package wp-fse-practice
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">
    <!-- wp:heading {"textAlign":"center","fontSize":"x-large","textColor":"primary","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|large"}}}} -->
    <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--large)">Why Choose Our FSE Theme?</h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}},"border":{"width":"2px"}},"borderColor":"primary","backgroundColor":"base","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-border-color has-primary-border-color has-base-background-color has-background" style="border-width:2px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
                <!-- wp:paragraph {"align":"center","fontSize":"x-large"} -->
                <p class="has-text-align-center has-x-large-font-size">🎨</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large","textColor":"primary"} -->
                <h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-large-font-size">Custom Design</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">Beautiful, responsive designs that work perfectly on all devices. Customize colors, fonts, and layouts with ease.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}},"border":{"width":"2px"}},"borderColor":"secondary","backgroundColor":"base","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-border-color has-secondary-border-color has-base-background-color has-background" style="border-width:2px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
                <!-- wp:paragraph {"align":"center","fontSize":"x-large"} -->
                <p class="has-text-align-center has-x-large-font-size">⚡</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large","textColor":"secondary"} -->
                <h3 class="wp-block-heading has-text-align-center has-secondary-color has-text-color has-large-font-size">Fast Performance</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">Lightning-fast loading times and optimized code ensure your visitors have the best experience possible.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}},"border":{"width":"2px"}},"borderColor":"accent","backgroundColor":"base","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-border-color has-accent-border-color has-base-background-color has-background" style="border-width:2px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">
                <!-- wp:paragraph {"align":"center","fontSize":"x-large"} -->
                <p class="has-text-align-center has-x-large-font-size">🔧</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large","textColor":"accent"} -->
                <h3 class="wp-block-heading has-text-align-center has-accent-color has-text-color has-large-font-size">Easy to Use</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">No coding required! Use the visual editor to create stunning pages with drag-and-drop simplicity.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->