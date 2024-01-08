<?php 
namespace App\Controllers;
use App\Controller;
use App\Controllers\HomeController;
use App\Models\Item;
use App\Models\WikiTags;
Class ItemsController{
    
    public function getItems(){
        Controller::render("admin/item");
    }
    public function addNewItem(){
        extract($_POST);
        $userID=$_SESSION['id_user'];
        $item = new Item($title,$content,$userID,$category,'test.png');
        $idItems=$item->addNewItem();
        if(count($Tags)>0){
            for($i= 0;$i<count($Tags);$i++){   
                $tagWiki = new WikiTags($idItems,$Tags[$i]);
                $tagWiki->addWikiTags();
            }
        }
        $views = new HomeController();
        $views->userItemsAdmin();
    }
}