Wordpress is a Blog CMS therefore, index.php is the first stop for blog posts.
Once a static page has been setup, the index.php file will act as the Blog unless stated by another template page.

Here is our index.html page...

<?php
/**
 * The main template file for the blog.
 */

get_header(); ?>

<div class="main-wrapper">
    <div class="container">

        <div class="row main-row-1">
            <div class="col-md-12">
                
                <div class="main-section clearfix">

                    <?php get_template_part( 'blog' ); ?>

                </div><!-- main-section -->
            
            </div><!-- col -->
        </div><!-- main-row-1 -->

    </div><!-- container -->
</div><!-- main-wrapper -->

<?php get_footer(); ?>



Look at the section where we have '<?php get_template_part( 'blog' ); ?>'
This is the section that will pull in our Blog.php page that will create.



Blog.php
The entire blog.php file below.





<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php if ( is_single() ) : ?>

            <div class="post-item clearfix">
                <div <?php post_class(); ?>>

                    <h1 class="page-header"><?php the_title() ;?></h1>

                    <?php if ( has_post_thumbnail() ) : ?>

                        <?php if ( get_post_type() == 'news-item' ) : ?>
                            <p><?php the_post_thumbnail( 'news-item-large', array('class' => 'img-responsive' ) ); ?></p>
                        <?php else : ?>
                            <?php the_post_thumbnail( '', array('class' => 'img-responsive' ) ); ?>
                        <?php endif; ?>

                    <?php endif; ?>
                    <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                    <?php get_template_part( 'inc/snippets/postmeta' ); ?>
                    <?php comments_template(); ?>

                </div>
            </div><!-- post-item -->

        <?php else : ?>

            <div class="post-item clearfix">
                <div <?php post_class(); ?>>

                    <h2 class="page-header">
                        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h2>

                    <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                    <?php get_template_part( 'inc/snippets/postmeta' ); ?>
                    <?php  if ( comments_open() ) : ?>
                        <div class="clear"></div>
                        <p class="text-right">
                            <a class="btn btn-custom btn-sm" type="button" href="<?php the_permalink(); ?>#comments"><?php comments_number( 'Leave a Comment', 'One Comment', '% Comments' );?> <span class="glyphicon glyphicon-comment"></span></a>
                        </p>
                    <?php endif; ?>

                </div>
            </div><!-- post-item -->

        <?php endif; ?>

    <?php endwhile; // End while have_posts() ?>

    <p class="text-right clearfix">
        <?php posts_nav_link(); ?>
    </p>

<?php else : ?>

    <h2>No posts found.</h2>

<?php endif; // End if have_posts() ?>



