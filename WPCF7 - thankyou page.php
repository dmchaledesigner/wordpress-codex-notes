adding a thank you page to contact form 7

create a new form and give it a specific title ie 'Get in Touch'.

create a new template page called 'success.php and
add the content of what you want to say when the form is submitted.
dont forget to add the header() and footer() hooks, then upload to your theme.

add this code to your functions.php file

// Add Thank you page to WPCF7
function redir_after_form_sent($form) {
if ($form->title == "Get in Touch") {
header('Location: /success');
die();
}
}
add_action('wpcf7_mail_sent', 'redir_after_form_sent');

in the above, change the -> title to that of what you called you contact form.
ie 'Get in Touch'

the location refers to the success.php file we created where our thank you content is.

url http://mysite.com/success   to check the file is valid.

fill out the form on the contact page of your site and submit.
the default message should be redirected to our new thank you page.





