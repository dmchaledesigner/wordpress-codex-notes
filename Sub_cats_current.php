<?php $this_category = get_category($cat); ?>   

<ul class="child_list">

    <?php
    $id = get_query_var('cat');
    $args = array(  'parent' => $id );
    foreach (get_categories($args) as $cat) : ?>

    <li>
        <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
    </li>

    <?php endforeach; ?>
</ul>







<?php
$args = array( 'child_of' => $current_cat->term_id, );
$categories = get_categories( $args );
foreach($categories as $category) { 
    echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
?>