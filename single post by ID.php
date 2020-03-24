$args = array(
'p' => 42, // id of a page, post, or custom type
'post_type' => 'any');

$my_posts = new WP_Query($args);