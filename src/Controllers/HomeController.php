<?php

namespace App\Controllers;
use App\Controller;
Class HomeController{
    public function index(){
        if(isset($_SESSION["role_user"])){
            if($_SESSION["role_user"]=="admin")  Controller::render("admin/index");
            if($_SESSION["role_user"]=="author")  Controller::render("user/index");
        }else{
            Controller::render("user/index");
        }
    }
    public function UserItems(){
        Controller::render("user/allItems");
    }
}