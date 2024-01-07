<?php
namespace App\Models;
Class Database{
    public static $db;
    public static function getConnection(){
        return self::$db = new \PDO("mysql:host={$_ENV['HOST']};user={$_ENV['USER']};dbname={$_ENV['DBNAME']}");
    }
}