<?php 
// view liste themes 
// creation d'un tampon mémoire - output buffer - pour éviter que
// la porteuse http (robot http) n'ait envie de printer la réponse trop vite  
ob_start();
// le robot n affichera pas le h1 , ils seront enregistrer dans la mémoire vive 
?>
<h1>Futur listing de themes</h1>


<?php
// on vide le tompon qu on a créer 
$content = ob_get_clean();
include("template.php");
?>