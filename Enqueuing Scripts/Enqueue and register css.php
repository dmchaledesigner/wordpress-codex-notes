enqueue and register css

functions file for register and enqueuing!!!!

See: http://www.wpbeginner.com/wp-tutorials/how-to-properly-add-javascripts-and-styles-in-wordpress/
for full tutorial



//CUSTOM CSS

   // Register stylesheet
        wp_register_style( 'customstyles', $template_url . '/css/mycustom.css', array(), '1.0', 'all' );
    

   // Enqueue stylesheet
function custom_theme_styles()
{
   if (!is_admin())
   wp_enqueue_style('my-custom-style', get_template_directory_uri() . '/css/mycustom.css',false,'1.1','all');
}
add_action('wp_enqueue_scripts','custom_theme_styles');




// GOOGLE FONTS VIA CDN

function load_fonts() {
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Spinnaker');
            wp_enqueue_style( 'googleFonts');
        }
    
    add_action('wp_print_styles', 'load_fonts');





    // Registering JS Files


    function wptuts_scripts_basic()
{
    // Register the script like this for a plugin:
    wp_register_script( 'custom-script', plugins_url( '/js/myscripts.js', __FILE__ ) );
    // or
    // Register the script like this for a theme:
    wp_register_script( 'myscripts', get_template_directory_uri() . '/js/myscripts.js' );
 
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'myscripts' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_scripts_basic' );





