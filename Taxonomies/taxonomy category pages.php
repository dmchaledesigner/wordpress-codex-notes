taxonomy category pages

If we have a series of pages that link to categories that then show the list of terms.
What we need to do is create a CPT, with a taxonomy and add terms associated with it.
In each category term we have posts which when clicked will display a single post type.

Create a CPT called Projects.
Create a Custom taxonomy called Porfolio.
Create Categories for the Portfolio ie. Commerical, Industrial etc
Create Posts for each Term (Name for category of a taxonomy),


-------------------------
THE CPT AND TAXONOMY
-------------------------

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



// Register the project taxonomy for projects
function portfolio_taxonomy() {
   register_taxonomy(
    'portfolio',
    'projects',
    array(
        'hierarchical' => true,
        'label' => 'Portfolio',
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio')
    )
    //end register taxonomy
    );

}
 
add_action( 'init', 'portfolio_taxonomy' );


Now that we have our CPT and Taxonomy registered in the functions file,
we need to create pages for each Term.



-------------------------
THE TEMPLATE PAGES and TERMS
-------------------------



If we have a Term in our taxonomy called Commercial 
We need to create a page template. We will do this for every Taxonomy Term.
The reason for this is that when a Term link is clicked, it will bring you to this template page,
that will show all posts related to this term. 

Create a pages wordpress and assign a new template for each page.
In each of these pages we will be calling the list of taxonomy terms ONLY
associated with the term.

So within our Commerical Template we will call this code which simply says,
In the CPT called Projects, we want to access the Portfolio taxonomy,
and show only the list of posts from the slug of the Term called Commercial.

<?php
$args = array(
'post_type' => 'Projects',
'order' => 'ASC', 

'tax_query' => array(
                            array(
                              'taxonomy' => 'portfolio',
                              'field' => 'slug',
                              'terms' => 'commerical',
                            )
                          )
                        );

$terms = new WP_Query( $args );
                        
if( $terms->have_posts() ) {
while( $terms->have_posts() ) {
$terms->the_post();
?>

<div class="col span_3 boxholder">
<div class="thumbwrapper">
<a href="<?php the_permalink();?>"><?php the_title(); ?></a>                
<?php the_post_thumbnail(); ?>
</div>
</div>

<?php
}
 }
else {
echo 'Oh ohm no products!';
 }
wp_reset_postdata();
?>



-------------------------
THE TERMS and Posts
-------------------------

In wordpress, go to our taxonomy and create new terms posts for Commercial etc.
Give each term a number of posts, added a title, featured image.

Go back into wordpress and create several pages for our term lists.
Assign the Commercial template to a page called Commercial etc.



-------------------------
THE Projects Page
-------------------------

Now that we have our Taxonomy Terms list pages created, we move onto the the Projects page,
were we call in each of the template page we created with a page loop.

This will display all our Taxonomy Terms in a list and will link to the TERM LISTS.

Create a page called Projects and mark down the ID of each page we created.

Create a page template called projects and assign it to the wordpress page called Projects.

In our Projects.php file we called this code...


<?php
$args=array(
 'orderby' =>'parent',
'order' =>'asc',
 'post_type' =>'page',
 'posts_per_page' => '-1',
'post__in' => array(1112, 1116, 1118, 1120, 1123, 1125, 1127, 1130, 1132, 1134, 1136, 1138),
                               );

$page_query = new WP_Query($args); ?>
                               
<?php while ($page_query->have_posts()) : $page_query->the_post(); ?>


<div class="col span_3 boxholder">
<div class="thumbwrapper">
<a href="<?php the_permalink();?>"><?php the_title(); ?></a>                
<?php the_post_thumbnail(); ?>
</div>
</div>

<?php
endwhile; 
?>



wp_reset_postdata();
?>



Assign the Projects page to the main menu and all should (hopefully!) be working without fail.


-------------------------
Single and Archive templates
-------------------------

Copy the single.php file and archive templates and rename
to single-cpt.php and archive-cpt.php
In this case they are now single-projects.php and archive-projects.php respectively.

If we add a div inside these files and add simple text, we will see when we reload the page,
that the text we placed is now present. This means that wordpress is picking up our single page
associated with the CPT.

Make your changes / amendments as you please and you have a CPT with a custom single post template.


