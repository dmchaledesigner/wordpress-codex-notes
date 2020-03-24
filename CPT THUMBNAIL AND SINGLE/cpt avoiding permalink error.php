add_action( 'init', 'News_register' );
function News_register() {
  $labels = array(
    'name' => _x('News', 'post type general name'),
    'singular_name' => _x('News', 'post type singular name'),
    'add_new' => _x('Add New', 'News'),
    'add_new_item' => __('Add New News'),
    'edit_item' => __('Edit News'),
    'new_item' => __('New News'),
    'all_items' => __('All News'),
    'view_item' => __('View News'),
    'search_items' => __('Search News'),
    'not_found' =>  __('No News found'),
    'not_found_in_trash' => __('No News found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'News'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true, 
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => false,
    'capability_type' => 'post',
    'hierarchical' => false,
    'has_archive' => true,
     'supports'  =>  array('title',
                                                    'editor',
                                                    'excerpt',
                                                    'trackbacks',
                                                    'custom-fields',
                                                    'comments',
                                                    'revisions',
                                                    'thumbnail',
                                                    'author',
                                                    'page-attributes' )
  );
  register_post_type('News',$args);
}


// Flush rewrite rules to add "review" as a permalink slug
function my_rewrite_flush() {
    News_register();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );





// Flush permalink structure
flush_rewrite_rules();