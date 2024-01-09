<?php
namespace App\Models;
use App\Models\Database;
Class Tage{
    private $nameT;
    private $decription;

    public function __construct($name,$decription){
        $this->nameT = $name;
        $this->decription = $decription;
    }
    public static function getAllTags(){
        $db = Database::getConnection();
        $stmt=$db->prepare("SELECT * FROM tags");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function addNewTag(){
        $db = Database::getConnection();
        $stmt=$db->prepare("INSERT INTO tags (nameT,decription) VALUES (?,?)");
        $stmt->execute([$this->nameT,$this->decription]);
        return true;
    }
    public static function deletTag($id){
        $db = Database::getConnection();
        $stmt=$db->prepare("DELETE FROM tags WHERE tagID = ?");
        $stmt->execute([$id]);
        return true;
    }
    public function updateTags($id){
        $db = Database::getConnection();
        $stmt=$db->prepare("UPDATE tags SET nameT=?,decription=? WHERE tagID = ?");
        $stmt->execute([$this->nameT,$this->decription,$id]);
        return true;
    }
}