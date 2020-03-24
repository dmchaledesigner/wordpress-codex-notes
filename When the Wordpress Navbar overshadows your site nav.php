When the Wordpress Navbar overshadows your site navigation.

Add this code to the head of the home.php page...

<?php if ( is_admin_bar_showing() ) {?>
  <style>
  .navbar-fixed-top { top: 28px !important; }
  </style>
<?php
  }?>


  This pushes your site down ONLY when the wordpress navigation bar is showing when logged in.
  When you log out it disappears. See above conditional ....IF navbar is showing, do this...if NOT, do that.

  