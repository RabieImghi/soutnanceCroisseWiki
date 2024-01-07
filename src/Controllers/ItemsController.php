<?php 
namespace App\Controllers;
use App\Controller;
Class ItemsController{
    public function getItems(){
        Controller::render("admin/item");
    }
}