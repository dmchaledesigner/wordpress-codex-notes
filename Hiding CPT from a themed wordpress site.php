Hiding CPT from a themed wordpress site.

Take this code and add it to the functions file...


<?php

function hide_menu_items() { 
remove_menu_page( 'edit.php?post_type=your-post-type-link' );  
}
add_action( 'admin_menu', 'hide_menu_items' ); 

?>



Now open the dashboard and hover over the CPT you want to delete.
Look for the <a href> that starts with edit.php and paste into the code above.
So we could have something like this, for a portfolio CPT..

function hide_menu_items() { 
remove_menu_page( 'edit.php?post_type=portfolio' );  
}
add_action( 'admin_menu', 'hide_menu_items' ); 

Save and the CPT will be removed from your theme.

Add as many removals as required by adding more
remove_menu_page( 'edit.php?post_type=your-post-type-link' );
as required to the function.

