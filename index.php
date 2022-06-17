<?php
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];
if(empty($url)){
   $url[0] = 'home';
}
if(file_exists($url[0] . '.php')){
   require_once($url[0] . '.php');
}else{
   require_once("404.php");
}