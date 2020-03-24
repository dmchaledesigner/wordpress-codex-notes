 <section class="section">


                  
                  <?php
                  // The repeater field
                  if( have_rows('testimonial') ): ?>


                    <ul class="slides">

                      
                      <?php
                      // The repeater field
                      while( have_rows('testimonial') ): the_row();  ?>


                      <?php // vars
                      $image = get_sub_field('image'); // make sure the image is set to 'array' in the custom field
                      $postobject = get_sub_field('review_post'); ?>


                      <li>

                        <div class="col-md-6">
                        <div class='post-container'>
                           
                        <div class="photo">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                              
                        <h3><a href="<?php the_permalink(); ?>"><?php echo apply_filters('the_title', $postobject->post_title); ?></a></h3>
                        <p><?php echo apply_filters('the_content', $postobject->post_content);  ?></p>
                                  

                        </div><!--close column class-->
                        </div><!-- close post container -->

                      </li>



                      <?php endwhile; // end while?>

                      </ul>

                      <?php endif; //end if?>




           
          </section>