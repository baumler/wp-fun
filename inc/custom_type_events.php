<?php
// Register Custom Post Type
function custom_type_events() {
  $labels = array(
    'name'                  => 'Events',
    'singular_name'         => 'Event',
    'menu_name'             => 'Events',
    'name_admin_bar'        => 'Events',
    'archives'              => 'Event Archives',
    'attributes'            => 'Event Attributes',
    'parent_item_colon'     => 'Parent Event',
    'all_items'             => 'All Event',
    'add_new_item'          => 'Add New Event',
    'add_new'               => 'Add New',
    'new_item'              => 'New Event',
    'edit_item'             => 'Edit Event',
    'update_item'           => 'Update Event',
    'view_item'             => 'View Event',
    'view_items'            => 'View Event',
    'search_items'          => 'Search Event',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into event',
    'uploaded_to_this_item' => 'Uploaded to this event',
    'items_list'            => 'Events list',
    'items_list_navigation' => 'Events list navigation',
    'filter_items_list'     => 'Filter events list',
  );
  $args = array(
    'label'                 => 'Event',
    'description'           => 'Events',
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'custom-fields' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-tickets-alt',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    //'show_in_rest'          => true,
  );
  register_post_type( 'events', $args );

}
add_action( 'init', 'custom_type_events', 0 );


// Register Custom Taxonomy
function custom_event_type_taxonomy() {
  $labels = array(
    'name'                       => _x( 'Event Types', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Event Type', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Event Type', 'text_domain' ),
    'all_items'                  => __( 'All Event Type', 'text_domain' ),
    'parent_item'                => __( 'Parent Event Type', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Event Type:', 'text_domain' ),
    'new_item_name'              => __( 'New Event Type Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Event Type', 'text_domain' ),
    'edit_item'                  => __( 'Edit Event Type', 'text_domain' ),
    'update_item'                => __( 'Update Event Type', 'text_domain' ),
    'view_item'                  => __( 'View Event Type', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate event types with commas', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove event types', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Event Types', 'text_domain' ),
    'search_items'               => __( 'Search Event Type', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
    'no_terms'                   => __( 'No items', 'text_domain' ),
    'items_list'                 => __( 'Event types list', 'text_domain' ),
    'items_list_navigation'      => __( 'Event type list navigation', 'text_domain' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'event_type', array( 'events' ), $args );

}
add_action( 'init', 'custom_event_type_taxonomy', 0 );
