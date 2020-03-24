<?php


// https://developer.wordpress.org/reference/functions/get_terms/

//get all terms assigned to this taxonomy
$member_terms = get_the_terms($post_id, 'type');
//if we have member terms assigned to this post
if ($member_terms) {
	echo '<div class="member-terms-meta">';
	echo '<span class="term-title"> Member Terms: </span>';
	//loop through each term
	foreach ($member_terms as $term) {
		//collect term information and display it
		$term_name = $term->name;
		$term_link = get_term_link($term, 'type');
		echo '<a href="'.$term_link.'">';
		echo '<span class="term">'.$term_name.'</span>';
		echo '</a>';
	}
	echo '</div>';
}

?>


<?php

$terms = get_terms('species');

echo '<ul>';

foreach ($terms as $term) {

	// The $term is an object, so we don't need to specify the $taxonomy.
	$term_link = get_term_link($term);

	// If there was an error, continue to the next term.
	if (is_wp_error($term_link)) {
		continue;
	}

	// We successfully got a link. Print it out.
	echo '<li><a href="'.esc_url($term_link).'">'.$term->name.'</a></li>';
}

echo '</ul>';?>
// show 3 posts from 3 terms in a taxonomy within a cpt


<!-- start of tax term group-->
<div class="container video-layout">


<?php
$terms = get_terms('series');

foreach ($terms as $term):

$term_link = get_term_link($term);// get the term link which will go to the taxonony-tax_name.php ?>

              <div class="row term-links">

                <div class="col-md-4">
                <a href="<?php echo $term_link;// echo term link ?>" class="text-left"><?php echo $term->name;
?></a>
                </div>

                <div class="col-md-4 col-md-push-4">
                <a href="<?php echo $term_link;?>">See more <span> > </span></a>
                </div>

 </div>





<div class="row movie-row">
<?php
$posts = get_posts(array(
		'post_type'   => 'videos',
		'order'       => 'DESC',
		'taxonomy'    => $term->taxonomy,
		'term'        => $term->slug,
		'numberposts' => 3, // to show all posts in this taxonomy, could also use 'numberposts' => -1 instead
	));

foreach ($posts as $post):// begin cycle through posts of this taxonmy
setup_postdata($post);//set up post data for use in the loop (enables the_title(), etc without specifying a post ID)
?>


                          <div class="col-xs-12 col-sm-6 col-md-4">

                          <div class="movie-wrapper">

                          <h3><a href="<?php the_permalink();?>"><?php the_field('title', $post);
?></a></h3>
                          <p class="para"><?php echo wp_trim_words(get_the_content(), 16, '...');?></p>

                          <div class="img-box">
                          <a href="<?php the_permalink();?>" title="video link"></a>
<?php // wp_get_attachment_image( $post->image_id ); ?>
                          <?php echo get_the_post_thumbnail($post, 'video-thumb', array('class' => 'img-responsive'));?>
</div>

                          </div>
                        </div>


<?php endforeach;?>
</div><!--close row-->

<?php endforeach;?>
</div><!-- end container-->

