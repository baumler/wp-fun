<?php

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
  ?>
  <style type="text/css">
    .client-colors-only .acf-color-picker .iris-border .iris-palette-container {
      display: flex;
      flex-wrap: wrap;
      position: relative !important;
      top: auto !important;
      bottom: auto !important;
      left: auto !important;
      right: auto !important;
      padding: 6px 0 0 6px;
    }

    .client-colors-only .acf-color-picker .iris-picker-inner {
      display: none !important;
    }

    .client-colors-only .acf-color-picker .iris-palette {
      float: none !important;
      width: 28px !important;
      height: 28px !important;
      margin: 0 6px 6px 0 !important;
    }

    .client-colors-only .acf-color-picker .iris-picker {
      width: 100% !important;
      height: auto !important;
      padding: 0 !important;
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
