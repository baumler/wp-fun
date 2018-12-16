<?php
/**
 * The template for the sidebar containing the main widget area
 */
?>

<aside id="secondary" class="sidebar widget-area" role="complementary">
  <?php if ( is_active_sidebar( 'sidebar-index' )  ) : ?>
    <?php dynamic_sidebar( 'sidebar-index' ); ?>
  <?php endif; ?>
</aside><!-- .sidebar .widget-area -->
