<?php

	if(get_field('linktext')){ ?>

	        <article class="gl_visit">
              <h4><?php the_field("linktext");?></h4>
             <a href=" .  the_field('lnk_url')" . target="_blank">Click here to log your details</a>
              </article>

	<?php } ?>









   <?php

      if(get_field('linktext')) { ?>

                <article class="gl_visit">
                   <h4><?php the_field("linktext");?></h4>
                   <a href="<?php the_field('lnk_url'); ?>" target="_blank">Click here to log your details</a>
              </article>

   <?php   }  ?>
