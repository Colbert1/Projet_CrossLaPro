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
    private $_id;
    private $_nom;
    private $_prenom;
    private $_classe;
    private $_mail;
    private $_motdepasse;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    public function setIdParticipant($newIdParticipant)
    {
    }
    public function setUser($newUser)
    {
    }
    public function setCourse($newCourse)
    {
    }
    public function setDossard($newDossard)
    {
    }
    public function getIdParticipant()
    {
    }
    public function getUser()
    {
    }
    public function getCourse()
    {
    }
    public function getDossard()
    {
    }
    public function init()
    {
    }
}
