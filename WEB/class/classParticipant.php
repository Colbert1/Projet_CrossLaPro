<?php
require_once("bdd.php");
/* -------------------------------------
        Class Coureur
        Avec la possibilité de :
        Ajouter un coureur à une course
        Modifier ses informations
        Supprimer un coureur à une course
----------------------------------------*/
class Coureur
{
    private $_idparticipant;
    private $_user;
    private $_course;
    private $_dossard;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    public function setIdParticipant($newIdParticipant)
    {
        $this->_idparticipant = $newIdParticipant;
    }
    public function setUser($newUser)
    {
        $this->_user = $newUser;
    }
    public function setCourse($newCourse)
    {
        $this->_course = $newCourse;
    }
    public function setDossard($newDossard)
    {
        $this->_dossard = $newDossard;
    }
    public function getIdParticipant()
    {
        return $this->_idparticipant;
    }
    public function getUser()
    {
        return $this->_user;
    }
    public function getCourse()
    {
        return $this->_course;
    }
    public function getDossard()
    {
        return $this->_dossard;
    }
    public function init()
    {
    }
}
