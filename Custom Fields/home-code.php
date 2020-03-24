<?php
/**
 * Template Name: Homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>

<?php the_field('test'); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<section class="hero-image header-carousel">
			<div class="overlay"></div>
				<?php if( have_rows('slider') ): ?>

				<ul class="slides">

				<?php while( have_rows('slider') ): the_row();

					// vars
					$image = get_sub_field('slideimg');
					$sub = get_sub_field('subheader');
					$content = get_sub_field('slidecontent');
					$link = get_sub_field('slidelink');
					$title = get_sub_field('slidetitle');

					?>

					<li class="slide">

						<?php if( $link ): ?>
							<a href="<?php echo $link; ?>">
						<?php endif; ?>

							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

						<?php if( $link ): ?>
							</a>
						<?php endif; ?>

					    <?php echo $content; ?>

					</li>

				<?php endwhile; ?>

				</ul>

			<?php endif; ?>
			</section>




		</main><!-- #main -->
	</div><!-- #primary -->



	<section class="servicepostswrapper">

			<div class="container-fluid">

				<div class="row">

					<div class="col-sm-6 serviceposts">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="imgbox">
									<img src="<?php echo get_template_directory_uri(); ?>/img/jersey3@2x.jpg" class="img-respsonsive" alt="">
								</div>
							</div>

							<div class="col-xs-12 col-md-6">
								<div class="content">
									<h3>Play space design & build</h3>
									<h5>Tailor made for your location and conditions, we design and build places to stimulate open-ended play.</h5>
									<p>Nature Play Solutions was founded to provide design and build solutions for play space developments.  We recognise the development of quality play spaces requires specialised skills and we provide a single point of responsibility for project delivery and quality – along with maximising play opportunities from the available budget. Our multi-disciplinary team has skills and expertise in all aspects of play space design and build projects. </p>
									<a class="btn btn-green">read more</a>
								</div>
							</div>
						</div>
					</div>


					<div class="col-sm-6 serviceposts">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="imgbox">
									<img src="<?php echo get_template_directory_uri(); ?>/img/mud5@2x.jpg" class="img-respsonsive" alt="">

								</div>
							</div>

							<div class="col-xs-12 col-md-6">
								<div class="content">
									<h3>Play Incursions</h3>
									<h5>Connecting kids, parents and educators with nature, our play incursions achieve a range of learning outcomes and are great fun.</h5>
									<p>Play is the primary vehicle that nature has designed to help young people develop into well-rounded, critical thinking and considerate adults.  When completely absorbed by play during our play incursions, children and young people are developing the skills that form the foundation for their personal, creative and working lives.</p>
									<a class="btn btn-green">read more</a>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>


	</section>




	<section class="services-strip container-fluid">

		<h5>Other services include <span>Professional development </span>and <span>OPAL Mentoring</span><a href="" class="btn btn-green">READ MORE</a></h5>
					</div>

	</section>



<section class="videointro">

		<div class="container-fluid">

			<div class="row">

				<div class="col-md-10 col-md-offset-1">

					<div class="content">
					<h3>Our Story</h3>
					<h5>The Nature Play solutions team is multidisciplinary and diverse, <br />yet united by a strong commitment to make nature play an integral part of childrens’ lives.<h5>
					</div>

				</div>
			</div>


			<div class="container">
				<div class="col-md-12">
					<div class="row videoplayer">
						<img src="<?php echo get_template_directory_uri(); ?>/img/video.jpg" alt="" class="img-responsive">
					</div>

					<div class="row">
						<div class="col-md-4 col-md-offset-4">
						<a class="btn btn-green">read more</a>
						</div>
					</div>
				</div>

		</div>

</section>




<section class="whyplay">


	<div class="container">

		<div class="row flexcontainer">

				<div class="col-md-12">

					<div class="content">
					<h3>why play</h3>
					<h5>All children and young people need to play. The impulse to play is innate. Play is a biological, psychological and social necessity and it is fundamental to the healthy development and well-being of individuals and communities.<h5>
					</div>

				</div>
		</div>


		<div class="row whyplayposts">

			<div class="col-md-4">
				<div class="postwrapper">

					<div class="imgbox">
					<img src="<?php echo get_template_directory_uri(); ?>/img/boulder-retaining.jpg" alt="" class=img-responsive>
					</div>

					<div class="content js-equal-height">
					<h4>Nature play <span>– A Foundation for Life</span></h4>
					<p>All children and young people need to play. The impulse to play is innate. Play is a biological, psychological and social necessity and it is fundamental to the healthy development and well-being of individuals and communities.</p>
					</div>


				</div>
			</div>




			<div class="col-md-4">
				<div class="postwrapper">

					<div class="imgbox">
					<img src="<?php echo get_template_directory_uri(); ?>/img/making-memories.jpg" alt="" class=img-responsive>
					</div>

					<div class="content js-equal-height">
					<h4>Making Memories<span> that Matter</span></h4>
					<p>As children, completely absorbed in play, we didn’t realise we were also building upon our health and developing future skills for our personal, creative and working lives. But that’s exactly the benefits we are gaining, and why we want our kids to experience this precious rite of passage too.</p>
					</div>


				</div>
			</div>





			<div class="col-md-4">
				<div class="postwrapper">

					<div class="imgbox">
					<img src="<?php echo get_template_directory_uri(); ?>/img/modern-way.jpg" alt="" class=img-responsive>
					</div>

					<div class="content js-equal-height">
					<h4>Nature Play <span>the Modern Way</span></h4>
					<p>While research has established the importance of nature play in a child’s development, designing and implementing it in contemporary environments has its challenges.</p>
					</div>


				</div>
			</div>



		</div>



		</div>

	</div>


</section>







<section class="provenrecord">


	<div class="container-fluid">


				<div class="row flexcontainer">

					<div class="col-md-6 half">

						<div class="content">
							<h3>DESIGN, BUILD AND PLAY</h3>
							<h3>A PROVEN RECORD</h3>
							<h5>Our stories give life to our skills, experience and results. Browse our featured projects that demonstrate our love for nurturing the seed of an idea and learn how we have created transformational results. </h5>
							<div class="button-left">
							<a class="btn btn-green">featured projects</a>
							</div>
								</div>


					</div>

					<div class="col-md-6 half">

						<div class="imgbox">
						<img src="<?php echo get_template_directory_uri(); ?>/img/provengallery.jpg" alt="" class=img-responsive>
						</div>


					</div>
				</div>

	</div>

</section>






<section class="home-project-gallery">
	<div class="container">

			<div class="row">

				<div class="col-md-12">

					<div class="content">
					<h3>our project gallery</h3>
					<h5>Our reputation has been built upon the successful delivery of an extensive portfolio of projects across a range of sectors including, public open spaces, schools, child care and more.<h5>
					</div>

				</div>
			</div>


<div class="gallerywrapper">
			<div class="row">
				<div class="col-md-4">
					<div class="imgbox">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gallery-img1.jpg" alt="" class=img-responsive>
					</div>
				</div>

				<div class="col-md-4">
					<div class="imgbox">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gallery-img2.jpg" alt="" class=img-responsive>
					</div>
				</div>

				<div class="col-md-4">
					<div class="imgbox">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gallery-img3.jpg" alt="" class=img-responsive>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-4">
					<div class="imgbox">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gallery-img4.jpg" alt="" class=img-responsive>
					</div>
				</div>

				<div class="col-md-4">
					<div class="imgbox">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gallery-img5.jpg" alt="" class=img-responsive>
					</div>
				</div>

				<div class="col-md-4">
					<div class="imgbox">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gallery-img6.jpg" alt="" class=img-responsive>
					</div>
				</div>
			</div>


	</div>
</section>


<section class="woodenform">


		<div class="container-fluid">

			<div class="row">

				<div class="col-md-10 col-md-offset-1">

					<div class="content">
					<h3>let's play together</h3>
					<h5>Do you have a design, build or play idea? We’d love to start a conversation! <br />Please contact us by submitting the form below.<h5>
					</div>

				</div>
			</div>



			<div class="row">


				<div class="col-md-6 col-md-offset-3">

					<form class="play-form" action="">
									<div class="row">

											<div class="col-md-6">

												<div class="form-group">
												<label for="input_firstName">First Name</label>
												<input type="text" class="form-control" id="inputFirst" placeholder="">
												</div>
											</div>



											<div class="col-md-6">

												<div class="form-group">
												<label for="input_lastName">Last Name</label>
												<input type="text" class="form-control" id="inputFirst" placeholder="">
												</div>
											</div>

									</div>


									<div class="row">

											<div class="col-md-6">

												<div class="form-group">
												 <label for="input_email">Email</label>
												 <input type="email" class="form-control" id="inputEmail" placeholder="">
												 </div>
											</div>



											<div class="col-md-6">

												<div class="form-group">
												<label for="input_tel">Contact Number</label>
												<input type="text" class="form-control" id="inputTel" placeholder="">
												</div>
											</div>

									</div>

									<div class="row">

											<div class="col-md-6">

												<div class="form-group">
												<label for="input_interestedIn">Interested In</label>
												<input type="text" class="form-control" id="inputFirst" placeholder="">
												</div>
											</div>



											<div class="col-md-6">

												<div class="form-group">
												<label for="input_organisation">Organisation</label>
												<input type="text" class="form-control" id="inputFirst" placeholder="">
												</div>
											</div>

									</div>

									<div class="row">

											<div class="col-md-12">

												<div class="form-group">
												<label for="input_comments">Additional Comments</label>
												 <textarea class="form-control" rows="10" id="comment"></textarea>
												</div>
											</div>

									</div>




									<div class="row">


												<div class="col-md-4 col-md-offset-4">

												<div class="form-group" id="homesubmit">
												<label for="submit">&nbsp;</label>
												<a type="submit" class="btn btn-green">submit</a>
												</div>
												</div>


									</div>

					</form>
				</div>
			</div>

		</div>






</section>

<?php
	} // end while
} // end i ?>


<?php get_footer(); ?>
