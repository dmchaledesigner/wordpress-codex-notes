Populating a dropdown using CPT,  Taxonomies and Terms

In Afro jobs website we had a search area form which included keyword search, two drop down menus and a search (submit) button,
under the headings Occupation and Location.

These two dropdown menus were populated a single custom post type called Joblistings which was the umbrella for our taxonomies.
Within this CPT, we had two taxonomies, called Sector and Country.
In the Sector we would have all Sector related positions and, in Country, we will have jobs by Country they relate to.

REMEMBER: CTP => Taxonomy (category) => Term (category post).


1. Register the CPT
2. Add the taxonomies needed
3. Flush / Re-write (for permalinks)


1. CPT
            // Registering Jobs CPT

            function create_post_type() {
                    register_post_type( 'joblistings',
                    array(
                        'labels' => array(
                            'name' => __( 'Joblistings' ),
                            'singular_name' => __( 'Joblisting' )
                        ),
                    'public' => true,
                    'menu_position' => 20,
                    'rewrite' => array('slug' => 'reviews')
                    )
                );
            }
             
            add_action( 'init', 'create_post_type' );



2. Taxonomies

                // registering taxonomy for Sectors CPT


                function jobs_taxonomy() {
                   register_taxonomy(
                    'sectors',
                    'joblistings',
                    array(
                        'hierarchical' => true,
                        'label' => 'Sectors',
                        'query_var' => true,
                        'rewrite' => array('slug' => 'sectors')
                    )
                    );

                    // add the taxonomy for Country

                       register_taxonomy(
                        'country',
                        'joblistings',
                        array(
                            'hierarchical' => true,
                            'label' => 'Country',
                            'query_var' => true,
                            'rewrite' => array('slug' => 'country')
                        )
                        );

                }
                 
                add_action( 'init', 'jobs_taxonomy' );


3. Flush for CPT's

                // Flush rewrite rules to add "review" as a permalink slug
                function my_rewrite_flush() {
                    my_custom_posttypes();
                    flush_rewrite_rules();
                }





Now we have our CPT, remember to update of replace the CPT with a full CPT function like the below, to add more features
to the CPT.

eg.

function my_custom_posttypes() {

    // Testimonials Post type
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






Net thing we need to do is to add a few posts to each taxomony just to show a result when we are finished our coding.
Give our Sector Taxonomy 3 categories.

Listed Jobs
Corporate Jobs
Public Jobs
Humanitarian


Then for your Country taxonomy, 
add categories named after specific countrys.

Remember the posts in these categories are terms of the taxonomies!!!!





NOW our html.

on our home page we have a <form> element. In it we have the keyword search, which is an <input type> tag,
our drop down menus which are <select> tag and our search / submit buttons.

For this tutorial we of course are focusing on our dropdown.....the <select><option value> section.
A typical select drop down will look like this...

<select>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select>


We have to populate our two drop downs with the contents (categories) of our taxonomies from our CPT.


This is our form coded in html.
Note we have a small heading just over the keyword search, each of the dropdowns and the search button is just a button.
See below.....



<form class="search" id="jobsearch" method="get" action="http://afrojobs.ie"><!---ave added the ID here-->
 
                                                        <div class="field_wrapper" >
                                                        <h5>Keyword Search</h5>
                                                        <input type="text" class="searchinput" name="q" size="15" maxlength="800">
                                                        </div>

                                                        

                                                        <div class="field_wrapper">
                                                        <h5>OCCUPATION</h5>
                                                                        <div class="styled country">
                                                                            <select>
                                                                                  <option value="volvo">Volvo</option>
                                                                                  <option value="saab">Saab</option>
                                                                                  <option value="mercedes">Mercedes</option>
                                                                                  <option value="audi">Audi</option>
                                                                                </select>
                                                                        </div>
                                                    </div>


                                                        <div class="field_wrapper">
                                                        <h5>OCCUPATION</h5>
                                                                        <div class="styled country">
                                                                            <select>
                                                                                  <option value="volvo">Volvo</option>
                                                                                  <option value="saab">Saab</option>
                                                                                  <option value="mercedes">Mercedes</option>
                                                                                  <option value="audi">Audi</option>
                                                                                </select>
                                                                        </div>
                                                    </div>




                                                        <div class="field_wrapper submit">
                                                        <h5>&nbsp;</h5>
                                                        <input type="submit" value="SEARCH" class="tfbutton search">
                                                        </div>

 </form>


NOTE: The form has an ID which we will use to target this specific form when we call our query below.


Now for our php....
1. we create our argument
2. we create our query using the variable (remember WP_Query loop!!!)
3. write loop.
4. call (echo our select tag for opening and closing)

study this carefully..!!!!!! 


               for our sectors....

               <?php 
                                                     
                  $args = array(
                    'type'      =>  'joblistings',
                      'taxonomy'  =>  'sectors',
                       'hide_empty' => 0
                         );

                        $sectors = get_categories($args);
                                                                 
                          if($sectors){
                           echo '<select name="sector" form="jobsearch">';  //added form="jobsearch" here as per the ID now assigned to the form
                          foreach($sectors as $sector){
                          echo '<option value="'.$sector->slug.'">'.$sector->name.'</option>';
                           }
                           echo '</select>';
                           }
                           ?>


In our Argument ($args), we have,
1. called our custom post type. in this case "joblistings".
2. we have targetted our taxonomy and told it to hide any category that has 0 posts (terms) inside it.

3. Then we add get_categories with our argument to a variable of $sectors
4. We add an IF statement and echo the search form using the ID from the form and then use a  'string' to echo the populated taxonomy of Sectors.

This goes for the same with our other taxonomy, Countries.

Take a look and study the code, see how this is done. Take note of the 'foreach' part plural to singular $ or singular to singular.
ie. $sector as $sector ..... $country as $country.....see below for the second drop down

<?php 
                                                     
 $args = array(
  'type'      =>  'joblistings',
  'taxonomy'  =>  'country',
  'hide_empty' => 0
   );

  $country = get_categories($args);
                                                                 
   if($country){
   echo '<select name="sector" form="jobsearch">';//added form="jobsearch" here as per the ID now assigned to the form
   foreach($country as $country){
    echo '<option value="'.$country->slug.'">'.$country->name.'</option>';
    }
   echo '</select>';
   }
                                                                 
    ?>






Take note of learning about taxonomy, categories and terms!!!!
Your work is done here!!!

...for the moment :)