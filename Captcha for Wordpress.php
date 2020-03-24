Captcha for Wordpress

Add Contact Form 7
Add Captcha plugin (by BestWebSoft )
(for the DG theme, add the contact form 7 widget for use with the contact page - contact area section)

1. add both plugins to the theme
2. create contact form by adding code from the 'generate tag'
3. within 'generate' is a setting for Capcha - drag and drop the code for both image and text
4. for an additional 'thank you' page, add this code..
on_sent_ok: "location.replace('http://http://www.thebrewerycup.ie/thankyou.php');"
into the 'additional setttings' field.
5. make sure captcha is set for form registration only. as default as all fields selected
6. insert and echo contact form 7 shortcode to display the form in your page.