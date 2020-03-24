<?php


	// the repeater field
	$products = get_field('repeater_name');

	// count the amount of rows
	$productNumbers = count($products);

	// Incrementor
	$count = 0;




		//loop
		while( have_rows('repeater_name') ): the_row();

				// vars
				$image = get_sub_field('image');




				// the 'if' conditional
				if($count == 0) { ?>
					

					<!-- CODE HERE -->

					<?php $count++; ?>




				<?php } elseif ($count == 1) { ?>


				<!-- CODE HERE -->

					
				<?php $count++; ?>




				<?php } elseif ($count == 2) { ?>


				<!-- CODE HERE -->

					
				<?php $count++; ?>




				<?php }; ?>

		<?php endwhile; ?>



?>