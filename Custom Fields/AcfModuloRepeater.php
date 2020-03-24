          <?php if ( get_field( 'services_repeater' ) ): ?>

            <?php $index = 1; // this is the counter ?>

             <?php $totalNum = count( get_field('services_repeater') ); ?>

              <?php while ( has_sub_field( 'services_repeater' ) ): ?>

                <div class="col-sm-4">
                    <?php the_sub_field('area_text'); ?>
                </div>
              <? if ($index % 2 == 0) : ?>
                  <? if ($index < $totalNum) : ?>

                    // Row 2

                    <?php the_sub_field('area_text'); ?>
                  <? elseif ($index == $totalNum) : ?>
                  <? endif; ?>
              <? endif; ?>
              
          <?php $index++; ?>
          <?php endwhile; ?>
          <?php endif; ?>








           <?php 
                    if( $i % 2 == 0 ) echo '<div class="space-2"></div>'; 
                    if( $i % 3 == 0 ) echo '<div class="space-3"></div>';
                ?>



                .space-3 {
                    clear: both;
                    padding-top: 20px;
                }