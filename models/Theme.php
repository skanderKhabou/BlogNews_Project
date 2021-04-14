<?php
class Theme{
    private $idTheme;
    private $libelle;

    function __construct(){

    }

    function getIdTheme(){
        return $this -> idTheme;
    }

    function setIdTheme(int $idTheme): void{
        $this -> idTheme = $idTheme;
    }

    function getLibelle() {
        return $this->libelle;
    }


    function setLibelle(string $libelle): void{
        $this->libelle =$libelle;
    }
}

?>