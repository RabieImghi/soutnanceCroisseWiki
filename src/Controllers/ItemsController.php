<?php 
namespace App\Controllers;
use App\Controller;
use App\Controllers\HomeController;
use App\Models\Item;
use App\Models\WikiTags;
use App\Models\Category;
use App\Models\Tage;
use App\Controllers\AuthMiddlewareController;
Class ItemsController{
    
    public function getItems(){
        AuthMiddlewareController::handle();
        $data['items']=Item::getAllItemUser("admin");
        foreach ($data['items'] as $item){
            $data['wikis'][]=WikiTags::getWikisTags($item['wikiID']);
        }
        $data['categorys']=Category::getAllCategory("n");
        $data['tagsWikis']=Tage::getAllTags();
        Controller::render("admin/items/item",$data);
    }
    public function addNewItem(){
        AuthMiddlewareController::handle();
        $views = new HomeController();
        extract($_POST);
        $error=true;
        unset($_SESSION["errorMessage"]);
        $typeFileTable=['image/jpeg','image/png','image/jpg'];
        if($csrf_token==$_SESSION['csrf_token']){
            $userID=$_SESSION['id_user'];
            if($_FILES["photo"]['name']!=''){
                $resultat=$this->validateImage($_FILES['photo'],10000,$typeFileTable);
                if($resultat){
                    $targetDir = "assets/uploads/"; 
                    $imageName=date("Y_m_d_H_i_s"). basename($_FILES["photo"]["name"]);
                    $targetFile = $targetDir.$imageName;
                    move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);
                }else {
                    $views->userItemsAdmin();
                    die();
                }
            }else{
                $imageName='deafult.jpeg';
            }
            $result=$this->validateInput($title,$content,$category);
            if($result && $error==true){
                $title = htmlspecialchars($title, ENT_QUOTES,'UTF-8');
                $content = htmlspecialchars($content, ENT_QUOTES,'UTF-8');
                $item = new Item($title,$content,$userID,$category,$imageName);
                $idItems=$item->addNewItem();
                if(!empty($Tags) && count($Tags)>0){
                    for($i= 0;$i<count($Tags);$i++){   
                        $tagWiki = new WikiTags($idItems,$Tags[$i]);
                        $tagWiki->addWikiTags();
                    }
                }
                $_SESSION['succesAdd']="ok";
            }
            $views->userItemsAdmin();
        }
    }
    public function deletItemUser(){
        AuthMiddlewareController::handle();
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
            $data['categorys']=Category::getAllCategory("n");
            $data['tagsWikis']=Tage::getAllTags();
            Controller::render("admin/items/deletView", $data);
        }
    }
    public function updateItem(){
        AuthMiddlewareController::handle();
        extract($_POST);
        $error=true;
        $views = new HomeController();
        unset($_SESSION["errorMessage"]);
        $typeFileTable=['image/jpeg','image/png','image/jpg'];
        if($csrf_token==$_SESSION['csrf_token']){
            $userID=$_SESSION['id_user'];
            $resultat=$this->validateImage($_FILES['photo'],10000,$typeFileTable);
            if($_FILES["photo"]['name']!=''){
                if($resultat){
                    $imagePath = 'assets/uploads/'.$urlimage;
                    if (file_exists($imagePath) && $urlimage != "deafult.jpeg") {
                        unlink($imagePath);
                    } 
                    $targetDir = "assets/uploads/"; 
                    $imageName=date("Y_m_d_H_i_s"). basename($_FILES["photo"]["name"]);
                    $targetFile = $targetDir.$imageName;
                    move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);
                }else {
                    $views->userItemsAdmin();
                    die();
                }
            }else{
                $imageName="deafult.jpeg";
            }
            $result=$this->validateInput($title,$content,$category);
            if($result && $error==true){
                $title = htmlspecialchars($title, ENT_QUOTES,'UTF-8');
                $content = htmlspecialchars($content, ENT_QUOTES,'UTF-8');
                $item = new Item($title,$content,$userID,$category,$imageName);
                $item->updateItem($idWiki);
                if(!empty($Tags) && count($Tags)>0){
                    WikiTags::deletWikTags($idWiki);
                    for($i= 0;$i<count($Tags);$i++){   
                        $tagWiki = new WikiTags($idWiki,$Tags[$i]);
                        $tagWiki->addWikiTags();
                    }
                }
                $_SESSION['succesAdd']="ok";
            }
            $views->userItemsAdmin();
        }
    }
    public function archiveItem(){
        AuthMiddlewareController::handle();
        $id = $_GET["id"];
        Item::archiveItem($id);
    }
    public function detailItem(){
        $id= $_GET["idItem"];
        $data['oneItem']=Item::searchItemById($id);
        $data['wikis']=WikiTags::getWikisTags($data['oneItem']['wikiID']);
        Controller::render('user/details', $data);
    }
    public static function validateImage($file, $maxSize, $allowedTypes) {
        $test=true;
        $fileType = $file['type'];
        $fileSize = $file['size'];
        if (!in_array($fileType, $allowedTypes)) {
            $_SESSION["errorMessage"] = 'Invalid file type. Please upload an image with the format JPG, PNG, or JPEG.';
            $test = false;
        } 
        if ($fileSize >= $maxSize) {
            $_SESSION["errorMessage"] = 'The uploaded image size is too large. Please upload an image with a smaller size.';
            $test = false;
        }
        return $test;
    }
    public static function validateInput($title, $content, $category) {
        $test=true;
        if($title ==""){ 
            $_SESSION["errorMessage"]="Title is required. Please provide a title for the Item.";
            $test = false;
        }
        if($content ==""){
            $_SESSION["errorMessage"]="Content is required. Please provide a content for the Item.";
            $test = false;
        } 
        if($category =="null") {
            $_SESSION["errorMessage"]="Category is required. Please select a category for the Item.";
            $test = false;
        }
        return $test;
    }
}