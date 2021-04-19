<?php 
// view liste themes 
// creation d'un tampon mémoire - output buffer - pour éviter que
// la porteuse http (robot http) n'ait envie de printer la réponse trop vite  
ob_start();
// le robot n affichera pas le h1 , ils seront enregistrer dans la mémoire vive 
?>
<div id="new_x_search">
    <p> 
    <form action ="index.php" method="POST">

        <input type="hidden" name="section" value="<?= $section ?>"/>
        <input type ="hidden" name="action" value="4"/>
        <input id="search" type="text" name="pattern" value="" placeholder="search ..."/>
        <input id="bt-check" type="submit" value="search"/>

    </form>  
    <p id="flagErr" style="color:red;"></p>    
    </p><p>
        <a href="index.php?section=1&action=1"><img width="150" src="medias/ICO_NEW.png" alt="new" /></a>
    </p>
</div>

<?php
// on vide le tompon qu on a créer 
$content = ob_get_clean();
include("template.php");
?>

