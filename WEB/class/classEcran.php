<?php
class Ecran 
{
    private $_ec_id;
    private $_ec_nom;
    private $_crs_id;
    private $_bdd;
    
    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }

    public function setId($id)
    {
        $this->_ec_id = $id;
    }

    public function setNom($nom)
    {
        $this->_ec_nom = $nom;
    }

    public function setCrsId($newCourse)
    {
        $this->_crs_id = $newCourse;
    }

}