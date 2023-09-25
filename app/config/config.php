<?php

//Note: This file should be included first in every php page.
error_reporting(E_ALL);
ini_set('display_errors', 'On');

/*
|--------------------------------------------------------------------------
| ENVIRONMENT VARIABLES CONFIGURATION
|--------------------------------------------------------------------------
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
// Retrive env variable
$db_host = $_ENV['DB_HOST'];
$db_user_name = $_ENV['DB_USER_NAME'];
$db_password = $_ENV['DB_PASSWORD'];
$db_name = $_ENV['DB_NAME'];
$email_host = $_ENV['EMAIL_HOST'];
$email_username = $_ENV['EMAIL_USERNAME'];
$email_password = $_ENV['EMAIL_PASSWORD'];
$email_port = $_ENV['EMAIL_PORT'];

/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
 */

define('DB_HOST', $db_host);
define('DB_USER', $db_user_name);
define('DB_PASSWORD', $db_password);
define('DB_NAME', $db_name);
define('EMAIL_HOST', $email_host);
define('EMAIL_USERNAME', $email_username);
define('EMAIL_PASSWORD', $email_password);
define('EMAIL_PORT', $email_port);
