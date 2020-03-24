

<?php

// List all posts by specific Taxonomy Terms

// https://code.tutsplus.com/tutorials/taxonomy-archives-list-posts-by-post-type--cms-20340




                    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

                    $the_query = new WP_Query( array(
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'post_type' => array('videos'),
                        
                        'tax_query' => array(
                            array(
                                'taxonomy' => $term->taxonomy,
                                'field' => 'slug',
                                'terms' => $term->slug,
                            ),
                        ),  
                        ) );

                ?>
                


                <?php $i = 0;

                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

                $i++;

                    ?>
                   

                   <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="movie-wrapper">
                            
                            <div class="img-box">
                                        <a href="<?php the_permalink();?>" title="video link"></a>
                                        <?php the_post_thumbnail('video-thumb', array('class' => 'img-responsive')); ?>

                                    </div>


                                <h3><a href="<?php the_permalink();?>"><?php the_field('title'); ?></a></h3>
                                <p class="para"><?php echo wp_trim_words( get_the_content(), 16, '...' ); ?></p>
                                    
                            </div>
                    </div>
                    
                    
                     <?php 

                     // this is to add the rows / spaces
                     // modulo operator
                    if( $i % 2 == 0 ) echo '<div class="space-2"></div>'; 
                    if( $i % 3 == 0 ) echo '<div class="space-3"></div>';
                ?>



                <?php 
                    endwhile;
                    wp_reset_postdata();
                    else:?>
                    <h3><?php _e('Sorry No Posts Found'); ?></h3>
                <?php endif; ?> 