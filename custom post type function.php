
// CPT News items
add_action( 'init', 'news' );
function news() {
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
    'not_found' =>  __('No news found'),
    'not_found_in_trash' => __('No News found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'News'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
     'menu_icon' => 'dashicons-portfolio',
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
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 132, 133, true );





// CPT Featured Jobs
add_action('init', 'FeaturedJobs');

function FeaturedJobs(){
    $Jobs_args = array(
        'label' => __('Featured Jobs'),
        'singular_label' => __('Featured Jobs'),
        'public'    =>  true,
        'jobs_position' => 20,
        'show_ui'   =>  true,
        'capability_type'   =>  'post',
        'hierarchical'  =>  false,
        'has_archive' => true,
        'rewrite' => array('slug' => 'featured'),
        'rewrite'   =>  true,
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

        register_post_type('featured', $Jobs_args);
}
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 132, 133, true );