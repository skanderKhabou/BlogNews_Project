<?php
// ACTUALITES - TAGS
// gestion_tags.php

ob_start();
?>

<form id="zeForm" action="index.php?section=0&action=6" method="POST">
    <input type="hidden" name="section" value="<?= $section ?>"/>
    <input type="hidden" name="action" value="<?= $action ?>"/>
    <input type="hidden" name="id_actualite" value="<?= $idActu ?>"/>


    <style>
        #container-listes-tags div{display:inline-block;width:40%;}
        select{width:30%;}
    </style>

    <div id="container-listes-tags">
        <p> Réservoir de TOUS les tags<br/>
            <select name="tags" id="tags" size="6" onchange="processTags()">
                <!-- lire l'array avec tous les tags -->
                <?php foreach($arrayTags as $tag) { ?>
                    
                    <option value="<?= $tag->getIdTag() ?>"><?= $tag->getLibelle() ?></option>
                    
                    <?php } ?>
                </select>
            </p>
                <select name="tags-for-news[]" multiple id="tags-for-news" size="6" onchange="processTags4News()">
                    <!-- lire l'array avec tous les tags -->
                <?php foreach($tagsForNews as $tag) { ?>

                    <option value="<?= $tag->getIdTag() ?>"><?= $tag->getLibelle() ?></option>

                <?php } ?>
            </select>
       
    </div>
    <div>
        <p>
            <input type="button" value="Envoyer" onclick="envoyer()"/>
        </p>
    </div>

</form>

<script src="views/actualites/gestion_tags.js"></script>

<?php
$content = ob_get_clean();
include("template.php");

?>