<?php get_header(); ?>
<p>this is single.php</p>
<?php
while (have_posts()) {
    the_post(); ?>
<h2> <?php the_title(); ?></h2>
<?php the_content();
}
?>

<?php get_footer(); ?>