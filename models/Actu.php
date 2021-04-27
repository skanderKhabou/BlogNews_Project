<?php
// include ('models/Theme.php');
class Actu{
    private $idActu;
    private $titre;
    private $contenu;
    private $dateCrea;
    private $dateModif;
    private $publish;
    // composition
    private  $theme;

    function __construct(){
            $this -> theme = new Theme();
    }

    // ------------------------------------------------------
// ________________________________________________ GETTERS SETTERS
// ----------------------------------------------------------

    function getIdActu(){
        return $this -> idActu;
    }

    function setIdActu(int $idActu): void{
        $this -> idActu = $idActu;
    }
// ------------------------------------------------------
// ________________________________________________
// ----------------------------------------------------------

    function getTitre() {
        return $this->titre;
    }

    function setTitre(string $titre): void{
        $this->titre =$titre;
    }
// ------------------------------------------------------
// ________________________________________________
// ----------------------------------------------------------

    function getContenu() {
        return $this->contenu;
    }

    function setContenu(string $contenu): void{
        $this->contenu =$contenu;
    }

    // ------------------------------------------------------
// ________________________________________________
// ----------------------------------------------------------
    
    function getDateCrea() {
        return $this->dateCrea;
    }
    
    function setDateCrea($dateCrea): void{
        $this->dateCrea =$dateCrea;
    }
 
    // ------------------------------------------------------
// ________________________________________________
// ----------------------------------------------------------

    function getDateModif() {
        return $this->dateModif;
    }
    
    function setDateModif($dateModif): void {
        $this->dateModif = $dateModif;
    }

// ------------------------------------------------------
// ________________________________________________
// ----------------------------------------------------------

    function getTheme():Theme {
        return $this->theme;
    }

    function setTheme($theme): void{
        $this->theme =$theme;
    }
    
    // ------------------------------------------------------
// ________________________________________________
// ----------------------------------------------------------

    function getPublish() {
        return $this->publish;
    }
    
    function setPublish(int $publish): void{
        $this->publish =$publish;
    }











}

?>