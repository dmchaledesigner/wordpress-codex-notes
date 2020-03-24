

==================================
Making a MultiSite with WORDPRESS
==================================





=======
Links
=======
https://premium.wpmudev.org/blog/ultimate-guide-multisite/
https://perishablepress.com/wordpress-multisite-subdomains-mamp/




=======
This works for MAMP;
=======
https://wordpress.stackexchange.com/questions/57160/wp-multisite-development-with-mamp-pro-and-wildcard-subdomains-not-really-worki




=======
Use this to duplicate pages and posts etc from one site to another
=======
https://wordpress.org/plugins/multisite-post-duplicator/




GETTTING THE LOCAL SETUP WORKING WITH MAMP PRO
==============================================






1.	Create a site in Mamp and add a Wordpress installation
	- Remember NOT to do something like 'local.mysite.com' as when new sites are added ie. Subdomains,
	the result will be 'local.site1.testingmultisite.com.au' ... We want site1.testingmultisite.com.au Keep the same url on the htdocs folder and the MAMP url

	If we select 'directory' then it doesnt matter if we have local.mysite.com as any other site will be called
	local.mysite.com/testingsite or, local.mysite.com/testingsite2 etc.





2. The 'wp-config' file.
	Create a new one and add the database name and use username and pass 'root' as per local server.
	- Find the content that says: '/* That's all, stop editing! Happy blogging. */' and below, add this line of code,
	'define( 'WP_ALLOW_MULTISITE', true );', then save the wp-config file.






3. 	The next step is to add virtual hosts to your Apache Section of the MAMP url.
	- add this code:  ServerAlias testingmultisite.com.au *.testingmultisite.com.au
	Where its says 'Additional Parameters for <Virtual Host> Directive'
	- in Options for <Directoiry> directive: Select 'includes' & 'FollowSymLinks' only
	- All three radio buttons must be clicked on the AllowOverride
	(screenshot attached in this tut folder)
	




5. Now go to MAMP and open the multisite, then install wordpress.







6. Subdomain Setup. Go Dashboard, Tools, Network Setup.\
	- Now Select, Subdomains or sub directory (path of your choice) and,
	Copy the code Provided into your 'wp-config' file and the .htaccess file as suggested








4.	Hosts File. Add your site and sub-domains to the Mac hosts file.
	- Go to: /private/etc/hosts

	Add in the following lines of Code:

	127.0.0.1       testingmultisite.com.au
	127.0.0.1       site1.testingmultisite.com.au
	127.0.0.1       site2.testingmultisite.com.au


	REMEMBER - IMPORTANT: The more sites we add via the main site,
	the more they need to be added via the hosts file to point to the correct IP address.










CREATING A SITE
================


1. All sites are separate, they just have different subdomains within different dashboards within one wordpress installation - A multisite

2. Add a theme within the Network (main dashboard) and make it 'Network Enabled'. This will make it available across all site installations.
Then we can add a child theme plugin and use a child theme, one for each site based of the original on the network.

3. Plugins recommended for nmultisite:
	- WP private Content Plus - protect pages and content from different users across all sites
	- Multisite Post Duplicator - Duplicates posts or pages from one multisite to another.
	- Weglot - a dropdown menu with language translation
	- Cloudflare - Can be used to serve a site depending on GEO Location or IP address.













GOING from local to Staging Server - Siteground
==================================================

1. Using Softilicious.
   To enable Multisite, you need to check the Enable Multisite (WPMU) option on the WordPress installation page in Softaculous.

2. Go through the same process as a normal installation.
   Then upload and replace the wp-content folder and drop / replace the database with the one from localhost.

3. Now we need to go into the database and see all the tables for each site.
   Change all the wp-options tables to the new url.
   Finally, we need to go into the wp_blogs table and update the url there too for the database to be fully connected.
   This is the difference between a normal migration and a mutisite migration.

4. Login to the admin site, and install Velvet Blue Plugin and make it 'network enabled'.
   Now we have to go into each site of the multisite and update the urls like any other site.



   

































