<?php
/** Template Name: Home */

get_header();

if ( is_active_sidebar( 'sidebar-index' )  ) :
  dynamic_sidebar( 'sidebar-index' );
endif;

get_footer();
