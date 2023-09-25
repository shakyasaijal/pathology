<?php
require_once '../vendor/autoload.php';
session_start();
if (!defined('ALLOWED_INACTIVITY_TIME'))        define('ALLOWED_INACTIVITY_TIME', time()+1*60);
require_once 'Core/App.php';
require_once 'Core/Controller.php';
require_once 'config/config.php';
require_once 'Core/DB.php';
require_once 'utils/session.php';
