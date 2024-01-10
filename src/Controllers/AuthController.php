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
        $dataJs = file_get_contents('php://input');
        $data=json_decode($dataJs,true);
        extract($data);
        $passHash= md5($password);
        $user = new User($username,$email,$passHash,'author');
        $result = $user->register();
        if($result) echo "successfuly";
        else echo "error";

    }
    public function loginUser(){
        $dataJs = file_get_contents('php://input');
        $data=json_decode($dataJs,true);
        extract($data);
        $passHash= md5($password);
        $user=User::login($email,$passHash);
        if(!empty($user)){
            $_SESSION["role_user"]=$user[0]['role'];
            $_SESSION['id_user']= $user[0]['userID'];
            echo "successfuly";
        }else{
            echo "error";
        }
    }
    public function logoutUser(){
        session_destroy();
        header("Location:".$_ENV["APP_URL"]."/");
        exit();
    }
}