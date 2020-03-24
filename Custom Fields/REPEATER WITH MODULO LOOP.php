REPEATER WITH MODULO LOOP


<?php

				// Repeater field
		        $featured = get_field('featured-stages');
				$numberoffeatures = count($featured);

				// Counter
				$count = 0;


		        while( have_rows('featured-stages') ): the_row();


		        		// variables
				$image = get_sub_field('image');
				$featureTitle = get_sub_field('title');
				$excerpt = get_sub_field('content');

				?>



				<!-- Even  -->
				<?php

				if(($count % 2) == 0) { ?>

				<div class="row feature-left flexbox-container">


					<div class="col-md-6 featured-projects-img" style="background-image: url(<?php echo $image; ?>); ">
						<div class="row"></div>
					</div>



					<div class="col-md-6">
						<div class="row">
							<div class="feature-content-box">
							<h3><?php echo $featureTitle; ?></h3>
							<p><?php echo $excerpt; ?></p>
							</div>
						</div>
					</div>

				</div>



				 <!-- Increment -->
				<?php $count++ ?>




				<!-- Odd-->
				<?php } else { ?>



				<div class="feature-right flexbox-container">

					<div class="feature-content-box">
					<h3><?php echo $featureTitle; ?></h3>
					<p><?php echo $excerpt; ?></p>
					</div>


					<div class="featured-projects-img" style="background-image: url(<?php echo $image; ?>); ">

					</div>

				</div>



		            		<!-- Increment -->
		                        	<?php $count++ ?>

		                        	<?php } ?>





					<?php endwhile; ?>






					