<?php
/**
 * Custom Wordpress Widget
 * 50 / 50 split image and text blocks
 * Created By: Tyler Baumler
 * Date: 2018-12-16
 */

class ImageText5050 extends WP_Widget {
  public function __construct() {
    parent::__construct(
    // Base ID of your widget
      'image_text_50_50',

      // Widget name will appear in UI
      __('50/50 Split Image/Text', 'wpb_widget_domain'),

      // Widget description
      array( 'description' => __( 'Full width section with image on one half and text on the other.', 'wpb_widget_domain' ), )
    );
  }

  // Creating widget front-end
  public function widget($args, $instance) {
    include_once 'ImageText5050_template.php';
  }

  public function form($instance) {
    // set values for form
    $title = isset($instance['title']) ? $instance['title'] : __( 'New title', 'wpb_widget_domain' );
    $header = isset($instance['header']) ? $instance['header'] : __( 'Header', 'wpb_widget_domain' );

    // Admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'header' ); ?>"><?php _e( 'Header:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'header' ); ?>" name="<?php echo $this->get_field_name( 'header' ); ?>" type="text" value="<?php echo esc_attr( $header ); ?>" />
    </p>
    <?php
  }

  // Updating widget replacing old instances with new
  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['header'] = ( ! empty( $new_instance['header'] ) ) ? strip_tags( $new_instance['header'] ) : '';
    return $instance;
  }
}

//registering my widget so its available in the back-end
add_action('widgets_init', function() {
  register_widget('ImageText5050');
});
