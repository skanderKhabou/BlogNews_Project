<?php
// index.php //Controleur principal
//gestion de la session - right to be here ? - Contrôle d identification
// obtention d'une connexion - mysql -
include("tools/MaConnexion.php"); 
$cnx = MaConnexion::connect();
var_dump($cnx);
// main controller ! on aura la sessions à gerer 
// les droits --> authentification 
// on aura une demande de connexion et puis on passera les arguments PDO
// instance de PDO php data Object

// par défaut on demare par section ==> actualités ! 
// include("template.php");
$section = "0"; // variable dans le php variable globale 
if(isset($_GET["section"])) {
    $section = $_GET["section"];
}
 //variable dans le http !!! regarder template

 // on va demandé quelle action demandé 
 $action = "0"; 
if(isset($_GET["action"])) {
    $action = $_GET["action"];
}
// un id .. global pour l element concerné ??
// $id = null;
// if(isset($_GET["id"])){
//     $id = $_GET["id"];
// }
// if(isset($_GET["id"])){
//     $id = $_GET["id"];
// }

// echo "SECTION ==> " . $section . "br/>";
// echo "ACTION ==> " . $action . "br/>";

// CONTROLLER PRINCIPAL
switch($section) {
    case "1":
        include_once("controllers/controller_themes.php");
        break;
    case "2":
            include_once("controllers/controller_tags.php");
            break;
    case "3":
            include_once("upload/upload.php");                break;            
            break;
    case "0" : default:
        include_once("controllers/controller_actualites.php");
        break;
}




// which sections ? 
// actualité 0 
//  themes 1  
//   motdepasse 2 
//    upload 3


// actions
// 0==> TIDY_TAG_LISTING
// 1 ==> création
// 2 ==> modif
// 3 ==> suppression
?>