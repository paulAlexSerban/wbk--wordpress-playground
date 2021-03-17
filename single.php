<?php 
get_template_part( './theme.ui.ux/content/layout/header/header' );
themeFiles('/single/');
?>

<?php 
    while(have_posts()) {
      the_post(); ?>
<h2>
  <?php the_title(); ?>
</h2>
<?php the_content(); ?>
<?php }?>

<?php get_template_part( './theme.ui.ux/content/layout/footer/footer' ); ?>