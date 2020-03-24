        Security Protection for Wordpress

-----------------------
        .HTACCESS FILE
-----------------------


.htaccess file is generally in the root folder and is hidden.
If using filezilla, simply go 'server - force showing hidden files' to display.
The fact .htaccess starts with a (.)[dot] indicates it should be hidden in all applications, including OS.
Simply create a file called 'htaccess', import the htaccess info given, save it do the desktop then,
drag it into the root of the site and rename it, '.htaccess' 


        To disable the directory listing on a specific directory, use this..

        IndexIgnore *
        IndexIgnore *.php 
        indexIgnore *.jpg *.gif *.png


3.     Protect the dashboard theme / plugin editor...

        define( 'DISALLOW_FILE_EDIT', true );
        define( 'DISALLOW_FILE_MODS', true );


4.      Protect the wp-config file...

        # protect wp-config.php
        <files wp-config.php>
        order allow,deny
        deny from all
        </files>


5.      Protect from executible malware...
        
        # deny all .exe files
        <files "*.exe">
        order deny,allow 
        deny from all 
        </files>



3.      Now to protect the .HTACCESS file itself, add this code...

        # protect .htaccess file
        <Files ~ "^.*\.([Hh][Tt][Aa])">
        Optionsrder allow,deny
        deny from all
        satisfy all
        </Files>



-----------------------
        HEADER.PHP
-----------------------


4.      In the header.php file, make sure this code is deleted if present...
        
        <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

        This displays which version of wp is used therefore can be intruded depending on the version.



5.      Security Plugins

        5.1 WPbackup- Backup database
        https://wordpress.org/plugins/backwpup/


        5.1 CryptX - Email hide and encrypt from robots and spammers
        http://wordpress.org/plugins/cryptx/

        5.3 Login LockDown  - Limits attempt at unknown logins and records IP addresses to prevent unsuccessful logins
        http://wordpress.org/plugins/login-lockdown/

        5.2 All In One WP Security & Firewall
        https://wordpress.org/plugins/all-in-one-wp-security-and-firewall/

        