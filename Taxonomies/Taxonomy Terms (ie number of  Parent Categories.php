To get the Terms (ie number of  Parent Categories of a taxonomy)...


<ul>
<?php
 $terms = get_terms("taxonomy-name");
$count = count($terms);
if ( $count > 0 ){


foreach ( $terms as $term ) {
 echo "<li>" ;
 echo $term->name;
  echo $term->description;
 echo "</li>";
 }

 }
?>

</ul>




 <?php

 // alternatively we can use TAX QUERY to call all posts in a specfic term 



                        $args = array(
                          'post_type' => 'Projects',
                          'order' => 'ASC',

                          'tax_query' => array(
                            array(
                              'taxonomy' => 'portfolio',
                              'field' => 'slug',
                              'terms' => 'leisure',
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
                                         <a class="singlecat" href="<?php the_permalink();?>"><?php the_title(); ?></a>
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



<?php

          // MULTIPLE TAXOMY QUERIES WITH TAX QUERY

          // List custom posts of 'Therapists', by taxonomies of 'location', and by 'therapy'.




          $args = array(
                        'post_type' => 'therapist',
                        'post_status' => 'publish',
                                                'tax_query' => array(
                                                              array(
                                                                'taxonomy' => 'therapies',
                                                                'field' => 'slug',
                                                                'terms' => // get the current term name
                                                              ),
                                                              array(
                                                                'taxonomy' => 'location',
                                                                'field' => 'slug',
                                                                'terms' => array( 'bristol' )
                                                  )
                                        )
      );

              $my_query = new WP_Query( $args );




                  if( $my_query->have_posts() ) {
                                        while( $my_query->have_posts() ) {
                                          $my_query->the_post();
                                          ?>

                                           <div class="col span_3 boxholder">
                                                      <div class="thumbwrapper">
                                                       <a class="singlecat" href="<?php the_permalink();?>"><?php the_title(); ?></a>
                                                      <?php the_post_thumbnail(); ?>
                                                      </div>
                                         </div>


                                          <?php
                                        }
                                      }
                                      else {
                                        echo 'Oh ohm nothing!';
                                      }
                      wp_reset_postdata();