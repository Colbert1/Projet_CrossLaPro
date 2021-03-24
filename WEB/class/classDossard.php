<?php
class Dossard
{
    private $_iddossard;
    private $_numdossard;
    private $_bdd;
    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }

    public function setIdDossard($newIdDossard)
    {
    }

    public function setNumDossard($newNumDossard)
    {
    }

    public function getIdDossard()
    {
        return $this->_iddossard;
    }

    public function getNumDossard()
    {
        return $this->_numdossard;
    }

    public function init()
    {
    }
}
