<?php

namespace App\Controllers;
use App\Controller;
use App\Controllers\HomeController;
use App\Models\User;
Class AuthController{
    
    public function login(){
        Controller::render("Auth/login");
    }
    public function Registre($data=[]){
        Controller::render("Auth/registre");
    }
    public function RegistreUser(){
        extract($_POST);
        $passHash= md5($password);
        $user = new User($username,$email,$passHash,'author');
        $result = $user->register();
        if($result) $this->login();
        else {
            $this->Registre();
        }

    }
    public function loginUser(){
        extract($_POST);
        $passHash= md5($password);
        $user=User::login($email,$passHash);
        if(!empty($user)){
            $_SESSION["role_user"]=$user[0]['role'];
            $_SESSION['id_user']= $user[0]['userID'];
            $view=new HomeController();
            $view->index();
        }else{
            Controller::render("Auth/login");
        }
    }
    public function logoutUser(){
        session_destroy();
        header("Location:".$_ENV["APP_URL"]."/");
        exit();
    }
}