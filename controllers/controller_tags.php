<?php


include("Models/ManagerTags.php");
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
        // détail du theme
         include_once("views/tags/update.php");
         break;


         case '3':
            // suppression ici on passera par confirmation avant de finir l action delete
             include_once("views/tags/delete.php");
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