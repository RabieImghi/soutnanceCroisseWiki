<?php 
namespace App\Controllers;
use App\Controller;
use App\Models\Category;
Class CategoryController{
    public function getAllCategory(){
        $data['categorys']=Category::getAllCategory('n');
        Controller::render("admin/category",$data);
    }
    public function addNewCategory(){
        extract($_POST);
        $Category=new Category($nameC,$decription);
        $Category->addNewCategory();
        $this->getAllCategory();
    }
    public function deletCatgory(){
        $id=$_GET['id'];
        Category::deletCatgory($id);
        $data['categorys']=Category::getAllCategory('n');
        Controller::render("admin/deletCatView",$data);
    }
    public function updateCategory(){
        extract($_POST);
        $Category=new Category($nameC,$decription);
        $Category->updateCategory($idCat);
        $this->getAllCategory();
    }
}