<?php 
ob_start();
?>


<h1>deleted</h1>



<?php
// on vide le tompon qu on a créer 
$content = ob_get_clean();
include("template.php");
?>