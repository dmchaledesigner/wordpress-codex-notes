Flushing

In the event of permainks being changed. Say from default to post-name etc.
we need to have a redirection of links from one to the other.
Thats where 'flushing' of the perminks comes in.
In some cases, goin into settings=>perminks and saving twice works,
however, when custom post types are used we need go to our functions file for this.

Firstly, when we create a custom post type, make sure we write the slug first.
When included in the CPT it tells that particular CPT to rewrite independently of the rest of the site.

add this to the $args array...
       <?php 'rewrite' => array('slug' => 'recipes'), ?>

If we are using a function containing multiple CPT's we need to add this flush to the end of the CPT function..
See below as example,

<?php

function my_custom_posttypes() {
    
    $labels = array(
        'name'               => 'Testimonials',
        'singular_name'      => 'Testimonial',
        'menu_name'          => 'Testimonials',
        'name_admin_bar'     => 'Testimonial',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Testimonial',
        'new_item'           => 'New Testimonial',
        'edit_item'          => 'Edit Testimonial',
        'view_item'          => 'View Testimonial',
        'all_items'          => 'All Testimonials',
        'search_items'       => 'Search Testimonials',
        'parent_item_colon'  => 'Parent Testimonials:',
        'not_found'          => 'No testimonials found.',
        'not_found_in_trash' => 'No testimonials found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-id-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonials' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail' )
    );
    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'my_custom_posttypes' );

// Flush rewrite rules to add "review" as a permalink slug
function my_rewrite_flush() {
    my_custom_posttypes();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

?>


Now what we need to do to flush the entire site is to add this to our functions file

// Flush permalink structure
<?php flush_rewrite_rules(); ?>


Save and update. Then go to permainks, change to the desired preset and refresh the site.
All done!

