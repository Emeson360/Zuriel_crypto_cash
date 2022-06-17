<?php
session_start();
define('APP_ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

$isLoggedIn = false; 

require APP_ROOT . DS . 'dashboard' .DS. 'core' . DS . 'config' . DS . 'config.php';
require APP_ROOT . DS . 'dashboard' .DS. 'core' . DS . 'db' . DS . 'connect.php';
// require APP_ROOT . DS . 'dashboard' .DS. 'core' . DS . 'util' . DS . 'helpers.php';
require APP_ROOT . DS . 'dashboard' .DS. 'core' . DS . 'controller'  . DS . 'function.php';
// require APP_ROOT . DS . 'dashboard' .DS. 'core' . DS . 'middleware'  . DS . 'middleware.php';