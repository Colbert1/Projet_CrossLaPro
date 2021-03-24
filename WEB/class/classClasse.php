<?php
class Classe
{
    private $_idclasse;
    private $_nom;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }

    public function setIdClasse($newId)
    {
        $this->_idclasse = $newId;
    }
    public function setNom($newNom)
    {
        $this->_nom = $newNom;
    }
    public function getIdClasse()
    {
        return $this->_idclasse;
    }
    public function getNom()
    {
        return $this->_nom;
    }
    public function init()
    {
    }
}
