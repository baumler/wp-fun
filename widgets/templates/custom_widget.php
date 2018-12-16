<?php

echo 'Hello, World!<br/>';
echo $instance['title'] . '<br/>';
echo 'I am a custom widget you can place anywehre!<br/>';
echo get_field( 'custom_text', $widget_id ); // ACF item
?>
<br/>
<img src="<?=get_field( 'custom_image', $widget_id)['url']?>" />
