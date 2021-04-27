<?php
include("ManagerTheme.php");
include("Actu.php");

class ManagerActu{


    static function findAll(PDO $cnx): array{
        // requete SQL avec la string SQL 
        // injection sql tres grand morceau de sécurité !! on prépare les requête pour assurer une sécurité 
        $sql = 
                "SELECT actualites.id_actualite,actualites.titre,actualites.publish,actualites.contenu,actualites.date_creation,actualites.date_modif,themes.libelle,themes.id_theme
                FROM actualites
                INNER JOIN themes 
                ON actualites.theme = themes.id_theme
                ORDER BY themes.libelle, actualites.titre";
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
            
            $obj = new Actu();
            $obj->setIdActu($record->id_actualite); // nom de la colonne tel quel 
            $obj->setTitre($record->titre);
            $obj->setContenu($record->contenu);
            $obj->setDateCrea($record->date_creation);
            $obj->setDateModif($record->date_modif);
            $obj->setPublish($record->publish);

            // on ne set pas le theme mais le libelle 
            $obj->getTheme()->setIdTheme($record-> id_theme);
            $obj->getTheme()->setLibelle($record-> libelle);
   

            array_push($liste, $obj);
        }
        return $liste;
    }
     
    /////////------------------------------------------------------------/////////////
    static function create(PDO $cnx, Actu $actu):void{
        // on parse l'objet car php n est pas fonctionnel il faut mettre la fonction dans une variable
        $titre = $actu->getTitre();
        $contenu = $actu->getContenu();
        $theme = (int) $actu->getTheme()->getIdTheme();
// requete sql
        $sql = 
        "INSERT INTO actualites(titre,contenu,theme) VALUES(?,?,?)";
    // -- préparation
        $PDOStmt = $cnx->prepare($sql);
        // -- Bind params
        $PDOStmt->bindParam(1, $titre, PDO::PARAM_STR);
        $PDOStmt->bindParam(2, $contenu, PDO::PARAM_STR);
        $PDOStmt->bindParam(3, $theme, PDO::PARAM_INT);

    // -- EXECUTER
        $PDOStmt->execute();
        // -- $res = $PDOStmt->execute();
    }

    ////////////////-----------------------------------/////////////////////////
    static function findById(PDO $cnx, int $id) : Actu{
        // requete sql
        $sql = 
        "SELECT actualites.id_actualite,actualites.titre,actualites.contenu,actualites.date_creation,actualites.date_modif,themes.libelle,themes.id_theme,actualites.publish
        FROM actualites
        INNER JOIN themes 
        ON actualites.theme = themes.id_theme
        WHERE id_actualite = ?";
    // -- préparation
        $PDOStmt = $cnx->prepare($sql);
        // -- Bind params
        $PDOStmt->bindParam(1, $id, PDO::PARAM_INT);;
    // -- EXECUTER
        $PDOStmt->execute();
  
        // -- $res = $PDOStmt->execute();
        $obj = new Actu();
       while($record = $PDOStmt->fetch(PDO::FETCH_OBJ) ){

        $obj = new Actu();
            $obj->setIdActu($record->id_actualite); // nom de la colonne tel quel 
            $obj->setTitre($record->titre);
            $obj->setContenu($record->contenu);
       

            // on ne set pas le theme mais le libelle 
            $obj->getTheme()->setIdTheme($record-> id_theme);
            $obj->getTheme()->setLibelle($record-> libelle);
       }
        return $obj; 
    }
  
    //////---------------------------------------------------////////////////
    static function modify(PDO $cnx, Actu $actu):void{

            // ON PARSE L OBJET MALHEUREUSEMENT 
        $id_actualite = $actu->getIdActu();
        $titre = $actu->getTitre();
        $contenu = $actu->getContenu();
        $theme = $actu->getTheme()->getIdTheme();
         // requete sql
         $sql = 
         "UPDATE actualites 
         SET titre = ?, contenu = ?, theme = ?
          WHERE id_actualite = ? ";
             // -- préparation
                 $PDOStmt = $cnx->prepare($sql);
                 // -- Bind params
                 $PDOStmt->bindParam(1, $titre, PDO::PARAM_STR);
                 $PDOStmt->bindParam(2, $contenu, PDO::PARAM_STR);
                 $PDOStmt->bindParam(3, $theme, PDO::PARAM_INT);
                 $PDOStmt->bindParam(4, $id_actualite, PDO::PARAM_INT);
         
             // -- EXECUTER
                 $PDOStmt->execute();
              
    }

    static function delete(PDO $cnx, int $id):void{
    // requete sql
    // echo($idTheme);
    $sql = 
    "DELETE
    FROM actualites
    WHERE id_actualite = ? ";
        // -- préparation
            $PDOStmt = $cnx->prepare($sql);
            // -- Bind params
            $PDOStmt->bindParam(1, $id, PDO::PARAM_INT);
    
        // -- EXECUTER
            $PDOStmt->execute();
    
    }
    static function findAllWithFilter(PDO $cnx , string $pattern): array{
        // requete SQL avec la string SQL 
        // injection sql tres grand morceau de sécurité !! on prépare les requête pour assurer une sécurité 
        $sql = 
        "SELECT actualites.id_actualite,actualites.titre,actualites.contenu,actualites.date_creation,actualites.date_modif,themes.libelle,themes.id_theme,actualites.publish
        FROM actualites
        INNER JOIN themes 
        ON actualites.theme = themes.id_theme
        WHERE actualites.titre 
        LIKE ?
        ORDER BY themes.libelle,actualites.titre
        ";        // toujours tester la requete sql

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
         
            // -- $res = $PDOStmt->execute();
            $obj = new Actu();
            $obj->setIdActu($record->id_actualite); // nom de la colonne tel quel 
            $obj->setTitre($record->titre);
            $obj->setContenu($record->contenu);

            // on ne set pas le theme mais le libelle 
            $obj->getTheme()->setIdTheme($record-> id_theme);
            $obj->getTheme()->setLibelle($record-> libelle);
   

            array_push($liste, $obj);
        }
        return $liste;
    }

    static function online(PDO $cnx, int $idActu, int $publish): void {

        $sql = 
        "UPDATE actualites
        SET publish = ?
        WHERE id_actualite = ?
        ";

         $PDOStmt = $cnx->prepare($sql);
         $PDOStmt->bindParam(1, $publish, PDO::PARAM_INT);
         $PDOStmt->bindParam(2, $idActu, PDO::PARAM_INT);

         $PDOStmt->execute();

    }

    static function getTagForNews(PDO $cnx, int $idActu): array {
        $sql = 
        "SELECT ak.keyword, k.libelle
        FROM actualites_keywords AS ak
        INNER JOIN keywords AS k
        ON ak.keyword = k.id_keyword
        WHERE ak.actualite = ?
        ";

             // -- préparation
             $PDOStmt = $cnx->prepare($sql);
             // -- Bind params
             $PDOStmt->bindParam(1, $idActu, PDO::PARAM_STR);

             $PDOStmt->execute();
        $liste = []; // liste retournée
        while( $record = $PDOStmt->fetch(PDO::FETCH_OBJ)){

            // un objet pour chaque enregistrement
            $obj = new Tag();
            $obj->setIdTag($record->keyword); // nom de la colonne ne base
            $obj->setLibelle($record->libelle);

            array_push($liste, $obj);
        }
            return $liste;
    }

    static function setTagForNews($cnx , $idActu, $tagsForNews) {
        // On efface tous les tags
        $sql = "DELETE FROM actualites_keywords WHERE actualite = ?";
        // on utilise la methode prepare de l objet pdo qui retourne un objet pdostatement
        $jeudeResultats = $cnx->prepare($sql);
        // valorisation du param 
        $jeudeResultats->bindParam(1,$idActu,PDO::PARAM_INT);
        // execution
        $jeudeResultats->execute();

        // on insere les nouveaux tags theme
if(!empty($tagsForNews)){
 // requete
 $sql="INSERT INTO actualites_keywords (actualite,keyword) VALUES(?,?)";

 // on utilise la methdoede prepare de l objet pdo qui retourne un objetPDOStatement
 $jeudeResultats = $cnx->prepare($sql);

 foreach($tagsForNews as $tag){
$jeudeResultats->bindParam(1,$idActu,PDO::PARAM_INT);
$jeudeResultats->bindParam(2,$tag,PDO::PARAM_INT);

// on exécute
$jeudeResultats->execute();
 }

}

}
       
       
}