<?php

include("Theme.php");
// include("Theme.php"); if auto load !! 
class ManagerTheme{


    static function findAll(PDO $cnx): array{
        // requete SQL avec la string SQL 
        // injection sql tres grand morceau de sécurité !! on prépare les requête pour assurer une sécurité 
        $sql = 
                    "SELECT id_theme, libelle FROM themes ORDER BY libelle";
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
        // try fetchAll
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
     
    /////////------------------------------------------------------------/////////////
    static function create(PDO $cnx, Theme $theme):void{

        // on parse l'objet car php n est pas fonctionnel il faut mettre la fonction dans une variable
        $libelle = $theme->getLibelle();
// requete sql
        $sql = 
        "INSERT INTO themes(libelle) VALUES(?)";
    // -- préparation
        $PDOStmt = $cnx->prepare($sql);
        // -- Bind params
        $PDOStmt->bindParam(1, $libelle, PDO::PARAM_STR);

    // -- EXECUTER
        $PDOStmt->execute();
        // -- $res = $PDOStmt->execute();
    }

    ////////////////-----------------------------------/////////////////////////
    static function findById(PDO $cnx, int $id) : Theme{
        // requete sql
        $sql = 
        "SELECT id_theme,libelle 
        FROM themes
         WHERE id_theme = ? ";
    // -- préparation
        $PDOStmt = $cnx->prepare($sql);
        // -- Bind params
        $PDOStmt->bindParam(1,  $id, PDO::PARAM_INT);

    // -- EXECUTER
        $PDOStmt->execute();
        // -- $res = $PDOStmt->execute();
        $obj = new Theme();
        // var_dump($obj);
        // var_dump($PDOStmt->fetch(PDO::FETCH_OBJ));
       while($record = $PDOStmt->fetch(PDO::FETCH_OBJ) ){
        $obj->setIdTheme($record->id_theme); // nom de la colonne tel quel 
        $obj->setLibelle($record->libelle);
       };
        // $obj = $PDOStmt->fetch(PDO::FETCH_OBJ);
        return $obj; 
    }
  
    //////---------------------------------------------------////////////////
    static function modify(PDO $cnx, Theme $theme):void{

            // ON PARSE L OBJET MALHEUREUSEMENT 
        $id_theme = $theme->getIdTheme();
        $libelle = $theme->getLibelle();
         // requete sql
         $sql = 
         "UPDATE themes
         SET libelle = ?
          WHERE id_theme = ? ";
             // -- préparation
                 $PDOStmt = $cnx->prepare($sql);
                 // -- Bind params
                 $PDOStmt->bindParam(1, $libelle, PDO::PARAM_STR);
                 $PDOStmt->bindParam(2, $id_theme, PDO::PARAM_INT);
         
             // -- EXECUTER
                 $PDOStmt->execute();
              
    }

    static function delete(PDO $cnx, int $idTheme):void{
    // requete sql
    // echo($idTheme);
    $sql = 
    "DELETE
    FROM themes
    WHERE id_theme = ? ";
        // -- préparation
            $PDOStmt = $cnx->prepare($sql);
            // -- Bind params
            $PDOStmt->bindParam(1, $idTheme, PDO::PARAM_INT);
    
        // -- EXECUTER
            $PDOStmt->execute();
    
    }
    static function findAllWithFilter(PDO $cnx , string $pattern): array{
        // requete SQL avec la string SQL 
        // injection sql tres grand morceau de sécurité !! on prépare les requête pour assurer une sécurité 
        $sql = 
                    "SELECT id_theme, libelle FROM themes WHERE libelle LIKE ? ORDER BY libelle";
        // toujours tester la requete sql

        // pousser une requette préparer
        //-- La méhode prepare() de l objet pdo retourne un objet pdoStatmenet
        // rapidité d écécution en cas de multiples demande et protege des injection sql 
        // pdo::prepare(string sql ) : pdostatement
        // a prendre TEL QUEL
        $PDOStmt = $cnx->prepare($sql);

        // Binding params si il y a des parametre si il y a filtre where libele qui commence par a on se débrouilleras pour que le filtre deviens dynamique ^^
        $stringPattern = "%" . $pattern . '%';
        $PDOStmt->bindParam(1, $stringPattern, PDO::PARAM_STR);
        // EXECUTION de la requète préparé !!! 
        $PDOStmt->execute();
        // ICI : un flot de données en provenance de mysql est dispo via les méthodes 
        // de fetching d'un objet de type PDOStatment
        // la methode doit retourner quelque chose !! un array !! 
        $liste = []; // liste retournée 
        // tant que y a un prochain resultat dans le jeu du resultat mysql tu le mets dans un truc qui s appel record 
        // try fetchAll
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
       
}

?>