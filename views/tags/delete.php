<?php 
// view liste themes 
// creation d'un tampon mémoire - output buffer - pour éviter que
// la porteuse http (robot http) n'ait envie de printer la réponse trop vite  
ob_start();
// le robot n affichera pas le h1 , ils seront enregistrer dans la mémoire vive 
?>
<h1>deleted</h1>
<h1>deleted</h1>
<form action ="index.php" method="POST">
<div>
<input type ="hidden" name="section" value="<?= $section ?>"/>
<input type ="hidden" name="action" value="<?= $action ?>"/>
<input type ="hidden" name="id_theme" value="<?= $theme->getIdTheme() ?>"/>
<p>Etes-vous sûr(e) de vouloir supprimer le théme <strong><?= $theme->getLibelle()?></strong></p>
 <p><input type="submit" value="Ok"/>
<!-- <a href="index.php?section= <?= $section ?> &action=0 ">Annuler</a></p>  -->
<input type="button" value="Annuler" onclick="window.history.back();"/>
</div>
</form>
<?php
// on vide le tompon qu on a créer 
$content = ob_get_clean();
include("template.php");
?>