CPT with Taxonomy with Category added




// My Custom Codes

<?php 

function my_custom_posttypes() {

    // Testimonials Post type
    $labels = array(
        'name'               => 'Projects',
        'singular_name'      => 'Project',
        'menu_name'          => 'Projects',
        'name_admin_bar'     => 'Project',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Project',
        'new_item'           => 'New Project',
        'edit_item'          => 'Edit Project',
        'view_item'          => 'View Project',
        'all_items'          => 'All Projects',
        'search_items'       => 'Search Projects',
        'parent_item_colon'  => 'Parent Projects:',
        'not_found'          => 'No Projects found.',
        'not_found_in_trash' => 'No Projects found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'description'   => 'Holds our Projects and Project specific data',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-id-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'projects' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    );
    register_post_type( 'projects', $args );

       
}
add_action( 'init', 'my_custom_posttypes' );


?>


<?php 

// Register the project taxonomy for projects

function taxonomy_portfolio() {
  $labels = array(
    'name'              => _x( 'Portfolio Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Portfolio  Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Portfolio  Categories' ),
    'all_items'         => __( 'All Portfolio  Categories' ),
    'parent_item'       => __( 'Parent Portfolio  Category' ),
    'parent_item_colon' => __( 'Parent Portfolio  Category:' ),
    'edit_item'         => __( 'Edit Portfolio Category' ), 
    'update_item'       => __( 'Update Portfolio  Category' ),
    'add_new_item'      => __( 'Add New Portfolio  Category' ),
    'new_item_name'     => __( 'New Portfolio  Category' ),
    'menu_name'         => __( 'Portfolio Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'query_var' => true,
    'rewrite' => true,
  );







  register_taxonomy( 'portfolio_category', 'projects', $args );

  
}
add_action( 'init', 'taxonomy_portfolio', 0 ); ?>