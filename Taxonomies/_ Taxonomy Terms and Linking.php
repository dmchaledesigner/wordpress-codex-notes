<?php



// https://code.tutsplus.com/tutorials/taxonomy-archives-list-posts-by-post-type--cms-20340
// https://code.tutsplus.com/tutorials/taxonomy-archives-list-posts-by-taxonomys-terms--cms-20045?_ga=2.80976658.467131453.1517882572-1834180212.1517882571



// Taxonomy Terms and Linking using a CPT



// Create a main page and output the blocks of terms with links : show page
// A single-cpt_name.php : shows the single post
// Then we create a taxonomy-taxonomy_name.php : the taxonomy and the archive show a general wp loop
// Finally an archive-cpt_name.php



//eg of using a foreach loop with term link and outputting a content block

 // Output all Taxonomies names with their respective items
$terms = get_terms('member_groups');
foreach ($terms as $term):
?>
    <h3><?php echo $term->name;// Print the term name ?></h3>
    <ul>
<?php
$posts = get_posts(array(
		'post_type' => 'member',
		'taxonomy'  => $term->taxonomy,
		'term'      => $term->slug,
		'nopaging'  => true, // to show all posts in this taxonomy, could also use 'numberposts' => -1 instead
	));
foreach ($posts as $post):// begin cycle through posts of this taxonmy
setup_postdata($post);//set up post data for use in the loop (enables the_title(), etc without specifying a post ID)
?>
          <li><a href="<?php the_permalink();?>"><?php the_title();
?></a></li>
<?php endforeach;?>
</ul>
<?php endforeach;?>
Main page example code

<!-- start of tax term group-->
<div class="container video-layout">


<?php
$terms = get_terms('series');// get all terms fron the taxonomy called series

foreach ($terms as $term):// loop through the array

$term_link = get_term_link($term);// get term link to link to all posts within each term ?>

              <div class="row term-links">

                <div class="col-md-4">
                <a href="<?php echo $term_link;?>" class="text-left"><?php echo $term->name;
// term name
?></a>
                </div>

                <div class="col-md-4 col-md-push-4">
                <a href="<?php echo $term_link;?>">See more <span> > </span></a>
                </div>

 </div>





    <div class="row movie-row">

<?php
$posts = get_posts(array(
		'post_type'   => 'videos', // the custom post type
		'order'       => 'DESC', // order of listings
		'taxonomy'    => $term->taxonomy,
		'term'        => $term->slug,
		'numberposts' => 3, // to show all posts in this taxonomy, could also use 'numberposts' => -1 instead
	));

foreach ($posts as $post):// begin cycle through posts of this taxonomy
setup_postdata($post);//set up post data for use in the loop (enables the_title(), etc without specifying a post ID)
?>


                          <div class="col-xs-12 col-sm-6 col-md-4">

                          <div class="movie-wrapper">

                          <h3><a href="<?php the_permalink();?>"><?php the_field('title', $post);
// use $post from the foreach loop ?></a></h3>
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













// The single post will have all custom fields etc attached to it and displayed as per single post design and can be outputted as usual methods of outputting page content

Make sure the post content is contained within the wp loop like so...





//  The taxonomy-tax_name.php and archive-cpt-name.php will have general loop to call in all posts




<?php
if (the_post()):while (have_posts()):the_post();?>



<?php endwhile;?>
<?php endif;?>



















