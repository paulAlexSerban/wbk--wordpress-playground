<?php get_header(); ?>

<?php 
    while(have_posts()) {
      the_post(); ?>
      <h2>
        <?php the_title(); ?>
      </h2>
      <div class="page-content">
        <!-- <?php the_content(); ?> -->
        <?php wp_list_pages()?>
      </div>
<?php 
    }?>

<?php get_footer(); ?>