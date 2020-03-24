CPT, Taxonomies and WP-Query

1. Create the CPT

// register a custom post type called 'animals'
<?php
function wptp_create_post_type() {
    $labels = array( 
        'name' => __( 'Animals' ),
        'singular_name' => __( 'animal' ),
        'add_new' => __( 'New animal' ),
        'add_new_item' => __( 'Add New animal' ),
        'edit_item' => __( 'Edit animal' ),
        'new_item' => __( 'New animal' ),
        'view_item' => __( 'View animal' ),
        'search_items' => __( 'Search animals' ),
        'not_found' =>  __( 'No animals Found' ),
        'not_found_in_trash' => __( 'No animals found in Trash' ),
    );
    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array(
            'title', 
            'editor', 
            'excerpt', 
            'custom-fields', 
            'thumbnail',
            'page-attributes'
        ),
        'taxonomies' => array( 'post_tag', 'category'), 
    );
    register_post_type( 'animal', $args );
} 
add_action( 'init', 'wptp_create_post_type' ); ?>



2. Add the Taxonomy

// register a taxonomy called 'Animal Family'
<?php function wptp_register_taxonomy() {

    register_taxonomy( 'animal_cat', 'animal',
        array(
            'labels' => array(
                'name'              => 'Animal Families',
                'singular_name'     => 'Animal Family',
                'search_items'      => 'Search Animal Families',
                'all_items'         => 'All Animal Families',
                'edit_item'         => 'Edit Animal Families',
                'update_item'       => 'Update Animal Family',
                'add_new_item'      => 'Add New Animal Family',
                'new_item_name'     => 'New Animal Family Name',
                'menu_name'         => 'Animal Family',
            ),
            'hierarchical' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'rewrite' => array( 'slug' => 'animal-family' ),
            'show_admin_column' => true
        )
    );
}
add_action( 'init', 'wptp_register_taxonomy' ); ?>





3. Call in Use WP_query to call the loop with the content

<?php
// now run a query for each animal family
foreach( $terms as $term ) {
 
    // Define the query
    $args = array(
        'post_type' => 'animal',
        'animal_cat' => $term->slug
    );
    $query = new WP_Query( $args );
             
    // output the term name in a heading tag                
    echo'<h2>' . $term->name . '</h2>';
     
    // output the post titles in a list
    echo '<ul>';
     
        // Start the Loop
        while ( $query->have_posts() ) : $query->the_post(); ?>
 
        <li class="animal-listing" id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
         
        <?php endwhile;
     
    echo '</ul>';
     
    // use reset postdata to restore orginal query
    wp_reset_postdata();
 
} ?>





In our $args we can also do the following...


Display posts tagged with bob, under people custom taxonomy:

<?php
$args = array(
    'post_type' => 'post',
    'people'    => 'bob',
);
$query = new WP_Query( $args ); ?>





Display posts tagged with bob, under people custom taxonomy, using tax_query:

<?php
$args = array(
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'people',
            'field'    => 'slug',
            'terms'    => 'bob',
        ),
    ),
);
$query = new WP_Query( $args ); ?>





