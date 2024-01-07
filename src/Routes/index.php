<?php
use App\Controllers\HomeController;
use App\Route;

$router = new Route();
$url =$_ENV['APP_URL'];
$router->get($url."/", HomeController::class,"index");
$router->get($url."/items", HomeController::class,"UserItems");
$router->dispatch();