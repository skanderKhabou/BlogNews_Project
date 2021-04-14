<?php 
class MaConnexion{
    // Attributs
    private static $url = "mysql:host=localhost:3306;dbname=my_news";
    private static $user = "root";
    private static $pass = "root";

    static function connect(): PDO {
        return new PDO(MaConnexion::$url, MaConnexion::$user, MaConnexion::$pass);
    }
}