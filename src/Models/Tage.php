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
}