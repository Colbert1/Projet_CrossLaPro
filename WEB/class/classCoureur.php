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
    public function inscriptionCoureur($course,$id)
    {
        try {
            $req = $this->_bdd->prepare("INSERT INTO `participant_tbl` (`pt_id`, `us_id`, `crs_id`, `ds_id`) 
            VALUES (NULL, :user ,:course, NULL)");
            $req->bindParam('course', $course, PDO::PARAM_INT);
            $req->bindParam('user', $id, PDO::PARAM_INT);
            $req->execute();
            header("Location: accueil.php");
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
    }
    public function modifProfilCoureur($course)
    {
        $bdd = $this->_bdd;
        try {
            $req = $bdd->prepare("UPDATE `participant_tbl` SET `crs_id`=:course WHERE `us_id` = :user");
            $req->bindParam('course', $course, PDO::PARAM_INT);
            $req->bindParam('user', $_SESSION['id'], PDO::PARAM_INT);
            $req->execute();
            header("Location: accueil.php");
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
    }
    public function suppProfilCoureur()
    {
        //DELETE FROM `participant_tbl` WHERE `us_id` = :user
        //$req->bindParam('user', $_SESSION['id'], PDO::PARAM_INT);
        //$req->execute();
        //header("Location: accueil.php");
    }
    public function afficheInfoCoureur()
    {
        foreach ($this->_course as $crs) {
            echo '<br>' . $crs['crs_id'];
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
    public function setCourse($idCourse)
    {
        $this->_course = $idCourse;
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
