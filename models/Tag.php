<?php
class Tag{
    private $idTag;
    private $libelle;

    function __construct(){

    }

    function getIdTag(){
        return $this -> idTag;
    }

    function setIdTag(int $idTag): void{
        $this -> idTag = $idTag;
    }

    function getLibelle() {
        return $this->libelle;
    }


    function setLibelle(string $libelle): void{
        $this->libelle =$libelle;
    }
}

?>