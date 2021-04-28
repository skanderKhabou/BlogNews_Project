<?php
include("../tools/MaConnexion.php");
// include("../models/Theme.php");
include("../models/ManagerTheme.php");
//cnx
$cnx = MaConnexion::connect();
// var_dump($cnx);
// use lib-theme
// insertion new theme req SQL
// req sql => liste Themes
// print string json 
if (isset($_GET['lib-theme'])){
    $objTheme = new Theme();
    $objTheme->setLibelle($_GET['lib-theme']);
    ManagerTheme::create($cnx, $objTheme);

    $listeTheme = ManagerTheme::findAll2($cnx);
    
    echo json_encode($listeTheme);
}