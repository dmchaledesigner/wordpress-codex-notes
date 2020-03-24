<!-- ACF options allows you to add content without specifying a page query.
in normal custom fields, we are asked to specify a page, if equal to...
ACF options does the opposite...


in the functions file, add this code, -->

<?php 
if (function_exists('acf_add_options_sub_page')) {
	if( function_exists('acf_add_options_page') ) {
 		acf_add_options_page(); // necessary for v.5 :-/
}
	acf_add_options_sub_page( 'options' );
}
?>




<!-- Open up Options in the Wordpress Dashboard and add the custom fields as normal from there.



Now we can use this snippet to call in the field... -->

<p><?php the_field('field_name', 'option'); ?></p>

<!-- Options is the parameter where we can substitute it with a page ID for example
 -->
<p><?php the_field('field_name', '5'); ?></p>

<!-- or use the options parameter to place universaly.
 -->



<!-- Retrieve a field -->

<?php

$variable = get_field('field_name', 'option');

// do something with $variable

?>




<!-- Display a sub field

Note that when inside of a have_rows loop, you do not need to use the $post_id parameter for any sub field functions (get_sub_field, the_sub_field) -->

<?php if( have_rows('repeater', 'option') ): ?>

    <ul>

    <?php while( have_rows('repeater', 'option') ): the_row(); ?>

        <li><?php the_sub_field('title'); ?></li>

    <?php endwhile; ?>

    </ul>

<?php endif; ?>






