<?php 
namespace App\Controllers;
use App\Controller;
Class CategoryController{
    public function getAllCategory(){
        Controller::render("admin/category");
    }
}