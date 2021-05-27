<?php
require_once("bdd.php");
/***********************************************************************
    ON RECUPERE ET AFFICHE LE NOM GRACE A L'ID DU USER
    ENSUITE
    ON RECUPERE ET AFFICHE LE NOM DE LA COURSE GRACE A L'ID DE LA COURSE
    (POUR QUE LE USER 10 PARTICIPE A LA COURSE 2) 
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
    public function inscriptionCoureur($course)
    {
        $bdd = $this->_bdd;
        try {
            $req = $bdd->prepare("INSERT INTO `participant_tbl` (`pt_id`, `us_id`, `crs_id`, `ds_id`) 
            VALUES (NULL, '" . $_SESSION['id'] . "',:course, NULL)");
            $req->bindParam('course', $course, PDO::PARAM_STR);
            $req->execute();
            header("Location: accueil.php");
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
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
    public function initById()
    {
        $requete = $this->_bdd->query('SELECT * FROM `user_tbl` WHERE `us_id` = ' . $this->_user);
        $data = $requete->fetch();
        $data['us_id'] = $this->_user;
    }
}
