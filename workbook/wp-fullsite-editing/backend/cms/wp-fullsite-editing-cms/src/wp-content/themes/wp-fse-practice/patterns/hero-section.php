<?php
/**
 * Title: Hero Section
 * Slug: wp-fse-practice/hero-section
 * Categories: wp-fse-practice
 * Description: A compelling hero section with gradient background and call-to-action buttons
 * Keywords: hero, cta, gradient, buttons
 *
 * @package wp-fse-practice
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem","left":"2rem","right":"2rem"}}},"gradient":"vivid-cyan-blue-to-vivid-purple","className":"custom-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull custom-hero has-vivid-cyan-blue-to-vivid-purple-gradient-background has-background" style="padding-top:6rem;padding-right:2rem;padding-bottom:6rem;padding-left:2rem">
    <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"x-large","textColor":"base"} -->
    <h1 class="wp-block-heading has-text-align-center has-base-color has-text-color has-x-large-font-size">Build Amazing Websites</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","fontSize":"large","textColor":"base"} -->
    <p class="has-text-align-center has-base-color has-text-color has-large-font-size">Experience the power of WordPress Full Site Editing with custom blocks, templates, and unlimited possibilities.</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--medium)">
        <!-- wp:button {"backgroundColor":"accent","textColor":"base","className":"custom-button"} -->
        <div class="wp-block-button custom-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button">Start Building</a></div>
        <!-- /wp:button -->

        <!-- wp:button {"backgroundColor":"transparent","textColor":"base","style":{"border":{"width":"2px"}},"borderColor":"base","className":"is-style-outline"} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-transparent-background-color has-text-color has-background has-border-color has-base-border-color wp-element-button" style="border-width:2px">Learn More</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->