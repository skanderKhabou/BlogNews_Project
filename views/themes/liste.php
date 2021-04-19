<?php 
// view liste themes 
// creation d'un tampon mémoire - output buffer - pour éviter que
// la porteuse http (robot http) n'ait envie de printer la réponse trop vite 

// TOUT CE QUI EST ECHO PRINT ETC NE VA PAS ETRE AFFICHER GRACE A OB START mais seront 
// envoyer en memoire vive dans un tampon memoire le caddy du web ! en attendant de tout lacher avec le ob get clean methode 
ob_start();
// le robot n affichera pas le h1 , ils seront enregistrer dans la mémoire vive 
?>
<!-- on va afficher la liste de theme fetcher  -->
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

<table>
    <caption> <?= count($liste) ?> Liste des thèmes trouvé(s) </caption>
    <tr>
    <th>id</th>
    <th>libelle</th>
    <th>Modifier</th> 
    <th>Supprimer</th>
    </tr>
    <?php foreach ($liste as $theme) { ?>
<tr>
<td><?= $theme->getIdTheme(); ?></td>
<td><?= $theme->getLibelle(); ?></td>
<td><a href="index.php?section=1&action=2&id_theme=<?= $theme->getIdTheme(); ?>"><img width="15%" src="medias/ICO_MODIFY.png"/> </a></td>
<td><a href="index.php?section=1&action=3&id_theme=<?= $theme->getIdTheme(); ?>"><img width="15%" src="medias/ICO_DELETE.png"/></a></td>
</tr>
    <?php } ?>
</table>


<?php
// on vide le tompon qu on a créer 
$content = ob_get_clean();
include("template.php");
?>

<script>
let validation =true;
document.getElementById("bt-check").onclick = function() {
    if(document.getElementById("search").value.length == 0){
        document.getElementById("flagErr").innerHTML = "You should put at least one Letter";
        validation = false
        event.preventDefault(); // parce que on a type submit et pas button !! 
    }
    if(validation) document.getElementById("bt-check").submit();
}
</script>