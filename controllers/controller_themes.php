<?php
include "models/ManagerTheme.php";
//controller specifique

// Objet 'metier' pratique pour stocker les données en retour du form
$theme = new Theme();
// $idTheme = (isset($_GET['id_theme']))?$_GET['id_theme'] :(isset())
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
        // on récupere id_theme
        if(empty($_POST)){
            if(isset($_GET['id_theme'])){
               $theme = ManagerTheme::findById($cnx,  $_GET['id_theme']);
               // (int)
               // var_dump($theme);
               include_once("views/themes/update.php");
            }
        
         }
         else{
            if(isset($_POST['id_theme'])){
               $theme->setIdTheme($_POST['id_theme']);
            }
            if(isset($_POST['libelle'])){
               $theme->setLibelle($_POST['libelle']);
            }
            // manager theme 
            ManagerTheme::modify($cnx,$theme);
            // REFRESH LISTE RETOUR
            $liste = ManagerTheme::findAll($cnx);
            include_once("views/themes/liste.php");
         // header('Location: index.php?redirection');
         //    exit;
         }
         break;
      

         case '3':
            // suppression ici on passera par confirmation avant de finir l action delete
            if(empty($_POST)) {
         $theme = ManagerTheme::findById($cnx,(int)$_GET['id_theme']);
         include_once("views/themes/delete.php");
            }
            else{
               // on récupere l id de theme qui arrive en post 
            if(isset($_POST['id_theme'])){
               ManagerTheme::delete($cnx,(int)$_POST['id_theme']);
            }
            $liste = ManagerTheme::findAll($cnx);
            include_once("views/themes/liste.php");
            }
             break;
         
             case '4':
               $pattern; 
               if(isset($_POST['pattern']) ) {
                  if(!empty($_POST['pattern'])) {
                     $pattern = $_POST['pattern'];
                     $liste = ManagerTheme::findAllWithFilter($cnx,$pattern);

                  }
               }  
               // Méthode pour retourner une liste de thème avec un filtre 
               // refresh liste -retour - 
               include_once("views/themes/liste.php");
               break;



        case '0':  default:
        // liste des thèmes
        $liste = ManagerTheme::findAll($cnx); 
      //   var_dump($liste);
        include_once("views/themes/liste.php");
        break;
}
?>