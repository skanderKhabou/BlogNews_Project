<?php 

ob_start();
?>
<h1>created</h1>
<div>
<form action="index.php" method="POST">
<!-- on memorise la valeure de la section actuelle et de l action  -->
    <input type="hidden" name ="section" value="<?= $section ; ?>"/>
    <input type="hidden" name ="action" value="<?= $action ; ?>"/>

<div>
    <p>Libellé</p>
    <p>
    <input type="text" name="libelle" value=""/>
    </p>
    <p id="err-libelle"></p>
</div>
<div>
<p>
<!-- type img et submit ! declenche une requette http !  -->
<input type="submit" value="Envoyer"/>
</p>
</div>

</form>
</div>
<?php
// on vide le tompon qu on a créer 
$content = ob_get_clean();
include("template.php");
?>