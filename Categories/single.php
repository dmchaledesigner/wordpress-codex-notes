<?php get_header(); ?>

<?php
if(in_category('2')) //we use custom category template
{
    include(TEMPLATEPATH. '/single-mycategory.php');
}
else //or we just use single.php format
{?>
    <?php if (have_posts()) while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
    <?php endwhile;
}?>

<?php get_footer(); ?>