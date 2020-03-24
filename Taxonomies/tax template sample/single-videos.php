<?php /**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */





get_header();?>
<!-- Header -->


<header id="single-videos-post" class="single-post pd-btm-100">
<?php include ('navigation.php');?>

<!-- header Content -->
	<section class="crumbs-toolbar">

    <div class="container">
        <div class="row">
			<div class="col-md-12">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">

<?php
if (function_exists('bcn_display')) {
	bcn_display();
}?>
</div>
</div>
 </div>
</div>

</section>




<section class="section article">



<?php
while ( have_posts() ) : the_post(); ?>

						<div class="container">

						<div class="row movie-title">
						<div class="col-md-12">
						<h1><span class="txt-blue"><?php the_title(); ?></span></h1>
							<h3></a>
							</div>
						</div>



						<div class="row movie-meta">
						<div class="col-md-12">
							<p><?php echo do_shortcode('[hit_count]'); ?> • <span>Posted <?php echo time_ago(); ?></span>
						
							</div>
						</div>





						<div class="row movie-post-content">
									
							<div class="movie-wrapper">
								<div class="img-box">
								<?php the_field('youtube_iframe');?>
								</div>
								<h4><span class="txt-blue"><?php the_field('post_tagline'); ?></span></h4>
								<?php the_content(); ?>
								</div>
												
					</div>


					</div>


			<div class="container">
 

<div class="row transcript">
    <div class="panel panel-default">

      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        	TRANSCRIPT
        </a>
      </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse">
        <div class="panel-body">
         <?php the_field('transcript_content'); ?>
        </div>
      </div>
    </div>

	</div>

		<div class="row">


<hr class='social-ruler' style="color: #f2f2f2; margin-bottom: 23px;">

				<div class="sharewrapper">

				<div class="row">
					<div class="col-md-6">
						<p class="social-line">Did you find this article useful?</p>
						<p class="social-line">Share it with your network</p>
					</div>
					<div class="col-md-6">

<!-- share icons-->
<?php if (function_exists('ADDTOANY_SHARE_SAVE_KIT')) {
	ADDTOANY_SHARE_SAVE_KIT(array(
			'buttons' => array('twitter', 'linkedin', 'facebook', 'email'),
		));
}?>
</div>
			</div>
		</div>




<hr class='social-ruler' style="color: #f2f2f2; margin-bottom: 0px; margin-top: 18px;">


			
		</div><!-- close row-->



				
			<!-- show suggested video posts here-->
				
				<?php


						$related_args = array(
							'post_type' => 'videos',
							'posts_per_page' => 3,
						);

						$related = new WP_Query( $related_args );

						if( $related->have_posts() ) :
						?>
						<div class="row movie-row">
							<h3>Related posts</h3>

								<?php while( $related->have_posts() ): $related->the_post(); ?>
											
					<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="movie-wrapper">

							<div class="img-box">
										<a href="<?php the_permalink();?>" title="video link"></a>
										<?php the_post_thumbnail('video-thumb', array('class' => 'img-responsive')); ?>

									</div>


								<h3><a href="<?php the_permalink();?>"><?php the_field('title'); ?></a></h3>
								<p class="para"><?php echo wp_trim_words( get_the_content(), 16, '...' ); ?></p>
									
							</div>
					</div>



								<?php endwhile; ?>

						</div>
						<?php
						endif;
						wp_reset_postdata();


?>
			<!-- end suggrested video posts loop -->

			</div>






<?php endwhile; ?>

</section>







<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "fc211c05-ae5a-4eee-8e92-358b08d96a86", doNotHash: true, doNotCopy: false, hashAddressBar: false} );</script>
<?php get_footer();?>