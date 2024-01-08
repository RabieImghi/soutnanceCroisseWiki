<?php
namespace App\Models;
use App\Models\Database;
Class WikiTags{
    private $wikiID;
    private $tagID;

    public function __construct($wikiID,$tagID){
        $this->wikiID = $wikiID;
        $this->tagID = $tagID;
    }
    public function addWikiTags(){
        $db = Database::getConnection();
        $stmt=$db->prepare("INSERT INTO wiki_tags (wikiID,tagID) VALUES (?, ?)");
        $stmt->execute([$this->wikiID,$this->tagID]);
    }
    public static function getWikisTags($wikiID){
        $db = Database::getConnection();
        $stmt=$db->prepare("SELECT * FROM wiki_tags NATURAL JOIN tags WHERE wikiID = ?");
        $stmt->execute([$wikiID]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}