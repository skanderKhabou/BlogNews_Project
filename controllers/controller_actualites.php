<?php

//controller specifique
include "Models/ManagerActu.php";
include "Models/ManagerTags.php";
$actu = new Actu();
switch ($action) {
  // create
  case '1':
    //distinction methode http ? 
    // get ?
    // superglobal $_post vide ? alors on est en get 
       if(empty($_POST)) {
        $listeTheme =  ManagerTheme::findAll($cnx);
       include_once("views/actualites/create.php");
          }
       else {
       if(isset($_POST['titre'])){
          $actu->setTitre($_POST['titre']);
       }
       if(isset($_POST['contenu'])){
          $actu->setContenu($_POST['contenu']);
       }
       if(isset($_POST['theme'])){
          $actu->getTheme()->setIdTheme( (int) $_POST['theme']);
          // $actu->getTheme()->setLibelle( (String) $_POST['theme']);
       }
       // manager theme 
      //  var_dump($actu);
       ManagerActu::create($cnx,$actu);
       // REFRESH LISTE RETOUR
       $liste = ManagerActu::findAll($cnx);
       include_once("views/actualites/liste.php");
      //  header('Location: index.php?redirection');
      //  exit;
    }
    break;
    case '2':
      // détail du tag
      if(empty($_POST)){
         $listeTheme =  ManagerTheme::findAll($cnx);
          if(isset($_GET['id_actualite'])){
             $actu = ManagerActu::findById($cnx,  (int)$_GET['id_actualite']);
             // (int)
             // var_dump($tag);
             include_once("views/actualites/update.php");
          }
      
       }
       else{
          if(isset($_POST['id_actualite'])){
             $actu->setIdActu($_POST['id_actualite']);
          }
          if(isset($_POST['titre'])){
            $actu->setTitre($_POST['titre']);
         }
          if(isset($_POST['contenu'])){
             $actu->setContenu($_POST['contenu']);
          }
          if(isset($_POST['theme'])){
            $actu->getTheme()->setIdTheme((int)($_POST['theme']));
         }

         // manager tag 
         ManagerActu::modify($cnx,$actu);
         var_dump($actu);
          // REFRESH LISTE RETOUR
          $liste = ManagerActu::findAll($cnx);
          include_once("views/actualites/liste.php");
       // header('Location: index.php?redirection');
       //    exit;
       }
       break;

         case '3':
          // suppression ici on passera par confirmation avant de finir l action delete
          if(empty($_POST)) {
       $actu = ManagerActu::findById($cnx,(int)$_GET['id_actualite']);
       include_once("views/actualites/delete.php");
          }
          else{
             // on récupere l id de theme qui arrive en post 
          if(isset($_POST['id_actualite'])){
             ManagerActu::delete($cnx,(int)$_POST['id_actualite']);
          }
          $liste = ManagerActu::findAll($cnx);
          include_once("views/actualites/liste.php");
          }
           break;
       case '4':
            $pattern; 
            if(isset($_POST['pattern']) ) {
               if(!empty($_POST['pattern'])) {
                  $pattern = $_POST['pattern'];
                  $liste = ManagerActu::findAllWithFilter($cnx,$pattern);

               }
            }  
            // Méthode pour retourner une liste de thème avec un filtre 
            // refresh liste -retour - 
            include_once("views/actualites/liste.php");
            break;
            //online offline
            case '5':
               // echo "yo";
               $publish;
               if(isset($_GET['id_actualite']) && isset($_GET['publish'])){
            //   echo "yo";
             $publish = ((int) $_GET['publish'] == 0)?1:0;
             ManagerActu::online($cnx, (int) $_GET['id_actualite'], (int) $publish);
            //  var_dump($publish);
            //  var_dump($_GET['id_actualite']);
           }
           $liste = ManagerActu::findAll($cnx);
           include_once("views/actualites/liste.php");
              break;
// gestion des mots clés tags 
              case '6':
                // if_GET
                $arrayTags=[];
               //  $arrayTagsTmp = [];
               //  $arrayTagsForNews=[];
                if(empty($_POST)) {
                   // récuperer param http id_actualite
                  if(isset($_GET['id_actualite'])) $idActu = $_GET['id_actualite'];
                  // array avec tous les tags sauf ceux de la news concerné
                  $arrayTagsTmp = ManagerTags::findAll($cnx);
                  // array avec les tags de la news concerné
                  $tagsForNews = ManagerActu::getTagForNews($cnx, $idActu);
                  //include form  difference entre contenair et contaier nes
                  $arrayTags= array_udiff($arrayTagsTmp,$tagsForNews,'compareTags');
                  // var_dump($arrayTags);
                  // var_dump($arrayTagsTmp);
                  // var_dump($tagsForNews);
                  include("views/actualites/gestion_tag.php");

               }
               else{
                  if(isset($_POST['id_actualite'])) $idactualite = $_POST['id_actualite'];
                  $tagsForNews = [];
                  if(isset($_POST['tags-for-news'])){ $tagsForNews = $_POST['tags-for-news'];}
                  ManagerActu::setTagForNews($cnx,$idactualite,$tagsForNews);
                  
                  $liste = ManagerActu::findAll($cnx);
                  include_once("views/actualites/liste.php");
               }
                //else POST 
                // décortiquer (LOOP) sur tags->actu
                //methode metier dans le manager d actu
                break;

             case '0':  default:
               // liste des thèmes
               $liste = ManagerActu::findAll($cnx); 
               // var_dump($liste);
               include_once("views/actualites/liste.php");
               break;
}

function compareTags($a, $b){
   if($a->getLibelle() == $b->getLibelle()){
      return 0;
   } else {
      return -1;
   }
}
?>
<h1> Hello from actualite</h1>