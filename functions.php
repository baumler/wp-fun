<?php

include_once 'inc/global_vars.php';

/**
 * THEME SETUP
 */
function theme_setup() {
  global $color_palette;

  register_nav_menus(array(
      'primary' => __('Primary Menu'),
  ));

  add_theme_support( 'custom-logo', array(
      'height'      => 240,
      'width'       => 240,
      'flex-height' => true,
  ) );

  // Add support for custom color scheme in wysiwyg
  add_theme_support( 'editor-color-palette', $color_palette );
}
add_action( 'after_setup_theme', 'theme_setup' );


/**
 * ACF JS
 */
function my_acf_color_palette_js() {
  global $color_palette;

  $color_hex = [];
  foreach ($color_palette as $color) {
    array_push($color_hex, $color['color']);
  }
?>
  <script>
    (function($) {
      acf.add_filter('color_picker_args', function( args, $field ){
        args.palettes = JSON.parse('<?= addslashes(json_encode($color_hex)) ?>');

        return args;
      });
    })(jQuery);
  </script>
<?php
}
add_action('acf/input/admin_footer', 'my_acf_color_palette_js');

/**
 * ACF CSS
 */
function my_acf_color_palette_css() {
  global $color_palette;

  $count = count($color_palette);
  $rows = ceil($count / 8);
?>
<style type="text/css">
  .iris-border .iris-palette-container {
    display: flex;
    flex-wrap: wrap;
    width: 80% !important;
  }

  .iris-palette {
    float: none !important;
    min-width: 20px;
    min-height: 20px;
    margin: 3px 3px 0 0 !important;
  }

  .iris-strip {
    height: 100% !important;
  }

  .iris-picker {
    height: <?php echo (200 + ($rows * 23)) . 'px' ?> !important;
    padding-bottom: 15px !important;
  }
</style>
<?php
}
add_action('acf/input/admin_head', 'my_acf_color_palette_css');

/**
 * Add custom colors to page head
 */
function custom_colors_head() {
  global $color_palette;

  ?>
  <style type="text/css" colors>
    <?php foreach ($color_palette as $color) { ?>
    .has-<?=$color['slug']?>-color {
      color: <?=$color['color']?>;
    }
    .has-<?=$color['slug']?>-background-color {
      background-color: <?=$color['color']?>;
    }
    .has-<?=$color['slug']?>-border-color {
      border-color: <?=$color['color']?>;
    }
    <?php } ?>
  </style>
<?php
}
add_action('wp_head', 'custom_colors_head');
