<?php
namespace App\Models;
use App\Models\Database;
Class Category{
    private $nameC;
    private $decription;

    public function __construct($name,$decription){
        $this->nameC = $name;
        $this->decription = $decription;
    }
    public function addNewCategory() {
        $db = Database::getConnection();
        $stmt=$db->prepare("INSERT INTO categories (nameC,descr) VALUES (?,?)");
        $stmt->execute([$this->nameC,$this->decription]);
        return true;
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
    public static function deletCatgory($id){
        $db = Database::getConnection();
        $stmt=$db->prepare("DELETE FROM categories WHERE categoryID = ?");
        $stmt->execute([$id]);
        return true;
    }
}