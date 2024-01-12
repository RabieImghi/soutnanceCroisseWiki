<?php
namespace App\Controllers;
use App\Controller;
use App\Models\Tage;
use App\Controllers\AuthMiddlewareController;
Class TagController{
    public function getAllTags(){
        AuthMiddlewareController::handle();
        $data['allTagss']=Tage::getAllTags();
        Controller::render("admin/tags/tags",$data);
    }
    public function addNewTag(){
        AuthMiddlewareController::handle();
        extract($_POST);
        $tag=new Tage($Name,$decription);
        $tag->addNewTag();
        $this->getAllTags();
    }
    public function deletTag(){
        AuthMiddlewareController::handle();
        $id=$_GET['id'];
        Tage::deletTag($id);
        $data['allTagss']=Tage::getAllTags();
        Controller::render("admin/tags/deletTagView",$data);
    }
    public function updateTags(){
        AuthMiddlewareController::handle();
        extract($_POST);
        $tag=new Tage($Name,$decription);
        $tag->updateTags($idTag);
        $this->getAllTags();
    }
}