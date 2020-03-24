<?php if($t = get_field('_why_title')) echo '<h2>'.$t.'</h2>'; ?>






			<?php if($list = get_field('why_area')): // this is the repeater field name ?>

			<ul>
			
                    <?php 

                        $i = 1; // increment
                        $len = count($list); // count() counts the items in the array, which is assigned to the variable $len
                        foreach ($list as $el) { // the foreach loop ?> 

                            
                            <li>
                                    <?php if ($i <= 4) { ?>
                                        <?php if($el['_why_sub_title']) echo '<h3><span class="counter">'.$el['_why_sub_title'].'</span>+</h3>'; ?>
                                        <?php if($el['_why_description']) echo '<p>'.$el['_why_description'].'</p>'; ?>
                                    <?php } ?>


                                    <?php if ($i == 5) { ?>
                                        <?php if($el['_why_sub_title']) echo '<h3><span class="counter">'.$el['_why_sub_title'].'</span>/7</h3>'; ?>
                                        <?php if($el['_why_description']) echo '<p>'.$el['_why_description'].'</p>'; ?>
                                    <?php } ?>

                                    
                                    <?php if ($i == 6) { ?>
                                        <?php echo '<h3><span>'.$el['_why_sub_title'].'</span></h3>'; ?>
                                        <?php if($el['_why_description']) echo '<p>'.$el['_why_description'].'</p>'; ?>
                                    <?php } ?>

                            </li>

                            
                                
                            <?php $i++; 

                            } ?>

				   
			         </ul>

			<?php endif; ?> 