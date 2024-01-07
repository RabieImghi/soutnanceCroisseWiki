<?php

namespace App\Controllers;
use App\Controller;
use App\Models\User;
Class AuthController{
    
    public function login(){
        Controller::render("Auth/login");
    }
    public function Registre($data=[]){
        Controller::render("Auth/registre");
    }
    public function loginUser(){
        extract($_POST);
        $passHash= md5($password);
        $user = new User($username,$email,$passHash,'author');
        $result = $user->register();
        if($result) $this->login();
        else {
            $this->Registre($data);
        }

    }
}