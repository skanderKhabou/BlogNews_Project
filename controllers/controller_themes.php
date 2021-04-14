<?php

//controller specifique

switch ($action) {
    case '1':
        include_once("views/themes/create.php");
        break;
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
        include_once("views/themes/liste.php");
        break;
}
?>
<h1>Hello from themes</h1>