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
        if($_FILES["photo"]['name']!=''){
            $targetDir = "assets/uploads/"; 
            $imageName=date("Y_m_d_H_i_s"). basename($_FILES["photo"]["name"]);
            $targetFile = $targetDir.$imageName;
            move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);
        }else{
            $imageName='deafult.jpeg';
        }
        $item = new Item($title,$content,$userID,$category,$imageName);
            $idItems=$item->addNewItem();
            if(!empty($Tags) && count($Tags)>0){
                for($i= 0;$i<count($Tags);$i++){   
                    $tagWiki = new WikiTags($idItems,$Tags[$i]);
                    $tagWiki->addWikiTags();
                }
            }
            $views = new HomeController();
            $views->userItemsAdmin();
    }
    public function deletItemUser(){
        $id = $_GET["id"];
        $urlimage = $_GET["url"];
        $res= Item::deletItem($id);
        if($res){
            $imagePath = 'assets/uploads/'.$urlimage;
            if (file_exists($imagePath) && $urlimage != "deafult.jpeg") {
                unlink($imagePath);
            } 
            $data['items']=Item::getAllItemUser();
            foreach ($data['items'] as $item){
                $data['wikis'][]=WikiTags::getWikisTags($item['wikiID']);
            }
            Controller::render("admin/deletView", $data);
        }
    }
}