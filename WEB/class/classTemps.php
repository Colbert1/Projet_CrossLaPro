<?php
class Temps
{
    private $_idtemps;
    private $_participant;
    private $_temps;
    private $_tour;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    public function setIdTemps($newIdTemps)
    {
    }
    public function setParticipant($newParticipant)
    {
    }
    public function setTemps($newTemps)
    {
    }
    public function setTour($newTour)
    {
    }
    public function getIdTemps()
    {
        return $this->_idtemps;
    }
    public function getParticipant()
    {
        return $this->_participant;
    }
    public function getTemps()
    {
        return $this->_temps;
    }
    public function getTour()
    {
        return $this->_tour;
    }
    public function init()
    {
    }
}
