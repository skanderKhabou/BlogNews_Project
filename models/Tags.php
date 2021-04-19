<?php
class Theme{
    private $idTag;
    private $libelle;

    function __construct(){

    }

    function getidTag(){
        return $this -> idTag;
    }

    function setidTag(int $idTag): void{
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