<?php get_header(); ?>

<div class="main-wrapper">
    <div class="container">

            <div class="row main-row-1">

                                <div class="col-md-12">


 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h4 class="products"><?php the_title(); ?></h4>
            <?php the_post_thumbnail(full); ?>
            <p><?php the_content(); ?></p>



        <?php endwhile; else: ?>

        <div class="post">
        <p><?php _e('Sorry, no posts matched your criteria.', "hi-rezz"); ?></p>
        </div>

    <?php endif; ?>


<?php if ( is_single() || is_page() ) : ?>

    <a name="comments"></a>
    <?php if ( have_comments() && comments_open() ) : ?>
        <h4 id="comments"><?php comments_number( 'No Comments', 'One Comment', '% Comments' );?></h4>
        <ul class="commentlist">
            <?php wp_list_comments(); ?>

            <p class="text-right clearfix">
                <?php paginate_comments_links(); ?>
            </p>

            <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
        </ul>
        <div class="well"><?php comment_form(); ?></div>

    <?php else : ?>

        <?php if ( comments_open() ) : ?>
            <div class="well"><?php comment_form(); ?></div>
        <?php endif; ?>

    <?php endif; ?>

<?php endif; ?>


</div>

            </div><!-- main-row-1 -->

        


    </div><!-- container -->
</div><!-- main-wrapper -->

<?php get_footer(); ?>