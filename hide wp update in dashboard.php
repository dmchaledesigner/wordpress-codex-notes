add_action('admin_head','admin_css');
function admin_css()
{
if(!current_user_can('administrator'))//not and admin
{
    echo '<style>';
        echo '.update_nag{display:none}';
        echo '</style>';
    }
}