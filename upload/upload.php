<?php 
// view liste themes 
// creation d'un tampon mémoire - output buffer - pour éviter que
// la porteuse http (robot http) n'ait envie de printer la réponse trop vite  
ob_start();
// le robot n affichera pas le h1 , ils seront enregistrer dans la mémoire vive 
?>
<h1>Futur formulaire d'upload</h1>


<?php
// on vide le tompon memoire qu on a créer   // le cadi d un supermarché  quand on va ouvrir plusieurs fichier le tampon va ouvrir tout les fichiers et apres on affiche tout d un coup 
$content = ob_get_clean();
include("template.php");
?>