<?php

include("Theme.php");
class ManagerTheme{


    static function findAll(PDO $cnx): array{
        // requete SQL avec la string SQL 
        // injection sql tres grand morceau de sécurité !! on prépare les requête pour assurer une sécurité 
        $sql = 
                    "SELECT id_theme, libelle FROM themes";
        // toujours tester la requete sql

        // pousser une requette préparer
        //-- La méhode prepare() de l objet pdo retourne un objet pdoStatmenet
        // rapidité d écécution en cas de multiples demande et protege des injection sql 
        // pdo::prepare(string sql ) : pdostatement
        // a prendre TEL QUEL
        $PDOStmt = $cnx->prepare($sql);

        // Binding params si il y a des parametre si il y a filtre where libele qui commence par a on se débrouilleras pour que le filtre deviens dynamique ^^

        // EXECUTION de la requète préparé !!! 
        $PDOStmt->execute();
        // ICI : un flot de données en provenance de mysql est dispo via les méthodes 
        // de fetching d'un objet de type PDOStatment
        // la methode doit retourner quelque chose !! un array !! 
        $liste = []; // liste retournée 
        // tant que y a un prochain resultat dans le jeu du resultat mysql tu le mets dans un truc qui s appel record 
        while( $record = $PDOStmt->fetch(PDO::FETCH_OBJ)){
            // fetch je vais te ramener chaque prochain enregistrement soit en obj ou en assoc ici on décide de le montrer puis le manipuler a notre guise ! 
            // Un objet pour chaque enregistrement
            $obj = new Theme;
            $obj->setIdTheme($record->id_theme); // nom de la colonne tel quel 
            $obj->setLibelle($record->libelle);

            array_push($liste, $obj);
        }
        return $liste;
    }
    // static function findById(PDO $cnx, int $id):Theme{
    // }
    // static function create(PDO $cnx, Theme $theme):void{
    // }
    // static function modify(PDO $cnx, Theme $theme):void{
    // }
    // static function delete(PDO $cnx, Theme $theme):void{
    // }
    
}

?>