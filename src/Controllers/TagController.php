<?php
namespace App\Controllers;
use App\Controller;
use App\Models\Tage;
Class TagController{
    public function getAllTags(){
        $data['allTagss']=Tage::getAllTags();
        Controller::render("admin/tags",$data);
    }
    public function addNewTag(){
        extract($_POST);
        $tag=new Tage($Name,$decription);
        $tag->addNewTag();
        $this->getAllTags();
    }
    public function deletTag(){
        $id=$_GET['id'];
        Tage::deletTag($id);
        $data['allTagss']=Tage::getAllTags();
        Controller::render("admin/deletTagView",$data);
    }
    public function updateTags(){
        extract($_POST);
        $tag=new Tage($Name,$decription);
        $tag->updateTags($idTag);
        $this->getAllTags();
    }
}