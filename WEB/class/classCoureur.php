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

    //Constructeur : Stockage du PDO
    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    /*
        INSCRIPTION D'UN UTILISATEUR A UNE COURSE
        (IL DEVIENT COURREUR ET UTILISATEUR)
    */
    public function inscriptionCoureur($idUser)
    {
            $prep = $this->_bdd->prepare("SELECT * FROM `participant_tbl` WHERE `crs_id` = :course AND `us_id` = :user");
            $prep->bindParam('course',$this->_course,PDO::PARAM_INT);
            $prep->bindParam('user',$idUser,PDO::PARAM_INT);
            $prep->execute();
            $result = $prep->fetch();
        if ($result) {
            echo "Déjà inscrit ! ";
        } else {
            $req = $this->_bdd->prepare("INSERT INTO `participant_tbl` (`pt_id`, `us_id`, `crs_id`, `ds_id`) 
            VALUES (NULL, :user ,:course, NULL)");
            $req->bindParam('user', $idUser, PDO::PARAM_INT);
            $req->bindParam('course', $this->_course, PDO::PARAM_INT);
            $verif = $req->execute();
            if($verif == TRUE) header("Location: accueil.php");
        }
    }
    /*
        MODIFICATION DU PROFIL DU COUREUR
        (CHANGER LA OU LES COURSES AUXQUELES LE COURREUR PARTICIPE)
    */
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
    /*
        SUPPRESSION DU PROFIL COURREUR 
        (LE COURREUR N'EST PLUS QU'UN UTILISATEUR SANS COURSE)
    */
    public function suppProfilCoureur()
    {
        echo "coucou";
        /*         
            DELETE FROM `participant_tbl` WHERE `us_id` = :user
            $req->bindParam('user', $_SESSION['id'], PDO::PARAM_INT);
            $req->execute();
            header("Location: accueil.php"); 
        */
    }
    /* 
        AFFICHAGE DES COURSES AUXQUELLES LE COURREUR PARTICIPENT
    */
    public function afficheInfoCoureur($idCourse)
    {
        $req = $this->_bdd->prepare("SELECT pt.`crs_id`, crs.`crs_nom` 
        FROM participant_tbl AS pt 
        INNER JOIN user_tbl AS us ON pt.`us_id` = us.`us_id` 
        INNER JOIN course_tbl AS crs ON pt.`crs_id` = crs.`crs_id` 
        WHERE pt.us_id = :coureur");
        $req->bindParam('coureur', $idCourse, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetchAll();
        foreach ($result as $infoCoureur) {
            echo  "<p>" . $infoCoureur['crs_nom'];
        }
    }

    /*
        INITIALISE L'ID DU COURREUR
    */
    public function setIdParticipant($newIdParticipant)
    {
        $this->_idparticipant = $newIdParticipant;
    }
    /*
        INITIALISE LE USER 
    */
    public function setUser($newUser)
    {
        $this->_user = $newUser;
    }
    /*
        INITIALISE LA COURSE DU COURREUR
    */
    public function setCourse($coureur)
    {
        $this->_course = $coureur;
    }
    /*
        INITIALISE LE DOSSARD DU COURREUR
    */
    public function setDossard($newDossard)
    {
        $this->_dossard = $newDossard;
    }
    /*
        RECUPERE L'ID DU COURREUR
    */
    public function getIdParticipant()
    {
        return $this->_idparticipant;
    }
    /*
        RECUPERE LE USER
    */
    public function getUser()
    {
        return $this->_user;
    }
    /*
        RECUPERE LA COURSE DU COURREUR
    */
    public function getCourse()
    {
        return $this->_course;
    }
    /*
        RECUPERE LE DOSSARD DU COURREUR
    */
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
