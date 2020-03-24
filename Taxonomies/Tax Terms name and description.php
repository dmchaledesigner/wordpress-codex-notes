<ul class="taxonomyCategories">
                                
                            <?php

                                $custom_terms = get_terms('portfolio');

                                foreach($custom_terms as $custom_term) {
                                    $args = array('post_type' => 'projects',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'portfolio',
                                                'field' => 'slug',
                                                'terms' => $custom_term->slug,
                                            ),
                                        ),
                                     );

                                     $loop = new WP_Query($args);
                                     if($loop->have_posts()) {
                                       while($loop->have_posts()) : $loop->the_post();


                                       echo "<li>";
                                        echo '<h3>'.$custom_term->name.'</h3>';
                                        echo '<p>'. get_the_content() .'</p>';
                                       echo "</li>";


                                        endwhile;
                                     }
                                }
                                
                                 wp_reset_query();


                                ?>

</ul>