<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
	/** database config **/
	define('DB_NAME', 'mvc_php');
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_DRIVER', '');

	define('ROOT', 'http://localhost:3000');
} else {
	/** database config **/
	define('DB_NAME', 'my_db');
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_DRIVER', '');

	define('ROOT', 'https://www.yourwebsite.com');
}

define('APP_NAME', "My Webiste");
define('APP_DESC', "Best website on the planet");

/** true means show errors **/
define('DEBUG', true);
