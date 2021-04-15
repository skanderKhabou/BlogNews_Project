<?php 
class MaConnexion{
    // Attributs
    private static $url = "mysql:host=localhost:3306;dbname=my_news";
    private static $user = "root";
    private static $pass = "root";

    // php data object 
    // couche d abstraction entre la logique et le sgbd l'objet va vraiment nous affranchir du driver et s occupe de tout en arriere plan 
    // il s occupe du driver et de nous fournir des methodes pour interagir avec le mysql , et nous fourni un objet pdo statment qui nous sera utile 
    static function connect(): PDO {
        return new PDO(MaConnexion::$url, MaConnexion::$user, MaConnexion::$pass);
    }
}