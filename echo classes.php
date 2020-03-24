 <li

 <?php if ( $post->ID == $wp_query->post->ID )
 { 
    echo ' class="current"';
} else {} ?>>

<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>


 <li

 <?php if ( $post->ID == $wp_query->post->ID )
 { 
    echo ' class="current"';
} else {} ?>>

<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>







  <li>
    <a  <?php if ( $post->ID == $wp_query->post->ID )
 { 
    echo ' class="current"';
} else {} ?> href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

