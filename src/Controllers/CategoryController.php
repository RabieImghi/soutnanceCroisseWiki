<?php 
namespace App\Controllers;
use App\Controller;
use App\Models\Category;
use App\Controllers\AuthMiddlewareController;
Class CategoryController{
    public function getAllCategory(){
        AuthMiddlewareController::handle();
        $data['categorys']=Category::getAllCategory('n');
        Controller::render("admin/category/category",$data);
    }
    public function addNewCategory(){
        AuthMiddlewareController::handle();
        extract($_POST);
        $Category=new Category($nameC,$decription);
        $Category->addNewCategory();
        $this->getAllCategory();
    }
    public function deletCatgory(){
        AuthMiddlewareController::handle();
        $id=$_GET['id'];
        Category::deletCatgory($id);
        $data['categorys']=Category::getAllCategory('n');
        Controller::render("admin/category/deletCatView",$data);
    }
    public function updateCategory(){
        AuthMiddlewareController::handle();
        extract($_POST);
        $Category=new Category($nameC,$decription);
        $Category->updateCategory($idCat);
        $this->getAllCategory();
    }
}