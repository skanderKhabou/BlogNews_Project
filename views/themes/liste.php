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
<table>
    <caption>Liste des thèmes</caption>
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
<td><a href="index.php?section=1&action=2&id=<?= $theme->getIdTheme(); ?>">modifier </a><?= $theme->getLibelle(); ?></td>
<td><a href="index.php?section=1&action=3&id=<?= $theme->getIdTheme(); ?>">supprimer </a><?= $theme->getLibelle(); ?></td>
</tr>
    <?php } ?>
</table>


<?php
// on vide le tompon qu on a créer 
$content = ob_get_clean();
include("template.php");
?>