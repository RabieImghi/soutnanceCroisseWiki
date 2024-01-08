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
    public static function getAllItem(){
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
}