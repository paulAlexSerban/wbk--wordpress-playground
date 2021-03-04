  <?php get_header(); ?>
  <main class="main__base">

    <?php 
    while(have_posts()) {
      the_post(); 
      $content = str_replace('<p', '<p class="post__paragraph"', get_the_content());?>
    <article class="post__base">
      <h2 class="post__title">
        <a class="post__title-link" href="<?php the_permalink(); ?>">
          <?php the_title(); ?></a>
      </h2>
      <div class="post__content">
        <?php echo $content ?>
      </div>
    </article>
    <?php }?>

  </main>

  <?php get_footer(); ?>