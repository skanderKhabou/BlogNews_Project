<?php 

ob_start();
?>
<h1>created</h1>
<div>
<form action="index.php" method="POST">
<!-- on memorise la valeure de la section actuelle et de l action  -->
    <input type="hidden" name ="section" value="<?= $section ; ?>"/>
    <input type="hidden" name ="action" value="<?= $action ; ?>"/>
    <input type="hidden" name="id_actualite" value="<?= (int) $actu->getIdActu()?>"/>

<div>
    <p>Titre</p>
    <p>
    <input id="titre" type="text" name="titre" value="<?= $actu->getTitre(); ?>"/>
    </p>
    <p id="err-titre" style="color:red;" ></p>
</div>
<div>
    <p>Theme</p>
    <p>
    <select  id ="theme" name="theme">
    <?php foreach ($listeTheme as $theme) { ?>
        <option value= "<?= $theme->getIdTheme()?>" <?= ($actu->getTheme()->getIdTheme() === $theme->getIdTheme() )?'selected':'' ?> > <?= $theme->getLibelle()?> </option>
         <?php } ?>
    </select>
    </p>
</div>
<div>
    <p>Contenu</p>
    <p>
    <textarea id="content" name="contenu" cols="50" rows="10" >
    <?= $actu->getContenu();?>
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
