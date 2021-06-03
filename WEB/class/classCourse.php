<?php
/*
        Class Course
        Avec la possibilité de :
        Créer une course
        Modifier ses informations
        Supprimer une course
    */
class Course
{
    private $_course;
    private $_nom;
    private $_date;
    private $_bdd;

    //Constructeur : Stockage du PDO
    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    public function createCourse()
    {
        try {
            $this->_bdd->query("INSERT INTO `course_tbl` (`crs_id`, `crs_date`, `crs_nom`) VALUES (NULL, '" . $this->_date . "', '" . $this->_nom . "')");
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
        }
    }
    /*
        MODIFIER LE NOM ET LA DATE DE LA COURSE
        DEPUIS LA TABLE COURSE
    */
    public function modifCourse($date, $nom)
    {
        $req = $this->_bdd->prepare("UPDATE `course_tbl` SET `crs_date`= :date,`crs_nom`= :nom WHERE `crs_id` = :course");
        $req->bindParam('course', $this->_course, PDO::PARAM_INT);
        $req->bindParam('date', $date, PDO::PARAM_STR);
        $req->bindParam('nom', $nom, PDO::PARAM_STR);
        $req->execute();
    }
    /*
        AFFICHAGE DU NOM, LA DATE ET LA DISTANCE DE LA COURSE
        DEPUIS LA TABLE COURSE ET TOUR
    */
    public function afficheInfoCourse()
    {
        $req = $this->_bdd->query("SELECT course_tbl.crs_nom, course_tbl.crs_date, SUM(tour_tbl.tr_distance) 
        AS distance_totale FROM course_tbl INNER JOIN tour_tbl ON tour_tbl.crs_id = course_tbl.crs_id GROUP BY tour_tbl.crs_id");
        foreach ($req as  $infoCourse) {
            echo "<div class='rounded-sm bg-gray-300 border-2 border-black h-36 w-40'><div class='text-blue-700 self-stretch'> Nom de la course: </div>" . $infoCourse['crs_nom'] .
                "<div class='text-blue-800 '> Date de la course: </div>" . $infoCourse['crs_date'] . "<div class='text-blue-800 '>
                 Distance de la course: </div>" . $infoCourse['distance_totale'] . 'm' . "</div></div>";
        }
    }
    /*
        SUPPRESSION DE LA COURSE 
        DEPUIS LA TABLE PARTICIPANT,CLASSEPARTICIPANTE, ECRAN, COURSE ET TOUR
        JE FAIS PLUSIEURS DELETE CAR L'ID DE LA COURSE ET EN RELATION TOUTES CES TABLES
    */
    public function suppCourse($course)
    {
        try {
            $req = $this->_bdd->prepare(
                "DELETE FROM `temps_tbl` WHERE `pt_id`;
                DELETE FROM `classeparticipante_tbl` WHERE `crs_id` = 1; 
                DELETE FROM `ecran_tbl` WHERE `crs_id` = 1;
                DELETE FROM `participant_tbl` WHERE `crs_id` = 1;
                DELETE FROM `tour_tbl` WHERE `crs_id` = 1;
                DELETE FROM `course_tbl` WHERE `crs_id` = 1;"
            );
            $req->bindParam('course', $course, PDO::PARAM_INT);
            $verif = $req->execute();
            echo $verif;
        } catch (Exception $e) {
            echo "Error : " . $e->getMessage();
        }
    }
    /*
        INITIALISE L'ID DE LA COURSE
    */
    public function setCourse($newCourse)
    {
        $this->_course = $newCourse;
    }
    /*
        INITIALISE LA DATE DE LA COURSE
    */
    public function setDate($newDate)
    {
        $this->_date = $newDate;
    }
    /*
        INITIALISE LE NOM DE LA COURSE
    */
    public function setNom($newNom)
    {
        $this->_nom = $newNom;
    }
    /*
        RECUPERE L'ID DE LA COURSE
    */
    public function getCourse()
    {
        return $this->_course;
    }
    /*
        RECUPERE LE DATE DE LA COURSE
    */
    public function getDate()
    {
        return $this->_date;
    }
    /*
        RECUPERE LE NOM DE LA COURSE
    */
    public function getNom()
    {
        return $this->_nom;
    }
    public function init()
    {
        $requete = $this->_bdd->query("SELECT * FROM course_tbl WHERE crs_id = " . $this->_idcourse);
        $dataCourse = $requete->fetch();
        $this->_idcourse = $dataCourse['crs_id'];
        $this->_nom = $dataCourse['crs_nom'];
        $this->_date = $dataCourse['crs_date'];
    }
}
