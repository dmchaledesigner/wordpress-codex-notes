Add this to your functions file....
 
function new_excerpt_length($length) { 
    return 100;
}

add_filter('excerpt_length', 'new_excerpt_length');



or add this to your excerpt when setting up your loop

example...

  $description = imic_excerpt(20);
                if (!empty($description)) {
                    echo $description.'<a href="'.get_permalink(get_the_ID()).'">Read More</a>';
                     echo '<div class="addthis_horizontal_follow_toolbox"></div>';






Taken from a theme, note the excerpt has numerical calling inside the parenthesis
Also the echo of the permalink
when html is added to php it is used in quotes


If using a simple excerpt in a loop we can simply do this...
<?php echo wp_trim_words( get_the_content(), 40 ); ?>





 <p class="para mg-btm-30"><?php echo substr( strip_tags( get_the_content() ), 0, 140 ); ?> ...</p>