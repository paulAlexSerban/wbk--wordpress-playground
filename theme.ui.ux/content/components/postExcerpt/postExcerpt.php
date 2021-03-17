<?php 
  $content = str_replace('<p', '<p class="post__paragraph"', get_the_content());
  themeFiles('/postExcerpt/');
?>
<article class="post__base" data-component="PostExcerpt">
  <h2 class="post__title">
    <a class="post__title-link" href="<?php the_permalink(); ?>">
      <?php the_title(); ?></a>
  </h2>
  <div class="post__content">
    <?php echo $content ?>
  </div>
</article>