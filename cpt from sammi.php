

function offers_register() {
  
  $labels = array(
    'name' => _x('Offers', 'post type general name'),
    'singular_name' => _x('Offer', 'post type singular name'),
    'add_new' => _x('Add New', 'Offer'),
    'add_new_item' => __('Add New Offer'),
    'edit_item' => __('Edit Offer'),
    'new_item' => __('New Offer'),
    'all_items' => __('All Offers'),
    'view_item' => __('View Offer'),
    'search_items' => __('Search Offers'),
    'not_found' =>  __('No offers found'),
    'not_found_in_trash' => __('No offers found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Offers'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true, 
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'has_archive' => true
  );
  register_post_type('offers',$args);
}
add_action( 'init', 'offers_register' );