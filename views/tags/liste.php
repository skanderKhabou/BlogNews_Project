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
        <a href="index.php?section=2&action=1"><img width="150" src="medias/ICO_NEW.png" alt="new" /></a>
    </p>
</div>

<table>
    <caption> <?= count($liste) ?> tag(s) trouvé(s) </caption>
    <tr>
    <th>id_keyword</th>
    <th>libelle</th>
    <th>Modifier</th> 
    <th>Supprimer</th>
    </tr>
    <?php foreach ($liste as $tag) { ?>
<tr>
<td><?= $tag->getIdTag(); ?></td>
<td><?= $tag->getLibelle(); ?></td>
<td><a href="index.php?section=2&action=2&id_keyword=<?= $tag->getIdTag(); ?>"><img width="15%" src="medias/ICO_MODIFY.png"/> </a></td>
<td><a href="index.php?section=2&action=3&id_keyword=<?= $tag->getIdTag(); ?>"><img width="15%" src="medias/ICO_DELETE.png"/></a></td>
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

