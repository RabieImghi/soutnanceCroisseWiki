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
    private $updateAt;

    public function __construct($title,$content,$userID,$categoryID,$urlImage){
        $this->title = $title;
        $this->content = $content;
        $this->userID = $userID;
        $this->categoryID = $categoryID;
        $this->urlImage = $urlImage;
        $this->deletedAt = null;
        $this->updateAt =date('Y-m-d H:i:s');
    }
    public function addNewItem(){
        $db = Database::getConnection();
        $stmt=$db->prepare("INSERT INTO wikis (title,content,userID,categoryID,urlImage,deletedAt,updateAt) VALUES (?,?,?,?,?,?,?) ");
        $stmt->execute([$this->title,$this->content,$this->userID,$this->categoryID,$this->urlImage,$this->deletedAt,$this->updateAt]);
        return $db->lastInsertId();
    }
    public function updateItem($idWiki){
        $db = Database::getConnection();
        $stmt=$db->prepare("UPDATE wikis SET title=?, content=?, userID=?, categoryID=?, urlImage=?, deletedAt=?, updateAt=? WHERE wikiID =?");
        $stmt->execute([$this->title,$this->content,$this->userID,$this->categoryID,$this->urlImage,$this->deletedAt,$this->updateAt,$idWiki]);
        return true;
    }
    public static function getAllItemUser($role=null){
        $db = Database::getConnection();
        if($role=="admin"){
            $stmt=$db->prepare("SELECT * FROM users NATURAL JOIN wikis NATURAL JOIN categories");
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }else{
            $stmt=$db->prepare("SELECT * FROM wikis NATURAL JOIN categories WHERE wikis.userID =? AND deletedAt IS NULL");
            $stmt->execute([$_SESSION['id_user']]);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        
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
            $stmt=$db->prepare("SELECT * FROM wikis NATURAL JOIN categories WHERE deletedAt IS NULL");
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }else{
            $stmt = $db->prepare("SELECT * FROM wikis NATURAL JOIN categories WHERE  deletedAt IS NULL ORDER BY updateAt DESC LIMIT :limit");
            $stmt->bindParam(':limit', $nombre,\PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        
    }
    public static function archiveItem($id){
        $db = Database::getConnection();
        $date=date('Y-m-d H:i:s');
        $stmt=$db->prepare("UPDATE wikis SET deletedAt=? WHERE wikiID =?");
        $stmt->execute([$date,$id]);
        return true;
    }
    public static function searchItemById($id){
        $db = Database::getConnection();
        $stmt=$db->prepare("SELECT * FROM users NATURAL JOIN wikis NATURAL JOIN categories WHERE wikis.wikiID =?");
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];
        return $result;
    }
    public static function search($type,$value){
        $db = Database::getConnection();
        $stmt=$db->prepare("SELECT * FROM tags NATURAL JOIN wiki_tags NATURAL JOIN wikis NATURAL JOIN categories 
        WHERE  deletedAt IS NULL AND $type LIKE ? GROUP BY wikis.wikiID ");
        $stmt->execute(["%$value%"]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }
}