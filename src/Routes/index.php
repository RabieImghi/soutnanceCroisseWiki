<?php
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\ItemsController;
use App\Controllers\TagController;
use App\Controllers\CategoryController;

use App\Route;

$router = new Route();
$url =$_ENV['APP_URL'];
$router->get($url."/", HomeController::class,"index");

// Auth 
$router->post($url."/", AuthController::class,"loginUser");
$router->get($url."/login", AuthController::class,"login");
$router->get($url."/Registre", AuthController::class,"Registre");
$router->post($url."/login", AuthController::class,"RegistreUser");
$router->get($url."/logout", AuthController::class,"logoutUser");
// user router
$router->get($url."/items", HomeController::class,"UserItems");
$router->get($url."/userItems", HomeController::class,"userItemsAdmin");
$router->post($url."/userItems", ItemsController::class,"addNewItem");
$router->get($url."/deletItemUser", ItemsController::class,"deletItemUser");



// admin router 
$router->get($url."/AdminItems", ItemsController::class,"getItems");
$router->get($url."/TagsLists", TagController::class,"getAllTags");
$router->get($url."/CategorysLists", CategoryController::class,"getAllCategory");




$router->dispatch();