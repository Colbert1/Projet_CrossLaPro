<?php
require_once("bdd.php");
/***********************************************************************
    ON RECUPERE ET AFFICHE LE NOM GRACE A L'ID DU USER
    ENSUITE
    ON RECUPERE ET AFFICHE LE NOM DE LA COURSE GRACE A L'ID DE LA COURSE
    (POUR QUE LE USER 10 PARTICIPE A LA COURSE 2) 
    ET CA ON L'AFFICHE SUR L'IHM POUR CONFIRMER L'INSCRIPTION
 ***********************************************************************/
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
    public function inscriptionCoureur()
    {
        try {
            $req = $this->_bdd->query("INSERT INTO `participant_tbl` (`pt_id`, `us_id`, `crs_id`, `ds_id`) VALUES (NULL, '" . $this->_user . "','" . $this->_course . "', NULL)");
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
        }
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
