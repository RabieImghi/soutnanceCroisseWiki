<?php
namespace App\Models;
use App\Models\Database;
Class Item{
    private $title;
    private $content;
    private $userID;
    private $categoryID;
    private $urlImage;
    private $deletedAt;

    public function __construct($title,$content,$userID,$categoryID,$urlImage){
        $this->title = $title;
        $this->content = $content;
        $this->userID = $userID;
        $this->categoryID = $categoryID;
        $this->urlImage = $urlImage;
        $this->deletedAt = null;
    }
    public function addNewItem(){
        $db = Database::getConnection();
        $stmt=$db->prepare("INSERT INTO wikis (title,content,userID,categoryID,urlImage,deletedAt) VALUES (?,?,?,?,?,?) ");
        $stmt->execute([$this->title,$this->content,$this->userID,$this->categoryID,$this->urlImage,$this->deletedAt]);
        return $db->lastInsertId();
    }
    public function updateItem($idWiki){
        $db = Database::getConnection();
        $stmt=$db->prepare("UPDATE wikis SET title=?, content=?, userID=?, categoryID=?, urlImage=?, deletedAt=? WHERE wikiID =?");
        $stmt->execute([$this->title,$this->content,$this->userID,$this->categoryID,$this->urlImage,$this->deletedAt,$idWiki]);
        return true;
    }
    public static function getAllItemUser(){
        $db = Database::getConnection();
        $stmt=$db->prepare("SELECT * FROM wikis NATURAL JOIN categories WHERE wikis.userID =?");
        $stmt->execute([$_SESSION['id_user']]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public static function deletItem($id){
        $db = Database::getConnection();
        $stmt=$db->prepare("DELETE FROM wikis  WHERE wikiID=?");
        $stmt->execute([$id]);
        return true;
    }
    public static function getAllItem($nombre){
        $db = Database::getConnection();
        if($nombre=="n"){
            $stmt=$db->prepare("SELECT * FROM wikis NATURAL JOIN categories");
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }else{
            $stmt = $db->prepare("SELECT * FROM wikis NATURAL JOIN categories ORDER BY wikiID DESC LIMIT :limit");
            $stmt->bindParam(':limit', $nombre,\PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        
    }
}