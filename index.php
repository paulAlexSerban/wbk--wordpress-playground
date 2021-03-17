<?php get_template_part( './theme.ui.ux/content/layout/header/header' );?>
<?php themeFiles('/index/');?>

  <main class="index__main">
    <?php 

    while(have_posts()) {
      the_post(); 
      get_template_part( './theme.ui.ux/content/components/postExcerpt/postExcerpt' );
      }?>

  </main>

  <?php get_template_part( './theme.ui.ux/content/layout/footer/footer' ); ?>