<?php

//controller specifique

switch ($action) {
    case '1':
        include_once("views/tags/create.php");
        break;
     case '2':
        // détail du theme
         include_once("views/tags/update.php");
         break;
         case '2':
            // suppression ici on passera par confirmation avant de finir l action delete
             include_once("views/tags/delete.php");
             break;
        case '0':  default:
        // liste des thèmes 
        include_once("views/tags/liste.php");
        break;
}
?>
<h1> hello from tags</h1>