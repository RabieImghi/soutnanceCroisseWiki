<?php
namespace App\Controllers;
use App\Controller;
Class TagController{
    public function getAllTags(){
        Controller::render("admin/tags");
    }
}