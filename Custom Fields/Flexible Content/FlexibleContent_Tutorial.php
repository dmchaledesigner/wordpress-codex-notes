<?php


	// Create a page in Wordpress to hold the Flexible Content and assign a new template
	
	// Create a Field Group for the page in ACF and create Flexible Content Block to hold the layouts.
	// Create as many layout blocks as you wish.

    // Call in flexible content using the code below and edit th slug to that of the flexible content slug 

    // NOTE: we can use same name slugs in the fields panel in any layout block as each field is called only relating to its block partial. ie 'get_sub_field('header')' on the intro block, will have a different value to that on the cta block.

     
                    if ( have_posts() ) :
                      while ( have_posts() ) : the_post();

                        if ( have_rows('flex') ) { // relates to the slug of the flex field created with ACF
                          while ( have_rows('flex') ) { the_row(); // same slug of the flex field created with ACF
                            include( 'flexcontent/'. get_row_layout() . '.php' );
                            // the folder where the partial blocks are held. Remember to name the partials the same as the 'name' as each layout block ie, if name is intro block, call the partial _intro_block.php
                          }
                        }

                      endwhile;
                    else:
                      get_template_part( '404' );   
                    endif;

	

?>





<?php 


// In each of our partial bocks which is in the flexcontent folder, we will have similar sections of code to that of calling in ACF fields
// Each layout in ACF can have the same type of fields ie title or header etd as they are only relevant to that specific partial.
// we can even use repeater fields groups the same as below ?>


	<div class="row">
				
					<?php // repeater 

					// check if the nested repeater field has rows of data
		        	if( have_rows('block') ):

				 	// loop through the rows of data
				    while ( have_rows('block') ) : the_row();

					$icon = get_sub_field('icon');
					$iconUrl = $icon['url'];
					$tagline = get_sub_field('tagline');
					$content = get_sub_field('block_content');

					?>

					<div class="col-md-4">

					<img src="<?php echo $iconUrl ?>" alt="$icon['alt']">
					<h5><?php echo $tagline; ?></h5>
					<p><?php echo $content; ?></p>


					</div> <!-- close col-md-4-->


					<?php endwhile;
					endif;  // end repeater ?>

			

		</div>



		<!-- OR something similar to this -->

		<section class="cta-block" style="background-color: #787c7f; width: 100%; padding: 200px 0px">
	
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<h2><?php the_sub_field('cta_header'); ?></h2>
						<h3 style="text-align: center;"><?php the_sub_field('cta_subheader'); ?></h3>

					</div>
				</div>
			</div>

</section>

			<!-- NOTE how we are using the_sub_field with flexible content -->






<?php


// Once our blocks are created and content output, we can go into our page in the wp dashboard and move any specific content block to another position via drag and drop


?>



