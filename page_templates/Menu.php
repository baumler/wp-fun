<?php
/** Template Name: Menu */

get_header();

if ( is_active_sidebar( 'sidebar-menu' )  ) :
  dynamic_sidebar( 'sidebar-menu' );
endif;

get_footer();
