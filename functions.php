<?php

include_once 'inc/global_vars.php';
include_once 'inc/acf_custom.php';

/**
 * THEME SETUP
 */
function theme_setup() {
  global $color_palette;

  register_nav_menus(array(
      'primary' => __('Primary Menu'),
  ));

  // Add support for custom color scheme in wysiwyg
  add_theme_support( 'editor-color-palette', $color_palette );
}
add_action( 'after_setup_theme', 'theme_setup' );
