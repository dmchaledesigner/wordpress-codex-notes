<!-- To be able to select one option or another, with a default option
For example, employsure footer. Show a default form, but depending on the page,
we can choose a different form section from a select option box on the page as a field -->


<!-- Create a field ie  -->
<?php get_field('footer_vis','options'); ?>

<!-- In the choices field add three items ie

Show new footer for admin (this will be Footer A)
Show old footer (this will be Default Footer)
Show footer to all (this will be Footer B)

...then use one of the above for the default field as we need to have one present.

select -> options are we are goin to use it as an option on all pages -->




<?php if(get_field('footer_vis','options') == 'Show new footer for admin' || get_field('footer_vis','options') == 'Show footer to all'):?>
    
        <footer class="footer-white"><div class="container">
           
          <!--  // Footer code A -->
        </footer>


        <?php else:?>

      <footer>
     
     	Footer Code B
    </footer>



        <?php endif;?>




<!--  Now in when we create a page we have the option to select Footer A or, Footer B -->