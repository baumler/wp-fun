<?php
// add sidebars
register_sidebar( array(
  'name'          => __( 'Home Template' ),
  'id'            => 'sidebar-index',
  'description'   => __( 'Add widgets here to appear on the home page template.' ),
  'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget'  => '</section>',
  /*'before_title'  => '<h2 class="widget-title">',
  'after_title'   => '</h2>',*/
) );

register_sidebar( array(
  'name'          => __( 'Menu Template' ),
  'id'            => 'sidebar-menu',
  'description'   => __( 'Add widgets here to appear on the menu page template.' ),
  'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget'  => '</section>',
) );
