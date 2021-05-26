<?php
/* -------------------------------------
        Class Course
        Avec la possibilité de :
        Créer une course
        Modifier ses informations
        Supprimer une course
----------------------------------------*/
class Course
{
    private $_idcourse;
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
    public function modifCourse()
    {
        /*----------------------------------------

        Modifier la date ou/et le nom de la course, la distance
        Depuis la table Tour et Course

        ------------------------------------------*/
    }
    public function afficheInfoCourse()
    {
        $req = $this->_bdd->query("SELECT DISTINCT `crs_nom`,`crs_date` FROM `course_tbl`");
        foreach ($req as  $infoCourse) {
            echo "<div class='text-blue-700'><br> Nom de la course: </div>" . $infoCourse['crs_nom'] .
                "<br> <div class='text-blue-800'>Date de la course: </div>" . $infoCourse['crs_date'];
        }
    }
    public function setIdCourse($newIdCourse)
    {
        $this->_idcourse = $newIdCourse;
    }
    public function setDate($newDate)
    {
        $this->_date = $newDate;
    }
    public function setNom($newNom)
    {
        $this->_nom = $newNom;
    }
    public function getIdCourse()
    {
        return $this->_idcourse;
    }
    public function getDate()
    {
        return $this->_date;
    }
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
