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
    <input id="search" type="text" name="libelle" value=""/>
    </p>
    <p id="err-libelle" style="color:red;" ></p>
</div>
<div>
<p>
<!-- type img et submit ! declenche une requette http !  -->
<input id="bt-check" type="submit" value="Envoyer"/>
</p>
</div>

</form>
  

</div>
<?php
// on vide le tompon qu on a créer 
$content = ob_get_clean();
include("template.php");
?>

<script>
let validation =true;
document.getElementById("bt-check").onclick = function() {
    if(document.getElementById("search").value.length == 0){
        document.getElementById("err-libelle").innerHTML = "You should put at least one Letter";
        document.getElementById("search").setAttribute("style" , "background-color:red;");
        validation = false
        event.preventDefault();
    }
    if(validation) document.getElementById("bt-check").submit();
}

document.getElementById("search").onclick = function(){
    document.getElementById("search").setAttribute("style", "background-color:white;");
    document.getElementById("err-libelle").innerHTML = "";

}
</script>