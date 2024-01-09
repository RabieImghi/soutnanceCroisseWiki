<?php
namespace App\Controllers;
use App\Controller;
use App\Models\Tage;
Class TagController{
    public function getAllTags(){
        $data['allTagss']=Tage::getAllTags();
        Controller::render("admin/tags",$data);
    }
    
}