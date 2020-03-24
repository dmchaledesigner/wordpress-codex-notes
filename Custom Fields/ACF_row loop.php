<?php if( have_rows('repeater_field_name') ): ?>



	<?php while( have_rows('repeater_field_name') ): the_row();

		// vars
		$image = get_sub_field('image');
		$content = get_sub_field('content');
		$link = get_sub_field('link');

		?>


 		<?php //html here ?>



	<?php endwhile; ?>

<?php endif; ?>