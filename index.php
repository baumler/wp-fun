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

if (get_field('theme_color')) { ?>
  <p style="color:<?php echo get_field('theme_color') ?>">theme color = <?php echo get_field('theme_color') ?></p>
<?php }


if (get_field('editor')) { ?>
  <?php echo get_field('editor') ?>
<?php }

?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>

