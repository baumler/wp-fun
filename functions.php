<?php

include_once 'inc/global_vars.php';
include_once 'inc/acf_custom.php';
include_once 'inc/custom_type_events.php';
include_once 'inc/custom_sidebars.php';
include_once 'widgets/widgets.php';

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


/** Add styles to classic editor (no plugin)
// custom editor dropdown
function add_style_select_buttons( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
// Register our callback to the appropriate filter
//add_filter( 'mce_buttons_2', 'add_style_select_buttons' );

//add custom styles to the WordPress editor
function my_custom_styles( $init_array ) {

  $style_formats = array(
    // These are the custom styles
    array(
      'title' => 'Red Button',
      'block' => 'span',
      'classes' => 'red-button',
      'wrapper' => true,
    ),
    array(
      'title' => 'Content Block',
      'block' => 'span',
      'classes' => 'content-block',
      'wrapper' => true,
    ),
    array(
      'title' => 'Highlighter',
      'block' => 'span',
      'classes' => 'highlighter',
      'wrapper' => true,
    ),
  );
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );

  return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
//add_filter( 'tiny_mce_before_init', 'my_custom_styles' );

// add the css to the admin to see editor styling
function custom_editor_styles() {
  add_editor_style('editor-styles.css');
}
//add_action('init', 'custom_editor_styles');

function custom_stylesheet() {
  wp_enqueue_style('editor-styles', get_template_directory_uri() . '/editor-styles.css');
}
//add_action( 'wp_enqueue_scripts', 'custom_stylesheet' );*/
/** END Add styles to classic editor (no plugin) */


// Add Quicktags to editor
function custom_quicktags() {

  if ( wp_script_is( 'quicktags' ) ) {
    ?>
    <script type="text/javascript">
      QTags.addButton( 'eg_green_text', 'GreenText', '<span class="text-green">', '</span>', '', 'Green Text' );
      QTags.addButton( 'eg_red_text', 'RedText', '<span class="text-red">', '</span>', '', 'Red Text' );
    </script>
    <?php
  }

}
add_action( 'admin_print_footer_scripts', 'custom_quicktags' );



// Change dashboard "Posts" to "Menu Items"
function cp_change_post_object() {
  $get_post_type = get_post_type_object('post');
  $labels = $get_post_type->labels;
  $labels->name = 'Menu Items';
  $labels->singular_name = 'Menu Item';
  $labels->add_new = 'Add Menu Item';
  $labels->add_new_item = 'Add Menu Item';
  $labels->edit_item = 'Edit Menu Item';
  $labels->new_item = 'Menu Item';
  $labels->view_item = 'View Menu Item';
  $labels->search_items = 'Search Menu Item';
  $labels->not_found = 'No Menu Items found';
  $labels->not_found_in_trash = 'No Menu Items found in Trash';
  $labels->all_items = 'All Menu Item';
  $labels->menu_name = 'Menu Items';
  $labels->name_admin_bar = 'Menu Items';
  // remove the editor
  remove_post_type_support( 'post', 'editor' );
}
add_action( 'init', 'cp_change_post_object' );
// change icon
function gowp_admin_menu() {
  global $menu;
  foreach ( $menu as $key => $val ) {
    if ( 'Menu Items' == $val[0] ) {
      $menu[$key][6] = 'dashicons-editor-table';
    }
  }

  // remove unused sections
  remove_meta_box( 'authordiv', 'post', 'normal' );
  remove_meta_box( 'linktargetdiv', 'link', 'normal' );
  remove_meta_box( 'linkxfndiv', 'link', 'normal' );
  remove_meta_box( 'linkadvanceddiv', 'link', 'normal' );
  remove_meta_box( 'postexcerpt', 'post', 'normal' );
  remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
  remove_meta_box( 'postcustom', 'post', 'normal' );
  remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
  remove_meta_box( 'commentsdiv', 'post', 'normal' );
}
add_action( 'admin_menu', 'gowp_admin_menu' );
