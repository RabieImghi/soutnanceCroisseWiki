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
}