<?php 
ob_start();
?>


<h1>deleted</h1>
<form action ="index.php" method="POST">
<div>
<input type ="hidden" name="section" value="<?= $section ?>"/>
<input type ="hidden" name="action" value="<?= $action ?>"/>
<input type ="hidden" name="id_actualite" value="<?= $actu->getIdActu() ?>"/>
<p>Etes-vous sûr(e) de vouloir supprimer l'actualité <strong><?= $actu->getIdActu()?></strong></p>
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