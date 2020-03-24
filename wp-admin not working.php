wp-admin not working....

1. delete browser cache
2. insert this code at top of the functions file, after <?

update_option('siteurl','http://www.yourwebsitename.com');
update_option('home','http://www.yourwebsitename.com');