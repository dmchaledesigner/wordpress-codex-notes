<?php


$http_host = getenv('HTTP_HOST');

switch ($http_host) {


        /* DEVELOPMENT */
        case 'dev.mysite.com':
        /** The name of the database for WordPress */
        define('DB_NAME', 'wpdev_mysite');

        /** MySQL database username */
        define('DB_USER', 'dev_username');

        /** MySQL database password */
        define('DB_PASSWORD', 'dev_password');

        /** MySQL hostname */
        define('DB_HOST', 'localhost');
        break;



        /* STAGING */
        case 'stage.mysite.com':
        /** The name of the database for WordPress */
        define('DB_NAME', 'wpstage_mysite');

        /** MySQL database username */
        define('DB_USER', 'stage_username');

        /** MySQL database password */
        define('DB_PASSWORD', 'stage_password');

        /** MySQL hostname */
        define('DB_HOST', 'localhost');
        break;




        /* PRODUCTION */
        case 'mysite.com':
        /** The name of the database for WordPress */
        define('DB_NAME', 'wpprod_mysite');

        /** MySQL database username */
        define('DB_USER', 'username');

        /** MySQL database password */
        define('DB_PASSWORD', 'password');

        /** MySQL hostname */
        define('DB_HOST', 'localhost');
        break;


        default:
        break;
}

?>






or we can use this...




<?php 




switch($_SERVER['SERVER_NAME']) {

        //local
        case 'localhost':
                define('DB_NAME', '');
                define('DB_USER', '');
                define('DB_PASSWORD', '');
                define('DB_HOST', '127.0.0.1');
                define('DB_CHARSET', 'utf8');
                define('DB_COLLATE', '');
                define('WP_DEBUG', true);
                define('FS_METHOD','direct'); //only ever set this locally. Can be a security vulnerability on a server.
                break;
        //dev
        case 'staging.mysite.com':
                define('DB_NAME', '');
                define('DB_USER', '');
                define('DB_PASSWORD', '');
                define('DB_HOST', '127.0.0.1');
                define('DB_CHARSET', 'utf8');
                define('DB_COLLATE', '');
                define('WP_DEBUG', false);
                break;
        //live
        case 'mysite.com':
                define('DB_NAME', '');
                define('DB_USER', '');
                define('DB_PASSWORD', '');
                define('DB_HOST', 'localhost');
                define('DB_CHARSET', 'utf8');
                define('DB_COLLATE', '');
                define('WP_DEBUG', false);
                break;
        default:
                die("<html><head><title>Maintenance</title></head><body><h1>Maintenance: {$_SERVER['SERVER_NAME']}</h1><p>You are visiting {$_SERVER['SERVER_NAME']}, please bear with us while we enable the site</p></body></html>");
}



?>