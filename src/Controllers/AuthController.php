<?php

namespace App\Controllers;
use App\Controller;
Class AuthController{
    
    public function login(){
        Controller::render("Auth/login");
    }
    public function Registre(){
        Controller::render("Auth/registre");
    }
}