<?php 
namespace App\Controllers;
use App\Controller;
use App\Models\Category;
Class CategoryController{
    public function getAllCategory(){
        $data['categorys']=Category::getAllCategory('n');
        Controller::render("admin/category",$data);
    }
}