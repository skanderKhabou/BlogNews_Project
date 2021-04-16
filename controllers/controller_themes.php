<?php
include "models/ManagerTheme.php";
//controller specifique

// Objet 'metier' pratique pour stocker les données en retour du form
$theme = new Theme();
switch ($action) {
   // create
    case '1':
      //distinction methode http ? 
      // get ?
      // superglobal $_post vide ? alors on est en get 
      if(empty($_POST)) {
         include_once("views/themes/create.php");
      }
      else {
         if(isset($_POST['libelle'])){
            $theme->setLibelle($_POST['libelle']);
         }
         // manager theme 
         ManagerTheme::create($cnx,$theme);
         // REFRESH LISTE RETOUR
         $liste = ManagerTheme::findAll($cnx);
         include_once("views/themes/liste.php");
      header('Location: index.php?redirection');
         exit;
      }
        break;

        // post ??
        //recuperer donnée  form
        //fabriquer un objet
        // inserer en bd 
     case '2':
        // détail du theme
         include_once("views/themes/update.php");
         break;
         case '2':
            // suppression ici on passera par confirmation avant de finir l action delete
             include_once("views/themes/delete.php");
             break;
        case '0':  default:
        // liste des thèmes
        $liste = ManagerTheme::findAll($cnx); 
      //   var_dump($liste);
        include_once("views/themes/liste.php");
        break;
}
?>