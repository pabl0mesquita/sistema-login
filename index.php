<?php

require __DIR__."/vendor/autoload.php";

use Source\Core\Session;
use CoffeeCode\Router\Router;

$session = new Session();
$route = new Router(url(), ":");

$route->namespace('Source\App');
$route->get('/', 'Web:index');
$route->post('/login','Web:login');





####################
### ERROR ROUTES ###
####################
$route->namespace('Source\App')->group('/ops');
$route->get('/{errcode}', 'Web:error');

/**
 * ROUTE
 */

$route->dispatch();

/**
 * ERROR REDIRECT
 */

if($route->error()){
    $route->redirect("/ops/{$route->error()}");
}

