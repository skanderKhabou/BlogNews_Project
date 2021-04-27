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
        <a href="index.php?section=0&action=1"><img width="150" src="medias/ICO_NEW.png" alt="new" /></a>
    </p>
</div>

<table>
    <caption> <?= count($liste) ?> Actualité(s) trouvé(s) </caption>
    <tr>
    <th>statut</th>
    <th>id_actualite</th>
    <th>titre</th>
    <th>contenu</th>
    <th>date Crea</th>
    <th>date modif</th>
    <th>theme</th>
    <th>modifTag</th>
    <th>Modifier</th> 
    <th>Supprimer</th>
    </tr>
    <?php foreach ($liste as $actu) { ?>
<tr>
<td><a href="index.php?section=0&action=5&id_actualite=<?= $actu->getIdActu(); ?>&publish=<?= $actu->getPublish();?>">
<img width="100%" src= "<?= ($actu->getPublish()==0)?'medias/OFF.png':'medias/ON.png'?>"/> </a></td>


<td><?= $actu->getIdActu(); ?></td>
<td><?= $actu->getTitre(); ?></td>
<td><?= $actu->getContenu(); ?></td>
<td><em style="font-size:0.9em;"><?= $actu->getDateCrea(); ?></em></td>
<td><em style="font-size:0.9em;"><?= $actu->getDateModif(); ?></em></td>
<td><?= $actu->getTheme()->getLibelle() ?></td>
<td><a href="index.php?section=0&action=6&id_actualite=<?= $actu->getIdActu(); ?>">Gestions des Mots Clés </a></td>
<td><a href="index.php?section=0&action=2&id_actualite=<?= $actu->getIdActu(); ?>"><img width="15%" src="medias/ICO_MODIFY.png"/> </a></td>
<td><a href="index.php?section=0&action=3&id_actualite=<?= $actu->getIdActu(); ?>"><img width="15%" src="medias/ICO_DELETE.png"/></a></td>
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

let publish = false;

// document.getElementById("status").onclick = function() {
// if(publish == false){
//     publish = true;
//     document.getElementById("status").setAttribute("style" , "background-color:green;")
// }
// else {
//     document.getElementById("status").setAttribute("style" , "background-color:red;")
//     publish = false;
// }
// }
</script>