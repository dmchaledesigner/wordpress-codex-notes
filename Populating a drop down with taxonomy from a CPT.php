Populating a drop down with taxonomy from a CPT

WE are going to populate a drop down menu in a select box in a form with a taxonomy of categories with a CPT.

First we register a CPT and create a taxonomy for this CPT.

Code for CPT and matching taxonomy...




// Registering Jobs CPT

function create_post_type() {
    register_post_type( 'joblistings',
        array(
            'labels' => array(
                'name' => __( 'joblistings' ),
                'singular_name' => __( 'joblistings' )
            ),
        'public' => true,
        'menu_position' => 20,
        'rewrite' => array('slug' => 'reviews')
        )
    );
}
 
add_action( 'init', 'create_post_type' );





// registering taxonomy for jobs


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



    ...Now in our dashboard we should have a CPT call 'joblistings 'with the option of adding to the taxonomy called 'sectors'.
When we go into our 'joblistings' CPT we have a link for 'Sectors'. This is where we add our categorys which will be populating the form.
Add a number of categories for the Sector taxonomy. Add a post....on the left hand side we can now select one of the categories we created.



THE HTML...

This is what a html populated form looks like

<form action="">
<select name="cars">
<option value="volvo">Volvo</option>
<option value="saab">Saab</option>
<option value="fiat">Fiat</option>
<option value="audi">Audi</option>
</select>
</form>

</body>
</html>


The idea is that we make the option values dynamic, so we take our categories(taxonomy) from the CPT and input them into this HTML using this code

<div class="styled public-sector">

                                                                <?php 

                                                                $args = array(
                                                                            'type'      =>  'joblistings',
                                                                            'taxonomy'  =>  'sectors',
                                                                            'order' =>'dsc',
                                                                            'hide_empty' => 0
                                                                );
                                                                $sectors = get_categories($args);

                                                                if($sectors){
                                                                    echo '<select name="sector" class="sector">';
                                                                    foreach($sectors as $sector){
                                                                        echo '<option value="'.$sector->slug.'">'.$sector->name.'</option>';
                                                                    }
                                                                    echo '</select>';
                                                                }

                                                                ?>

                                                </div>





