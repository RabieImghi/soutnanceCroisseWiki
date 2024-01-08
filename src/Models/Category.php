<?php
namespace App\Models;
use App\Models\Database;
Class Category{
    private $wikiID;
    private $tagID;

    public function __construct($wikiID,$tagID){
        $this->wikiID = $wikiID;
        $this->tagID = $tagID;
    }
    public static function getAllCategory($nombre){
        $db = Database::getConnection();
        if($nombre!="n"){
            $stmt = $db->prepare("SELECT * FROM  categories ORDER BY categoryID DESC LIMIT :limit");
            $stmt->bindParam(':limit', $nombre,\PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }else{
            $stmt=$db->prepare("SELECT * FROM categories");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        
    }
}