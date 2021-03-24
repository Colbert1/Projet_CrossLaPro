<?php

class ClasseParticipante
{
    private $_idclasseparticipante;
    private $_classe;
    private $_course;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    public function setIdClasseParticipante($newIdClasseParticipante)
    {
    }
    public function setClasse($newClasse)
    {
    }
    public function setCourse($newCourse)
    {
    }
    public function getIdClasseParticipante()
    {
        return $this->_idclasseparticipante;
    }
    public function getClasse()
    {
        return $this->_classe;
    }
    public function getCourse()
    {
        return $this->_course;
    }
    public function init()
    {
    }
}
