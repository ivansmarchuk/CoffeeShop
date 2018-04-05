<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'coffee');

//http://localhost/CoffeeShop/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
//debug($app_path)
//http://localhost/CoffeeShop/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);
//http://localhost/CoffeeShop
 $app_path = str_replace('/public/', '', $app_path);
define("PATH", $app_path);
define("ADMIN", PATH . '/admin');

//echo $app_path;
//echo "/n";
require_once ROOT . '/vendor/autoload.php';

