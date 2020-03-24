<?php 
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('showposts=6&post_type=news'.'&paged='.$paged); 

  while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>

  <!-- LOOP: Usual Post Template Stuff Here-->

<?php endwhile; ?>

<nav>
    <?php previous_posts_link('&laquo; Newer') ?>
    <?php next_posts_link('Older &raquo;') ?>
</nav>

<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
?>





OR WE COULD HAVE MORE CONTROL 



<?php
  // set up or arguments for our custom query
  $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
  $query_args = array(
    'post_type' => 'Questions',
    'posts_per_page' => 3,
    'paged' => $paged
  );
  // create a new instance of WP_Query
  $the_query = new WP_Query( $query_args );
?>

<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
  
  <article>
    <h1 class="qandatitle"><?php echo the_title(); ?></h1>
    <div class="excerpt">
      <p><?php the_excerpt(); ?></p>
      <a class="readmorelink" href="<?php the_permalink(); ?>">Read More</a>

    </div>
  </article>


<?php endwhile; ?>

<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
  <nav class="prev-next-posts">
    <div class="prev-posts-link">
      <?php echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link ?>
    </div>
    <div class="next-posts-link">
      <?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>
    </div>
  </nav>
<?php } ?>

<?php else: ?>
  <article>
    <h1>Sorry...</h1>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  </article>
<?php endif; ?>