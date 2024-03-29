<?php
namespace App\Models;
use App\Models\Database;
Class User{
    private $username;
    private $password;
    private $email;
    private $role;

    public function __construct($username,  $email, $password, $role){
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }
    public function register(){
        $db = Database::getConnection();
        $stmtSearch=$db->prepare("SELECT * FROM users WHERE email=?");
        $stmtSearch->execute([$this->email]);
        $rows=$stmtSearch->rowCount();
        if($rows > 0){
            return false;
        }else{
            $stmt = $db->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
            $stmt->execute([$this->username, $this->email, $this->password, $this->role]);
            return true;
        }
    }
    public static function login($email,$password){
        $db = Database::getConnection();
        $stmtSearch=$db->prepare("SELECT * FROM users WHERE email=? AND password=?");
        $stmtSearch->execute([$email,$password]);
        return $stmtSearch->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function getStatistical(){
        $db = Database::getConnection();
        $countItems=$db->prepare("SELECT count(wikiID) as total FROM wikis");
        $countItems->execute();
        $data['countItems'] = $countItems->fetchAll(\PDO::FETCH_ASSOC)[0];
        
        $countCateg=$db->prepare("SELECT count(*) as total FROM categories");
        $countCateg->execute();
        $data['countCateg'] = $countCateg->fetchAll(\PDO::FETCH_ASSOC)[0];

        $countTags=$db->prepare("SELECT count(*) as total FROM tags");
        $countTags->execute();
        $data['countTags'] = $countTags->fetchAll(\PDO::FETCH_ASSOC)[0];
        
        $countUser=$db->prepare("SELECT count(*) as total FROM users");
        $countUser->execute();
        $data['countUser'] = $countUser->fetchAll(\PDO::FETCH_ASSOC)[0];

        return $data;
    }
}