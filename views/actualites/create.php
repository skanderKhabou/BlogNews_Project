<?php 

ob_start();
?>
<h1>created</h1>
<div>
    <form action="index.php" method="POST">
    <div>
    <p> Create a new Themes</p>
    <p>
    <input id="libelle_T" type="text" name="libelle_T" value=""/>
    </p>
    <p id="err-libelle" style="color:red;" ></p>
    <input id="ajaxButt" type="button" value="Create"/>
</div>
</form>



<form action="index.php" method="POST">
<!-- on memorise la valeure de la section actuelle et de l action  -->
    <input type="hidden" name ="section" value="<?= $section ; ?>"/>
    <input type="hidden" name ="action" value="<?= $action ; ?>"/>

<div>
    <p>Titre</p>
    <p>
    <input id="titre" type="text" name="titre" value=""/>
    </p>
    <p id="err-titre" style="color:red;" ></p>
</div>
<div>
    <p>Theme</p>
    <p>
    <select  id ="theme" name="theme">
    <?php foreach ($listeTheme as $theme) { ?>
        <option value= "<?= $theme->getIdTheme()?>" > <?= $theme->getLibelle()?> </option>
         <?php } ?>
    </select>
    </p>
</div>
<div>
    <p>Contenu</p>
    <p>
    <textarea id="content" name="contenu" cols="50" rows="10">
    </textarea>
    </p>
    <p id="err-content" style="color:red;" ></p>
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

<script src="views/actualites/ajax.js"></script>
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