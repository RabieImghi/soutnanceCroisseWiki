<?php

namespace App\Controllers;
use App\Controller;
use App\Models\Item;
use App\Models\WikiTags;
use App\Models\Category;
Class HomeController{
    public function index(){
        $data['items']=Item::getAllItem(3);
        foreach ($data['items'] as $item){
            $data['wikis'][]=WikiTags::getWikisTags($item['wikiID']);
        }
        $data['categorys']=Category::getAllCategory(4);
        if(isset($_SESSION["role_user"])){
            if($_SESSION["role_user"]=="admin")  Controller::render("admin/index");
            if($_SESSION["role_user"]=="author") {
                Controller::render("user/index",$data);
            } 
        }else{
            Controller::render("user/index",$data);
        }
    }
    public function UserItems(){
        $data['items']=Item::getAllItem("n");
        foreach ($data['items'] as $item){
            $data['wikis'][]=WikiTags::getWikisTags($item['wikiID']);
        }
        Controller::render("user/allItems",$data);
    }
    public function userItemsAdmin(){
        $data['items']=Item::getAllItemUser();
        foreach ($data['items'] as $item){
            $data['wikis'][]=WikiTags::getWikisTags($item['wikiID']);
        }
        Controller::render("admin/itemAuthor",$data);
    }
}