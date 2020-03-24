Load Different headers for Specific Posts in wordpress according to their Category

On top of the single.php 

add this IF statement

<?php

$post = $wp_query->post;


if ( in_category('6') ) {
get_header('inner'); 
}elseif (in_category('7') ) {
get_header('inner'); 
} elseif (in_category('8') ) {
get_header('inner'); 
} else {
get_header(); 
}



?>

It tells to load a different header to the page depending on the category of posts chosen,