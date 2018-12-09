<?php

get_header(); ?>

<?php if ( have_posts() ) : ?>

  <?php if ( is_home() && ! is_front_page() ) : ?>
    <header>
      <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    </header>
  <?php endif; ?>

  <?php
  while ( have_posts() ) : the_post();
    the_title( '<h1 class="entry-title">', '</h1>' );

    the_content();
  endwhile;

else :
endif;
?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>

