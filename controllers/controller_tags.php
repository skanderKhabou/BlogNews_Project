<?php


include "Models/ManagerTags.php";
$tag = new Tag();
//controller specifique
switch ($action) {
  // create
  case '1':
   //distinction methode http ? 
   // get ?
   // superglobal $_post vide ? alors on est en get 
      if(empty($_POST)) {
      include_once("views/tags/create.php");
         }
      else {
      if(isset($_POST['libelle'])){
         $tag->setLibelle($_POST['libelle']);
      }
      // manager tag 
      ManagerTags::create($cnx,$tag);
      // REFRESH LISTE RETOUR
      $liste = ManagerTags::findAll($cnx);
      include_once("views/tags/liste.php");
      header('Location: index.php?redirection');
      exit;
   }
   break;

     case '2':
        // détail du tag
         if(empty($_POST)){
            if(isset($_GET['id_keyword'])){
               $tag = ManagerTags::findById($cnx,  $_GET['id_keyword']);
               // (int)
               // var_dump($tag);
               include_once("views/tags/update.php");
            }
        
         }
         else{
            if(isset($_POST['id_keyword'])){
               $tag->setIdTag($_POST['id_keyword']);
            }
            if(isset($_POST['libelle'])){
               $tag->setLibelle($_POST['libelle']);
            }
            // manager tag 
            ManagerTags::modify($cnx,$tag);
            // REFRESH LISTE RETOUR
            $liste = ManagerTags::findAll($cnx);
            include_once("views/tags/liste.php");
         // header('Location: index.php?redirection');
         //    exit;
         }
         break;
      


         case '3':
            // suppression ici on passera par confirmation avant de finir l action delete
            if(empty($_POST)) {
         $tag = ManagerTags::findById($cnx,(int)$_GET['id_keyword']);
         include_once("views/tags/delete.php");
            }
            else{
               // on récupere l id de tag qui arrive en post 
            if(isset($_POST['id_keyword'])){
               ManagerTags::delete($cnx,(int)$_POST['id_keyword']);
            }
            $liste = ManagerTags::findAll($cnx);
            include_once("views/tags/liste.php");
            }
             break;
         
             case '4':
               $pattern; 
               if(isset($_POST['pattern']) ) {
                  if(!empty($_POST['pattern'])) {
                     $pattern = $_POST['pattern'];
                     $liste = ManagerTags::findAllWithFilter($cnx,$pattern);

                  }
               }  
               // Méthode pour retourner une liste de thème avec un filtre 
               // refresh liste -retour - 
               include_once("views/tags/liste.php");
               break;



        case '0':  default:
         // liste des thèmes
         $liste = ManagerTags::findAll($cnx); 
       //   var_dump($liste);
         include_once("views/tags/liste.php");
         break;
}
?>
<h1> hello from tags</h1>