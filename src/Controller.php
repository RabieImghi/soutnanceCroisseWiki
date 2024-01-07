<?php
namespace App;
Class Controller{
    public static function render($view,$data=[]){
        extract($data);
        include_once "../views/$view.php";
    }
}