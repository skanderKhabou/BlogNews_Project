<?php
include("../tools/MaConnexion.php");
include("../models/Theme.php");
//cnx
$cnx = MaConnexion::connect();
var_dump($cnx);
// use lib-theme
// insertion new theme req SQL
// req sql => liste Themes
// print string json 
if (isset($_GET['lib-theme'])){
    $objetTheme = new Theme();
    $objetTheme->setLibelle($_GET['lib-theme']);
    ManagerTheme::create($cnx, $objTheme);

    $listeTheme = ManagerTheme::findAll($cnx);
    
    // echo json_encode($listeTheme)
}