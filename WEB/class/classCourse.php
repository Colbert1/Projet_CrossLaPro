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
    public function init($_idcourse, $_nom, $_date)
    {
        $requete = $this->_bdd->query("INSERT INTO course(id_course, nom, date) VALUES('$_idcourse','$_nom','$_date')");
        $creacourse = $requete->fetch();
        $this->_idcourse = $creacourse['id_course'];
        $this->_nom = $creacourse['nom'];
        $this->_date = $creacourse['date'];
    }
}
