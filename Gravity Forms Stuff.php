<?php 

			
			// Gravity forms Snippets and Tuts


			/*

				Unlike Contact Form 7,
				Gravity Forms needs its scripts to be called on each template like this...
			*/
				

?>
			
			<?php //enqueue gravity form scripts ?>

			<?php 
			$gf_id = get_field('form_id'); // load the gf field id from the frontend
			gravity_form_enqueue_scripts( $gf_id , true );  // the 40 is the ID of for the form ?>







	



<?php 

			
			// ACF and Gravity Forms


			/*

				Instead of using the shortcode in the content area, we can add it to our template and get the user
				to input the form ID to give complete control over which form is being called into the page.

				1.. Add a field called 'form_id'

				2.. add the shortcode from the gravity forms docs to the page

				3.. add the field to the shortcode

				4.. add the form id into the page field
			*/
				

?>

			<?php // example ?>
			<?php echo do_shortcode('[gravityform id="'.get_field('form_id').'" title="false" description="false" ajax="true"]');?>













<?php 

			
			// Dynamic Population


			/*

				This enables us to fill out parts of form and send to another.
				For example, a user fills out a form and is redirected to another page which has another form.
				Instead of having them fill out there name, address, tel again, we can make the same fields on form 2 pre popilated with the content from the previous form
			*/
				

?>

			<?php // example ?>
			<?php echo do_shortcode('[gravityform id="'.get_field('form_id').'" title="false" description="false" ajax="true"]');?> ?>









			<?php 


			// GF Functions - drop into the functions file

					new GF_Maximum_Character_Length( array( 
				    'form_id' => 26,
				    'field_id' => 3,
				    'min_chars' => 6,
				    'max_chars' => 50,
				    'min_validation_message' => __( 'You need to enter at least %s characters.' ),
				    'max_validation_message' => __( 'You can only enter up to %s characters.' )
				) );


			 ?>







			<?php 


			// GF Functions - drop into the functions file

					new GF_Maximum_Character_Length( array( 
				    'form_id' => 26,
				    'field_id' => 3,
				    'min_chars' => 6,
				    'max_chars' => 50,
				    'min_validation_message' => __( 'You need to enter at least %s characters.' ),
				    'max_validation_message' => __( 'You can only enter up to %s characters.' )
				) );


			 ?>







				<?php

				// change submission button text on a form with an id of 33 && ....


				add_filter( 'gform_submit_button', 'emp_custom_gf_form_submit_button', 10, 2 );
				function emp_custom_gf_form_submit_button( $button, $form ) {
				  if ( $form['id'] == '33' && is_page('hrbreakfast') ) {
				    $button = str_replace( 'Register Now', 'Stay Informed', $button );
				  }
				  return $button;
					}




				?>






	<?php



	// Gravity Formsa and Salesforce with Zapier
	// https://www.youtube.com/watch?v=uMvQ9LkwgPk



	



	?>
