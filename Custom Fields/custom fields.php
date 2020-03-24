<!-- advanced custom fields (citrusy site)

ive used this for a byline directly under a header
the reason the this is i created a page and only wanted to add the title and its content -->

<!-- start loop..... -->
<?php the_title();?>
<?php the_content();?>
<!-- endIF...close loop -->

<!-- 
so to create the byline directly under the header title we first need to install the
advanced custom fields plug in.

activate it and go to the dashboard. in the tools on the left, you'll see a new section
called custom fields.

click 'new field' and call it after the page (or similar) you are relating it to.
remember, your clients need to be able to access all this information EASILY so...
be relative!!!!!

Give the field title / label and its name 'byline' as i have done.

set the field type to text, and make sure that, on our location rules,
the field group page is equal to the page name we are inserting the custom field on.

save he custom field and go to your template page to where the byline is hardcoded.
keeping the html that surrounds the byline content, which is needed for css styling,
insert this code... -->

<?php the_field('byline');?>

<!-- ...note that in the parenthesis, we call the name of the custom field we created.
 -->

<!-- if statement with custom fields
 -->

   <?php
      if(get_field('linktext')) { ?>
                <article class="gl_visit">
                   <h4><?php the_field("linktext");?></h4>
                   <a href="<?php the_field('lnk_url'); ?>" target="_blank">Click here to log your details</a>
              </article>
   <?php   }  ?>


