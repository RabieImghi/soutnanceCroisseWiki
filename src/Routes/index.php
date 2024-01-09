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
$router->post($url."/updateItems", ItemsController::class,"updateItem");
$router->get($url."/deletItemUser", ItemsController::class,"deletItemUser");


// admin router 
$router->get($url."/AdminItems", ItemsController::class,"getItems");
$router->get($url."/TagsLists", TagController::class,"getAllTags");
$router->get($url."/CategorysLists", CategoryController::class,"getAllCategory");
$router->get($url."/archiveItem", ItemsController::class,"archiveItem");
$router->post($url."/TagsLists", TagController::class,"addNewTag");
$router->post($url."/updateTags", TagController::class,"updateTags");
$router->get($url."/deletTags", TagController::class,"deletTag");
$router->get($url."/deletCatgory", CategoryController::class,"deletCatgory");
$router->post($url."/CategorysLists", CategoryController::class,"addNewCategory");
$router->post($url."/updateCategory", CategoryController::class,"updateCategory");





$router->dispatch();