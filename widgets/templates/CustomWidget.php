<?php
/**
 * Custom Wordpress Widget
 * Created By: Tyler Baumler
 * Date: 2018-12-15
 */

class CustomWidget extends WP_Widget {

  public function __construct() {
    parent::__construct(
      // Base ID of your widget
      'custom_widget',

      // Widget name will appear in UI
      __('Custom Widget', 'wpb_widget_domain'),

      // Widget description
      array( 'description' => __( 'Just a custom simple widget, uses ACF', 'wpb_widget_domain' ), )
    );
  }

  // Creating widget front-end
  public function widget($args, $instance) {
    // widget id needed for ACF in the widget template file
    $widget_id = 'widget_' . $args['widget_id'];
    include_once 'custom_widget.php';
    /*$title = apply_filters( 'widget_title', $instance['title'] );

    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }

    // This is where you run the code and display the output
    echo $args['after_widget'];*/
  }

  // Widget backend
  public function form($instance) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'wpb_widget_domain' );
    }
    // Admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }

  // Updating widget replacing old instances with new
  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }

}

//registering my widget so its available in the back-end
add_action('widgets_init', function() {
  register_widget('CustomWidget');
});
