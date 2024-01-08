<?php

namespace App\Controllers;
use App\Controller;
use App\Models\Item;
use App\Models\WikiTags;
Class HomeController{
    public function index(){
        if(isset($_SESSION["role_user"])){
            if($_SESSION["role_user"]=="admin")  Controller::render("admin/index");
            if($_SESSION["role_user"]=="author")  Controller::render("user/index");
        }else{
            Controller::render("user/index");
        }
    }
    public function UserItems(){
        Controller::render("user/allItems");
    }
    public function userItemsAdmin(){
        $data['items']=Item::getAllItem();
        foreach ($data['items'] as $item){
            $data['wikis'][]=WikiTags::getWikisTags($item['wikiID']);
        }
        Controller::render("admin/itemAuthor",$data);
    }
}