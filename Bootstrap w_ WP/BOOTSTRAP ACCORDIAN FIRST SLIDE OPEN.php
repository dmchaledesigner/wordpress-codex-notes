BOOTSTRAP ACCORDIAN FIRST SLIDE OPEN




		<section class="faqAccordian">

		<div class="container-fluid">

			<div class="row">
					<div class="col-sm-6">
					<h5 class="small-subheading">frequently asked <span>questions</span></h5>
					</div>

					<div class="col-sm-6">
					<div class="accordianbtns">

		  			<a href="#" class="btn btn-orange openall">
		  			<span class="glyphicon glyphicon-plus"></span>
		  			expand all</a>

		  			<a href="#" class="btn btn-orange closeall">
		  			<span class="glyphicon glyphicon-minus"></span>
		  			close all</a>
  					</div>
  					</div>
			</div>




  <div class="panel-group" id="accordion">


			  <div class="panel-group" id="accordion">

					<?php

				    $args = array(
				       	'cat' => 21,
				 	'order' => 'ASC'
				    );
				    $the_query = new WP_Query( $args );
				?>
				<?php $c = 0; ?>


				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

				<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); $c++; ?>

				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="heading-<?php the_ID(); ?>">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse-<?php the_ID(); ?>">
				          <span class="glyphicon glyphicon-plus accordian-icons"></span><?php the_title(); ?>
				        </a>
				      </h4>
				    </div>

				    <div id="collapse-<?php the_ID(); ?>" class="panel-collapse collapse <?php if( $c == 1 ) echo 'in'; ?>" role="tabpanel" aria-labelledby="heading-<?php the_ID(); ?>">
				      <div class="panel-body">
				        <?php the_content(); ?>
				      </div>
				    </div>
				  </div>


<?php endwhile; else: ?>

    <p>Please fill out some questions.</p>

<?php endif; ?>
<?php wp_reset_postdata(); ?>



  </div> <!-- close accordian -->


</div>

</div>


</div>
</section>








<!-- Add this to the js file -->



// FAQ Accordian Open / Expand All

$('.closeall').click(function(){
  $('.panel-collapse.in')
    .collapse('hide');
});
$('.openall').click(function(){
  $('.panel-collapse:not(".in")')
    .collapse('show');
});
